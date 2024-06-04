<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friends extends Model
{
    use HasFactory;

    protected $table = "friends";

    protected $filleble = [
        'user_id',
        'friend_id'
    ];
}