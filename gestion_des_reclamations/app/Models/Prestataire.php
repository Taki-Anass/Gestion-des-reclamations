<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Prestataire extends Authenticatable
{
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    public $timestamps = false;
    
}
