<?php

namespace API\Models;

use API\Traits\UuidTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use UuidTrait;
    use SoftDeletes;

    protected $table = 'user';
    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $fillable = [
        'name', 'email', 'password'
    ];

    protected $hidden = [
        'password',
    ];

    protected $dates = [
        'deleted_at'
    ];
}