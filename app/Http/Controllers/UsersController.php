<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\StoreUsers;
use App\Http\Requests\UpdateUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $roles = \App\Role::all();

        return view('users.index')
            ->with('users', $users)
            ->with('roles', $roles);
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
    public function store(StoreUsers $request)
    {
        $user = new User;

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt('password');

        $role = \App\Role::find($request->input('role'));
        $user->role()->associate($role);

        $user->save();

        return redirect()
            ->route('users.index')
            ->with('success', 'Usuario guardado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsers $request, User $user)
    {
        $user = User::find($user->id);

        if ($request->has('name')) {
            $user->name = $request->input('name');    
        }
        if ($request->has('email')) {
            $user->email = $request->input('email');   
        }
        if ($request->has('role')) {
            if ($request->input('role') != 0) {
                $role = \App\Role::find($request->input('role'));
                $user->role()->associate($role);
            }
        }

        $user->save();

        return redirect()->route('users.index')
            ->with('success', 'Usuario actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::find($user->id)->delete();

        return redirect()->route('users.index')
            ->with('success', 'Usuario eliminado con éxito');
    }
}
