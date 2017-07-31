<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('user.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * Show the form for editing the specified user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $userRoles = Role::select('id', 'name')->get();
        return view('user.edit', ['user' => $user, 'userRoles' => $userRoles]);
    }

    /**
     * Update the specified user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(!Auth::user()->isAdmin() && Auth::user()->id != $id) {
            return redirect(route('home.index'));
        }
        $data = $request->all();
        if(!Auth::user()->isAdmin() && isset($data['role_id'])) {
            return redirect(route('home.index'));
        }
        $user = User::findOrFail($id);
        $user->update(['name' => $data['name']]);
        if(Auth::user()->isAdmin()) {
            if(!$data['password']) {
                $user->update(['role_id' => $data['role_id']]);
            } else {
                $user->update(['password' => Hash::make($data['password']), 'role_id' => $data['role_id']]);
            }
            return redirect(route('user.index'));
        } elseif($data['oldPassword'] != '') {
            if($data['password'] == '') {
                return redirect()->back()
                    ->with('password', 'new password cannot be empty');
            }
            if(Hash::check($data['oldPassword'], $user->password)) {
                $user->update(['password' => Hash::make($data['password'])]);
            } else {
                return redirect()->back()
                    ->with('oldPassword', 'old password is incorrect');
            }
        }
        return redirect(route('home.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
