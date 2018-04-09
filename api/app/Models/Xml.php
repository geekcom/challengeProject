<?php

namespace API\Models;

use Illuminate\Database\Eloquent\Model;
use API\Traits\UuidTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Xml extends Model
{
    use UuidTrait;
    use SoftDeletes;

    protected $table = 'xml';
    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $fillable = [
        'xml'
    ];

    protected $dates = [
        'deleted_at'
    ];

    protected $casts = [
        'xml' => 'array',
    ];
}
