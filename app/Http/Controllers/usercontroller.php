<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class usercontroller
{
    public function index()
    {
        return view('users.index');
    }

    public function show($id)
    {
        return "Menampilkan user: $id";
    }
}
