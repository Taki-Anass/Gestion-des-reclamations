<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Admin extends Authenticatable
{
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

     public $timestamps = false;
    
    protected $hidden = [
        'password', 'remember_token',
      ];

   protected $guard ='admin';
}
