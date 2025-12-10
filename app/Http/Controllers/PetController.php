<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PetsExport;
use App\Imports\PetsImport;

class PetController extends Controller
{
    public function index()
    {
        // show newest pets first
        $pets = Pet::orderBy('created_at', 'desc')->paginate(20);
        return view('pets.index')->with('pets', $pets);
    }

    public function create()
    {
        $kinds = Pet::select('kind')->distinct()->whereNotNull('kind')->orderBy('kind')->pluck('kind');
        return view('pets.create')->with(['kinds' => $kinds]);
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'name' => ['required', 'string'],
            'image' => ['required', 'image'],
            'kind' => ['required', 'string'],
            'kind_other' => ['required_if:kind,Other', 'nullable', 'string'],
            'weight' => ['required', 'numeric'],
            'age' => ['required', 'integer'],
            'breed' => ['required', 'string'],
            'location' => ['required', 'string'],
            'description' => ['required', 'string'],
        ]);

        if ($request->hasFile('image')) {
            $image = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $image);
        } else {
            $image = 'no-image.png';
        }

        $pet = new Pet();
        $pet->name = $request->name;
        $pet->image = $image;
        // Support selecting existing kind or providing a custom one
        if ($request->kind === 'Other' && !empty($request->kind_other)) {
            $pet->kind = $request->kind_other;
        } else {
            $pet->kind = $request->kind;
        }
        $pet->weight = $request->weight;
        $pet->age = $request->age;
        $pet->breed = $request->breed;
        $pet->location = $request->location;
        $pet->description = $request->description;
        // New pets are active by default and available (status = 0)
        $pet->active = 1;
        $pet->status = 0;

        if ($pet->save()) {
            return redirect('pets')->with('message', 'The pet: ' . $pet->name . ' was successfully added!.');
        }
    }

    public function show(Pet $pet)
    {
        return view('pets.show')->with('pet', $pet);
    }

    public function edit(Pet $pet)
    {
        return view('pets.edit')->with('pet', $pet);
    }

    public function update(Request $request, Pet $pet)
    {
        $validation = $request->validate([
            'name' => ['required', 'string'],
            'image' => ['nullable', 'image'],
            'kind' => ['required', 'string'],
            'weight' => ['nullable', 'numeric'],
            'age' => ['nullable', 'numeric'],
            'breed' => ['nullable', 'string'],
            'location' => ['nullable', 'string'],
        ]);

        if ($request->hasFile('image')) {
            $image = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $image);
            if ($pet->image != 'no-image.png' && file_exists(public_path('images/') . $pet->image)) {
                unlink(public_path('images/') . $pet->image);
            }
        } else {
            $image = $request->originimage ?? $pet->image;
        }

        $pet->name = $request->name;
        $pet->image = $image;
        $pet->kind = $request->kind;
        $pet->weight = $request->weight;
        $pet->age = $request->age;
        $pet->breed = $request->breed;
        $pet->location = $request->location;
        $pet->description = $request->description;
        // Do not change active flag unless explicitly provided
        if ($request->has('active')) {
            $pet->active = 1;
        }
        // status is not changed here (managed by adoption flow)

        if ($pet->save()) {
            return redirect('pets')->with('message', 'The pet: ' . $pet->name . ' was successfully edited!.');
        }
    }

    public function destroy(Pet $pet)
    {
        if ($pet->image != 'no-image.png' && file_exists(public_path('images/') . $pet->image)) {
            unlink(public_path('images/') . $pet->image);
        }
        if ($pet->delete()) {
            return redirect('pets')->with('message', 'The pet: ' . $pet->name . ' was successfully deleted!.');
        }
    }

    public function search(Request $request)
    {
        // use scopeNames like UserController to search across fields and keep newest-first ordering
        $pets = Pet::names($request->q)->orderBy('created_at', 'desc')->paginate(20);
        return view('pets.search')->with('pets', $pets);
    }

    public function pdf()
    {
        $pets = Pet::orderBy('created_at', 'desc')->get();
        $pdf = PDF::loadView('pets.pdf', compact('pets'));
        return $pdf->download('allpets.pdf');
    }

    public function excel()
    {
        return Excel::download(new PetsExport, 'allpets.xlsx');
    }

    public function import(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new PetsImport, $file);
        return redirect()->back()->with('message', 'Pets imported successfully!');
    }

}