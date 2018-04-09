<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\BaseController;
use App\Interfaces\LoginContract;
use Illuminate\Http\Request;

class LoginController extends BaseController implements LoginContract
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $data = $request->only('email', 'password');

        $validator = validator($data, [
            'email' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back();
        }

        try {
            $response = $this->guzzleHttp->post(env('API_LOGIN'), [
                'json' => [
                    'email' => $data['email'],
                    'password' => $data['password'],
                ],
            ]);
        } catch (\Exception $e) {
            session()->flash('message', $e->getMessage());
            return redirect()->back();
        }

        $jsonResponse = json_decode($response->getBody());

        session()->put('token', $jsonResponse->data->token);
        session()->flash('message', $jsonResponse->status);

        return view('home');
    }

    public function logout()
    {
        session()->flush();
        return redirect(url('/'));
    }
}
