<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client as GuzzleClient;

class BaseController extends Controller
{
    protected $guzzleHttp;

    public function __construct(GuzzleClient $guzzleHttp)
    {
        $this->guzzleHttp = $guzzleHttp;
    }
}
