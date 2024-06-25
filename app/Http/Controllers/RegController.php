<?php

namespace App\Http\Controllers;

use App\Actions\RegAction;
use App\Http\Requests\RegRequest;
use Illuminate\Http\Request;

class RegController extends Controller
{
    public function __invoke()
    {
        return view('reg');
    }
    public function store(RegAction $action, RegRequest $request)
    {
        if ($action->register($request) == 'ok') {
            return to_route('auth');
        }
        return to_route('register')->withErrors(["msg" => "Неверные данные"]);
    }
}
