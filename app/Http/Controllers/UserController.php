<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('service')->get();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $services = Service::all();
        return view('users.create', compact('services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required',
            'email'      => 'required|email|unique:users',
            'password'   => 'required|min:6',
            'fonction'   => 'nullable',
            'service_id' => 'nullable'
        ]);
        User::create([
            'name'       => $request->name,
            'email'      => $request->email,
            'password'   => Hash::make($request->password),
            'fonction'   => $request->fonction,
            'service_id' => $request->service_id
        ]);
        return redirect()->route('users.index');
    }

    public function edit(User $user)
    {
        $services = Service::all();
        return view('users.edit', compact('user', 'services'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'       => 'required',
            'email'      => 'required|email|unique:users,email,'.$user->id,
            'fonction'   => 'nullable',
            'service_id' => 'nullable'
        ]);
        $user->update($request->except('password'));
        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }
}