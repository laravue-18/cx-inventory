<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function index()
    {
        $rows = User::all();
        return view('user.users.index')->with(compact('rows'));
    }

    public function create()
    {
        return view('user.users.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'address' => '',
            'city' => 'required',
            'country' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'web' => '',
            'type' => ''
        ]);

        User::create($data);
        return redirect('/user/users')->with('message', 'New User has been added!');
    }

    public function show(User $user)
    {
        //
    }

    public function edit(User $user)
    {
        return view('user.users.edit')->with(compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'required',
            'address' => '',
            'city' => 'required',
            'country' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'web' => '',
            'type' => ''
        ]);

        $user->update($data);
        return redirect('/user/users')->with('message', 'New User has been added!');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/user/users')->with('message', 'The Staff has been deleted!');
    }
}
