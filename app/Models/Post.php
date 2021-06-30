<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'body'
    ];

    // Checks if a particular user is among this collection
    public function doneBy(User $user) 
    {
        return $this->dones->contains('user_id', $user->id);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function dones()
    {
        return $this->hasMany(Done::class);
    }

}
