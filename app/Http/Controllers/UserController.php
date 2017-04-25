<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function home ()
    {
        return view('home');
    }

    public function getUsers () {
        $data = User::get();
        return $data;
    }
}
