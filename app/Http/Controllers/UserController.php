<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {

        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }


    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'min:4', 'max:20'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:8'],
            'phone' => ['nullable', 'int'],
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ];

        User::create($data);

        return redirect(route('user.index'))->with('success', "User Created Successfully");

    }


    public function edit(Request $request){
        $user = User::findOrFail($request->id);

        return view('users.edit', compact('user'));
    }

    public function update(Request $request)
    {
        //

        $request->validate([
            'name' => ['required', 'string', 'min:4', 'max:20'],
            'email' => ['required', 'email', Rule::unique(User::class, 'email')->ignore($request->id)],
        ]);

        $user = User::findOrFail($request->id);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        $user->update($data);

        return redirect(route('user.index'))->with('success', "User updated Successfully");
    }
}
