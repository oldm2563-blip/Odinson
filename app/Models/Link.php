<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Link extends Model
{
    use SoftDeletes;
    public $fillable = [
        'title',
        'link',
        'user_id',
        'catagory_id'
    ];
    public function tag(){
        return $this->belongsToMany(Tag::class, 'link_tag');
    }
    public function sharedusers(){
        return $this->belongsToMany(User::class, 'user_link')->withPivot('access_type');
    }
    public function favorits(){
        return $this->belongsToMany(User::class, 'favorites')->withPivot('access_type');
    }
}
