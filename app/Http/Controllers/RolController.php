<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rol = Rol::all();
        
        if($rol->isEmpty()){
            return response()->json([
            'message' => 'there are no rol',
            'status' => 404,
            ],404);
        }
        return response()->json([
            'data' => $rol,
            'status' => 200,
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string'
        ]);

        $rol = Rol::create($validated);

        return response()->json([
            'data' => $rol,
            'status' => 201,
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rol = Rol::find($id);

        if (!$rol) {
            return response()->json([
                'message' => 'Rol no encontrada'
            ], 404);
        }

        return response()->json([
            'data' => $rol,
            'status' => 201,
        ],201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rol = Rol::find($id);

        if (!$rol) {
            return response()->json([
                'message' => 'Rol no encontrada',
                'status' => 404,
            ], 404);
        }

        $validated = $request->validate([
            'name' => 'sometime|string'
        ]);

        $rol->update($validated);

        return response()->json([
            'message' => 'Rol actualizada correctamente',
            'message' => $rol,
            'status' => 200,
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rol = Rol::find($id);

        if (!$rol) {
            return response()->json([
                'message' => 'Rol no encontrada',
                'status' => 404,
            ], 404);
        }

        $rol->delete();

        return response()->json([
            'message' => 'Rol eliminada correctamente',
            'status' => 200,
        ],200);
    }
}
