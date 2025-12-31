<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();
        return view('admin.users.index', compact('users'));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validate = $request->validate([

            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,email,' . $user->id,
            'occupation' => 'nullable|string|',
            'role' => 'required|in:student,teacher'


        ]);

        $user->update($validate);
        return redirect()->route('users.index')->with('success', 'User berhasil diedit!');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User berhasil dihapus!');
    }
}
