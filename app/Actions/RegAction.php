<?php

namespace App\Actions;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegAction
{
    public function register($request)
    {
        $data = ['email' => $request->email, 'password' => Hash::make($request->password), 'name' => $request->name, 'lastname' => $request->lastname, 'login' => $request->login, 'patronymic' => $request->patronymic];

        if (User::create($data)) {
            return "ok";
        } else {
            return 'not';
        }
    }
}
