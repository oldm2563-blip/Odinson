<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Catagory extends Model
{
    public $fillable = [
        'name',
        'user_id'
    ];
    public function user(){
         return $this->belongsTo(User::class, 'user_id');
    }
    public function link(){
         return $this->hasMany(Link::class, 'catagory_id');
    }
}
