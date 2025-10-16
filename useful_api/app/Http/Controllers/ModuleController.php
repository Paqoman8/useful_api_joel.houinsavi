<?php

namespace App\Http\Controllers;

use App\Http\Resources\ModuleResource;
use App\Models\module;
use App\Models\user_module;
use ErrorException;
use Exception;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $modules = module::all();

        // return response()->json([
        //     'data' => ModuleResource::collection($modules),
        //     'succes' => 'Modules fetched with success...',
        // ],200);
        return response()->json(ModuleResource::collection($modules), 200);
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
        try {
            $module = module::find($id);

            return response()->json([
                'data' => new ModuleResource($module),
                'succes' => 'The module you asked for...'
            ]);
        } catch (ErrorException $e) {
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

    public function activate(string $id, Request $request)
    {
        $module = module::find($id);
        $current_user = $request->user();
        $activated_module = user_module::where([
            ['user_id',$current_user['id']],
            ['module_id',$id],
            // ['active', '=', 1],
        ])->latest()->get();
        // $user_module = user_module::find($activated_module['id']);
        // $activated_module = user_module::where('module_id','=',$id)->get();

        // if(!$module){
        //     return response()->json(["Module not found"],404);
        // }
        if (!$module) {
            return response()->json(["Module not found"], 404);
        }
        // else{
        //     return $activated_module->count();
        // }

        if ($activated_module->count() > 0) {
            // return response()->json([
            //     "module" => $activated_module,
            //     "message" => "Trouvé"
            // ], 200);
            return response()->json([
                "message" => "Module already in use..."
            ], 200);
        } 
        else {
            // return response()->json([
            //     "message" => "Non trouvé"
            // ], 200);
            user_module::create([
                "user_id" => $current_user['id'],
                "module_id" => $module['id'],
                "active" => 1,
            ]);
            return response()->json([
                "message" => "Module activated..."
            ], 200);
        }

    }
    public function desactivate(string $id, Request $request)
    {
        $module = module::find($id);
        $current_user = $request->user();
        $activated_module = user_module::where([
            ['user_id',$current_user['id']],
            ['module_id',$id],
            // ['active', '=', 1],
        ])->get()->last();
        // $user_module = user_module::find($activated_module['id']);
        // $activated_module = user_module::where('module_id','=',$id)->get();

        // if(!$module){
        //     return response()->json(["Module not found"],404);
        // }
        if (!$module) {
            return response()->json(["Module not found"], 404);
        }

        if ($activated_module) {
            $activated_module->delete();
            return response()->json([
                // "module activated" => $activated_module,
                "message" => "Module desactivated..."
            ], 200);
        } 
        else {
            return response()->json([
                "message" => "Module is already desactivated..."
            ], 200);
        }

    }
}
