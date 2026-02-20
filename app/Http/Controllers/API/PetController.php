<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function index()
    {
        $pets = Pet::where('active', 1)->orderBy('created_at', 'desc')->get();
        
        return response()->json([
            'message' => 'Pets retrieved successfully',
            'pets' => $pets
        ], 200);
    }
    
    public function show($id)
    {
        $pet = Pet::find($id);
        
        if (!$pet) {
            return response()->json(['message' => 'Pet not found'], 404);
        }
        
        return response()->json([
            'message' => 'Pet retrieved successfully',
            'pet' => $pet
        ], 200);
    }
    
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => ['required', 'string'],
                'kind' => ['required', 'string'],
                'weight' => ['required', 'numeric'],
                'age' => ['required', 'integer'],
                'breed' => ['required', 'string'],
                'location' => ['required', 'string'],
                'description' => ['nullable', 'string']
            ]);
            
            $pet = Pet::create([
                'name' => $request->name,
                'kind' => $request->kind,
                'weight' => $request->weight,
                'age' => $request->age,
                'breed' => $request->breed,
                'location' => $request->location,
                'description' => $request->description ?? '',
                'active' => 1,
                'status' => 0
            ]);
            
            return response()->json([
                'message' => 'Pet created successfully',
                'pet' => $pet
            ], 201);
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 400);
        }
    }
    
    public function update(Request $request, $id)
    {
        try {
            $pet = Pet::find($id);
            
            if (!$pet) {
                return response()->json(['message' => 'Pet not found'], 404);
            }
            
            $request->validate([
                'name' => ['nullable', 'string'],
                'kind' => ['nullable', 'string'],
                'weight' => ['nullable', 'numeric'],
                'age' => ['nullable', 'integer'],
                'breed' => ['nullable', 'string'],
                'location' => ['nullable', 'string'],
                'description' => ['nullable', 'string']
            ]);
            
            $pet->update($request->only(['name', 'kind', 'weight', 'age', 'breed', 'location', 'description']));
            
            return response()->json([
                'message' => 'Pet updated successfully',
                'pet' => $pet
            ], 200);
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 400);
        }
    }
    
    public function destroy($id)
    {
        $pet = Pet::find($id);
        
        if (!$pet) {
            return response()->json(['message' => 'Pet not found'], 404);
        }
        
        $pet->delete();
        
        return response()->json([
            'message' => 'Pet deleted successfully',
            'pet' => $pet
        ], 200);
    }
}
