<?php

namespace API\Repositories;

use API\Models\User;
use API\Models\Xml;
use Tymon\JWTAuth\JWTAuth;

abstract class BaseRepository
{
    protected $JWTAuth;
    protected $user;
    protected $xml;

    public function __construct(JWTAuth $JWTAuth, User $user, Xml $xml)
    {
        $this->JWTAuth = $JWTAuth;
        $this->user = $user;
        $this->xml = $xml;
    }
}