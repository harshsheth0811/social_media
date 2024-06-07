<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Friends extends Model
{
    use HasFactory;

    protected $table = "friends";

    protected $filleble = [
        'user_id',
        'friend_id'
    ];
}
