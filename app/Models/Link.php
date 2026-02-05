<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    public $fillable = [
        'title',
        'link',
        'user_id',
        'catagory_id'
    ];
    public function tag(){
        return $this->belongsToMany(Tag::class, 'link_tag');
    }
}
