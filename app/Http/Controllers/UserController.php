<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\PasswordAssignedNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Str;


class UserController extends Controller
{
    // Método para mostrar todos los usuarios
    public function index()
    {
        // TODO: Implementar la lógica para mostrar todos los usuarios
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // Método para mostrar el formulario de creación de usuario
    public function create()
    {
        return view('users.create');
    }

    // Método para guardar un nuevo usuario
    /*public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);
    
        // Crear un nuevo usuario
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->email_verified_at = now(); // Se puede marcar como verificado manualmente aquí si se desea
        $user->password = Hash::make($request->input('password'));
    
        // Guardar el usuario en la base de datos
        $user->save();

        session()->flash('statusKey', 'User was created!');
        return to_route('users.index');
    }*/

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            //'password' => 'required|string|min:8',
        ]);

        $password = Str::random(8);

        // Crear un nuevo usuario
        /*$user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $password,
        ]);*/

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user-> password = $password;

        // Enviar correo electrónico de verificación
        Mail::to($user->email)->send(new PasswordAssignedNotification($user, $password));

        $user->password = Hash::make($password);
        $user->save();

        session()->flash('statusKey', 'User was created!');

        return redirect()->route('users.index');
    }

    // Método para mostrar un usuario específico
    public function show($id)
    {
        // TODO: Implementar la lógica para mostrar un usuario específico
    }

    // Método para mostrar el formulario de edición de usuario
    public function edit($id)
    {
        // TODO: Implementar la lógica para mostrar el formulario de edición de usuario
    }

    // Método para actualizar un usuario existente
    public function update(Request $request, $id)
    {
        // TODO: Implementar la lógica para actualizar un usuario existente
    }

    // Método para eliminar un usuario
    public function destroy($id)
    {
        // TODO: Implementar la lógica para eliminar un usuario
    }
}
