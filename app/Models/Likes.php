<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Likes extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'likes';

    protected $fillable = [
        'user_id',
        'posts_id'
    ];

    public function post()
    {
        return $this->belongsTo(Posts::class);
    }
}
