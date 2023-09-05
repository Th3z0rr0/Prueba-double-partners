<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('users.index', ['users' => $users]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|string|max:100',
            'phone' => 'required|numeric'
        ]);

        $existingUser = User::where('email_unique_index_1', $request->input('email'))->first();

        if ($existingUser) {
            return redirect()->back()->with('error', 'El correo electrónico ya está en uso.');
        }


        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone')
        ]);

        $user->save();

        return redirect()->back()->with('success', 'Usuario Creado Correctamente');
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('users.edit', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|string|max:100',
            'phone' => 'required|numeric'
        ]);

        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'Usuario no encontrado');
        }

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->save();

        return redirect()->back()->with('success', 'Usuario Actualizado Correctamente');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success', 'Usuario Eliminado Correctamente');
    }
}
