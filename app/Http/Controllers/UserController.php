<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::with(['rol:id,name', 'tasks:title,status,user_id'])->get();

        if ($user->isEmpty()) {
            return response()->json([
                'message' => 'there are no user',
                'status' => 404,
            ], 404);
        }
        return response()->json([
            'data' => $user,
            'status' => 200,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        $validated['password'] = bcrypt($validated['password']);

        $user = User::create($validated);

        return response()->json([
            'data' => $user,
            'status' => 201,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::with(['rol:id,name'])->find($id);

        if (!$user) {
            return response()->json([
                'message' => 'Usuario no encontrada'
            ], 404);
        }

        return response()->json([
            'data' => $user,
            'status' => 201,
        ], 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'message' => 'Usuario no encontrado',
                'status' => 404,
            ], 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|string',
            'email' => 'sometimes|email|unique:users,email,' . $id,
            'password' => 'sometimes|string|min:6',
            'rol' => 'sometimes|string|exists:rols,name', // Se valida que el nombre del rol exista
        ]);

        if (isset($validated['password'])) {
            $validated['password'] = bcrypt($validated['password']);
        }

        // Si se quiere cambiar el rol
        if (isset($validated['rol'])) {
            $rol = \App\Models\Rol::where('name', $validated['rol'])->first();

            if ($rol) {
                $user->rol_id = $rol->_id; // Se asigna el ObjectId real
            }

            unset($validated['rol']); // Eliminamos 'rol' porque no es parte del fillable
        }

        $user->update($validated);

        return response()->json([
            'message' => 'Usuario actualizado correctamente',
            'data' => $user->load('rol'), // cargamos el rol actualizado
            'status' => 200,
        ], 200);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'message' => 'Usuario no encontrada',
                'status' => 404,
            ], 404);
        }

        $user->delete();

        return response()->json([
            'message' => 'Usuario eliminada correctamente',
            'status' => 200,
        ], 200);
    }
}
