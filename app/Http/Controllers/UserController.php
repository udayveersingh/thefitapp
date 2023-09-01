<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('role','!=','admin')->get();
        return view('users.index', compact('users'));
    }

    /**
     * user detail
     */

     Public function userDetail($id)
     {
        $profile = Profile::with('user')->where('user_id','=',$id)->first();
        if(is_null($profile)){
            return redirect()->route('users')->with('message','Profile Detail Not added.');
        }
        $tasks = Task::get();
        return view('users.user-detail',compact('profile','tasks'));
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
