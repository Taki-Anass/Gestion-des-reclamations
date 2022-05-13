<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reclamation extends Model
{
    protected $table ='reclamations';
    protected $fillable = [
        'name',
        'description',
        'type',
        'etat',
        'user_id',
        'image',
        'solution'
    ];
    use HasFactory;
    //relation entre reclamation et User 
    public function user()
    {
        return $this->belongsTo(User::class,"user_id","id");
    }
}
