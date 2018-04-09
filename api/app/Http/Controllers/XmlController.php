<?php

namespace API\Http\Controllers;

use API\Repositories\Contracts\XmlRepositoryInterface;
use Illuminate\Http\Request;

class XmlController extends Controller
{
    public function store(XmlRepositoryInterface $repository, Request $request)
    {
        return $repository->store($request);
    }

    public function getAllData(XmlRepositoryInterface $repository)
    {
        return $repository->getAllData();
    }

    public function show(XmlRepositoryInterface $repository, $id)
    {
        return $repository->show($id);
    }
}
