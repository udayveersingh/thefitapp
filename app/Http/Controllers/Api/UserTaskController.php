<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\UserTask;
use Illuminate\Http\Request;

class UserTaskController extends Controller
{


     /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        if(is_null($user)){
            return response()->json(['success' => false, 'message' => "Invalid Request"], 401);
        }else{
            
            $tasks = Task::get();
            $response = [
                'success' => true,
                'total' => count($tasks),
                'limit' => 10, // $request->limit
                'page' => 1, // // $request->page
                'data' => $tasks,
            ];
            return response()->json(['success' => true,'data' => $response], 200);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
