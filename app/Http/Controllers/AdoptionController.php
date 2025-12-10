<?php

namespace App\Http\Controllers;

use App\Models\Adoption;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AdoptionsExport;

class AdoptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $adopts = Adoption::orderBy('id', 'DESC')->paginate(20);
        //dd($adopts->toArray());
        return view('adoptions.index')->with('adopts', $adopts);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $adopt = Adoption::with(['user', 'pet'])->find($id);
        return view('adoptions.show')->with('adopt', $adopt);
    }

    public function search(Request $request)
    {
        $adopts = Adoption::names($request->q)->orderBy('id', 'DESC')->paginate(20);
        return view('adoptions.search')->with('adopts', $adopts);

    }
    
    public function pdf()
    {
        $adopts = Adoption::with(['user', 'pet'])->orderBy('created_at', 'desc')->get();
        $pdf = PDF::loadView('adoptions.pdf', compact('adopts'));
        return $pdf->download('adoptions.pdf');
    }

    public function excel()
    {
        return Excel::download(new AdoptionsExport, 'adoptions.xlsx');
    }
    
}
