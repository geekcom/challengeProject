<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface LoginContract
{
    public function index();

    public function login(Request $request);

    public function logout();
}