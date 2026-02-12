<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Catagory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function catagory(){
        return $this->hasMany(Catagory::class, 'user_id');
    }
    public function link(){
        return $this->hasMany(Link::class, 'user_id');
    }
    public function role(){
        return $this->belongsToMany(Role::class, 'user_role');
    }
    public function sharedlink(){
        return $this->belongsToMany(Link::class, 'user_link')->withPivot('access_type'); 
    }
    public function log(){
        return $this->hasMany(Log::class, 'user_id');
    }
    public function favorits(){
        return $this->belongsToMany(Link::class, 'favorites');
    }
}
