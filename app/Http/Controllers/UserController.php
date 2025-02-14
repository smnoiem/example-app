<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $users = User::with('role')->orderByDesc('created_at')->get();
        return view('layouts.user-rows', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:20',
            'email' => 'required|email|unique:App\Models\User,email|max:50',
            'password' => 'required',
            'confirmPassword' => 'required|same:password',
            'address' => 'required|max:70',
            'role' => 'required|exists:App\Models\Role,id',
        ]);

        try{
            $user = User::create([
                'name' => $request->name, 
                'email' => $request->email, 
                'password' => bcrypt($request->password),
                'address' => $request->address,
                'role_id' => $request->role,
            ]);
            return $user->id;
        }
        catch (QueryException $e) {
            $errorInfo = $e->errorInfo;
            return $errorInfo[1];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if($request->email == $user->email) 
        {
            $validated = $request->validate([
                'name' => 'required|max:20',
                'address' => 'required|max:70',
                'role' => 'required|exists:App\Models\Role,id',
            ]);
        }
        else 
        {
            $validated = $request->validate([
                'name' => 'required|max:20',
                'email' => 'required|email|unique:App\Models\User,email|max:50',
                'address' => 'required|max:70',
                'role' => 'required|exists:App\Models\Role,id',
            ]);
        }

        try {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->address = $request->address;
            $user->role_id = $request->role;
            $user->save();
            return "saved";
        }
        catch (QueryException $e) {
            $errorInfo = $e->errorInfo;
            return $errorInfo[1];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return User::destroy($id);
    }
}
