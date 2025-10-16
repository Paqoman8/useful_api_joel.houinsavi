<?php

namespace App\Http\Controllers;

use App\Http\Resources\ModuleResource;
use App\Models\module;
use ErrorException;
use Exception;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $modules = module::all();

        return response()->json([
            'data' => ModuleResource::collection($modules),
            'succes' => 'Modules fetched with success...',
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try{
            $module = module::find($id);

        return response()->json([
            'data' => new ModuleResource($module),
            'succes' => 'The module you asked for...'
        ]);
        }catch(ErrorException $e){
            return response()->json([
                'error' => $e
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
