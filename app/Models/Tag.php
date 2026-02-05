<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public $fillable = [
        'name',
    ];

    public function link(){
        return $this->belongsToMany(Link::class, 'link_tag');
    }
}
