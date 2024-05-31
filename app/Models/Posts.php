<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Posts extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'description',
        'post_image',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
