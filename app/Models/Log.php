<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    public $fillable = [
        'user_id',
        'action',
        'type',
        'type_id'
    ];

    public static function record($action, $type, $type_id){
        Log::create([
            'user_id' => auth()->id(),
            'action' => $action,
            'type' => $type,
            'type_id' => $type_id
        ]);
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
