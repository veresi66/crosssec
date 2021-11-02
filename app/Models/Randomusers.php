<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Randomusers extends Model
{
    use HasFactory;

    protected $table = 'randomuser';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'name',
        'age',
        'gender',
        'city',
        'country',
        'salt',
        'passwsha256',
        'image_url',
        'image'
    ];

    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'age' => 'integer',
        'gender' => 'string',
        'city' => 'string',
        'country' => 'string',
        'salt' => 'string',
        'passwsha256' => 'string',
        'image_url' => 'string'
    ];

    public $timstamp = true;
}
