<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();
        
        if($tasks->isEmpty()){
            return response()->json([
            'message' => 'No hay Tareas',
            'status' => 404,
            ],404);
        }
        return response()->json([
            'data' => $tasks,
            'status' => 200,
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'status' => 'required|string|in:pendiente,progreso,terminada',
        ]);

        $task = Task::create($validated);

        return response()->json([
            'data' => $task,
            'status' => 201,
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json([
                'message' => 'Tarea no encontrada'
            ], 404);
        }

        return response()->json([
            'data' => $task,
            'status' => 201,
        ],201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json([
                'message' => 'Tarea no encontrada',
                'status' => 404,
            ], 404);
        }

        $validated = $request->validate([
            'title' => 'sometime|string',
            'description' => 'sometime|string',
            'status' => 'sometime|string|in:pendiente,progreso,terminada',
        ]);

        $task->update($validated);

        return response()->json($task);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json([
                'message' => 'Tarea no encontrada',
                'status' => 404,
            ], 404);
        }

        $task->delete();

        return response()->json([
            'message' => 'Tarea eliminada correctamente',
            'status' => 200,
        ],200);
    }
    
}
