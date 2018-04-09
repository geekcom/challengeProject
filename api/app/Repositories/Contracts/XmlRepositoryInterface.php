<?php

namespace API\Repositories\Contracts;

interface XmlRepositoryInterface
{
    public function store($request);

    public function getAllData();

    public function show($id);
}