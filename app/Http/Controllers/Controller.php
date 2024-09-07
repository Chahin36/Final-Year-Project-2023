<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\User;


class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function index()
{
    $users = User::all();

    return view('users.index', [
        'users' => $users,
        'user' => auth()->user()
    ]);
}



}

