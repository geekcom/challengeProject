<?php

namespace App\Http\Controllers;

use App\Interfaces\ProcessContract;
use Illuminate\Http\Request;

class ProcessController extends BaseController implements ProcessContract
{
    public function index()
    {
        return view('process.index');
    }

    public function process(Request $request)
    {
        $file = $request->file('xml');

        try{
            $xml = simplexml_load_file($file);
        }catch (\Exception $exception){
            session()->flash('message', 'error ' . $exception->getCode());
            return redirect()->back();
        }

        $json = json_encode($xml);
        $array = json_decode($json,TRUE);
        //dd(session()->get('token'));

        try{
            $response = $this->guzzleHttp->post(env('API_XML'), [
                'headers' => [
                    'Authorization' => 'Bearer ' . session()->get('token')
                ],
                'json' => [
                    'xml' => $json,
                ]
            ]);
        } catch (\Exception $exception){
            session()->flash('message', 'error ' . $exception->getCode());
            return redirect()->back();
        }

        $jsonResponse = json_decode($response->getBody());

        session()->flash('message', $jsonResponse->status);
        return redirect()->back();
    }

    public function getAllData()
    {
        try{
            $response = $this->guzzleHttp->get(env('API_XML'), [
                'headers' => [
                    'Authorization' => 'Bearer ' . session()->get('token')
                ]
            ]);
        } catch (\Exception $exception){
            session()->flash('message', 'error ' . $exception->getCode());
            return redirect()->back();
        }

        $jsonResponse = json_decode($response->getBody());

        if ($jsonResponse){
            return view('process.list', ['data' => $jsonResponse]);
        }

        session()->flash('message', 'error');
        return redirect()->back();
    }

    public function show($id)
    {
        $url = env('API_XML') . '/' . $id;

        try{
            $response = $this->guzzleHttp->get($url, [
                'headers' => [
                    'Authorization' => 'Bearer ' . session()->get('token')
                ]
            ]);
        } catch (\Exception $exception){
            session()->flash('message', 'error ' . $exception->getCode());
            return redirect()->back();
        }

        $jsonResponse = json_decode($response->getBody());
        $id = $jsonResponse->id;
        $xml = json_decode($jsonResponse->xml);

        $person = $xml->person;


        if ($jsonResponse){
            return view('process.show', ['id' => $id, 'people' => $person]);
        }

        session()->flash('message', 'error');
        return redirect()->back();
    }

}
