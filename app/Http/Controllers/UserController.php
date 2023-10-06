<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function vista(){
        $usuario = Auth::user();
        return view('updateProfile', compact('usuario'));
    }


    public function editar()
{
    $usuario = Auth::user();
    return view('perfil.editar', compact('usuario'));
}


    // Procesar la actualización del perfil
    public function actualizar(Request $request)
{
    if (Auth::check()) {
        $usuario = Auth::user();

        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$usuario->id,
        ]);

        $usuario->update([
            'name' => $request->nombre,
            'email' => $request->email,
        ]);

        return redirect('vista')->with('success', 'Perfil actualizado exitosamente');
    }
}

}
