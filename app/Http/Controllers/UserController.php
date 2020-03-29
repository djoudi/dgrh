<?php

namespace App\Http\Controllers;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin']);
    }

    public function index()
    {
        return view("dgrh.user");
    }
}