<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface ProcessContract
{
    public function index();

    public function process(Request $request);

    public function getAllData();

    public function show($id);
}