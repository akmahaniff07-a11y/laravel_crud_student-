<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController
{
    public function index()
    {
        return 'Users index';
    }

    public function show($id)
    {
        return "Detail Produk ID: $id";
    }
}
