<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request){
        $validate = $request->validate([
            'email'=> 'required|email',
            'password'=>'required'
        ]);

        $user = User::where('email', $validate['email'])->
            first();

        if (!$user || !Hash::check($validate['password'], 
                    $user->password)){
            return response()->json(['erro'=>
                'Usuário ou senha incorreto'], 401);
        }

        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json(['user'=>$user, 
            'token'=>$token], 200);
    }

    // cadastro de usuario
    public function register(Request $request){
        //valida se os dados chegaram direitinho, se tiver algum errado o laravel
        //para e devolve o erro 422 com as msg abaixo
        $validate = $request->validate([
            'name'     => 'required|string|max:255',
            //unique:users,email -> não deixa cadastrar e-mail repetido
            'email'    => 'required|email|max:255|unique:users,email',
            //confirmed -> exige o campo "password_confirmation" igual à senha
            'password' => 'required|string|min:6|confirmed',
        ], [
            'name.required' => 'Informe o nome.',
            'email.required' => 'Informe o e-mail.',
            'email.email' => 'E-mail inválido.',
            'email.unique'  => 'Este e-mail já está cadastrado.',
            'password.required'  => 'Informe a senha.',
            'password.min' => 'A senha deve ter no mínimo 6 caracteres.',
            'password.confirmed' => 'A confirmação da senha não confere.',
        ]);

        //Aqui cria o usuário no banco, a senha n precisa daquele hash pq o model user
        //ja ta criptograafndo sozinho
        $user = User::create([
            'name' => $validate['name'],
            'email'=> $validate['email'],
            'password' => $validate['password'],
        ]);
        
        return response()->json(['user'=>$user], 201);
    }
}