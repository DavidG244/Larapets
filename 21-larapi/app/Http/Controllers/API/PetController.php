<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pet;

class PetController extends Controller
{
    public function index()
    {
        $pet = Pet::all();

        if ($pet->isEmpty()) {
            return response()->json([
                'message' => 'No pets found 😢',
            ], 404);
        } else {
            return response()->json([
                'message' => 'Pets retrieved successfully ✅',
                'pets' => $pet
            ], 200);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => ['required', 'string'],
                'kind' => ['required', 'string'],
                'weight' => ['required', 'decimal:1'],
                'age' => ['required', 'integer'],
                'breed' => ['required', 'string'],
                'location' => ['required', 'string'],
                'description' => ['required', 'string']
            ]);
            $pet = Pet::create($request->all());
            return response()->json([
                'message' => 'Pet created successfully Added!',
                'pet' => $pet
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'error in the request',
                'errors' => $e->errors()
            ], 400);
        }
    }

    public function show(Request $request)
    {
        // Asumiendo que el ID se pasa en la URL (ej: /api/pets/1) y se usa la inyección de ruta implícita
        // Si usas un Request, necesitarías el ID del request: $pet = Pet::find($request->id);
        $pet = Pet::find($request->id);

        if (!$pet) {
            return response()->json(['ERROR' => 'Pet not found 😢'], 404);
        }

        return response()->json([
            'message' => 'Pet retrieved successfully ✅',
            'pet' => $pet
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pet = Pet::find($id);

        if (!$pet) {
            return response()->json(['ERROR' => 'Pet not found 😢'], 404);
        }

        try {
        
            $validatedData = $request->validate([
                'name' => ['sometimes', 'required', 'string'],
                'kind' => ['sometimes', 'required', 'string'],
                'weight' => ['sometimes', 'required', 'numeric'],
                'age' => ['sometimes', 'required', 'integer'],
                'breed' => ['sometimes', 'required', 'string'],
                'location' => ['sometimes', 'required', 'string'],
                'description' => ['sometimes', 'required', 'string']
            ]);

            $pet->update($validatedData);

            return response()->json([
                'message' => 'Pet updated successfully ✅',
                'pet' => $pet
            ], 200);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Error in the update request',
                'errors' => $e->errors()
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $pet = Pet::find($request->id);
        if ($pet) {
            if ($pet->delete()) {
                return response()->json([
                    'message' => 'Pet was Successful delet!',
                    'pet' => $pet
                ], 200);
            }
        } else {
            return response()->json(['error' => 'Pet not found!'], 404);
        }
    }
}