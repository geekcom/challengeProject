<?php

namespace API\Repositories;

use API\Repositories\Contracts\XmlRepositoryInterface;
use API\Models\Xml;

final class XmlRepository implements XmlRepositoryInterface
{
    protected $xml;

    public function __construct(Xml $xml)
    {
        $this->xml = $xml;
    }

    public function store($request)
    {
        $data = $request->only('xml');

        $validator = validator($data, [
            'xml' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'fail',
                'data' => [
                    'xml' => 'required',
                ]], 422);
        }

        $create = $this->xml->create($data);

        if ($create) {
            return response()->json(['status' => 'success'], 201);
        }
        return response()->json(['status' => 'error'], 500);
    }

    public function getAllData()
    {
        $data = $this->xml->all();

        if (count($data)){
            return response()->json($data);
        }

        return response()->json(['status' => 'error', 'message' => 'no data'], 404);
    }

    public function show($id)
    {
        $xml = $this->xml->find($id);

        if ($xml) {
            return response()->json($xml);
        }

        return response()->json(['status' => 'error', 'message' => 'no data'], 404);
    }

}