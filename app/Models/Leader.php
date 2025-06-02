<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leader extends Model
{
    protected $fillable = ['username', 'password', 'is_active'];

    /** @use HasFactory<\Database\Factories\LeaderFactory> */
    use HasFactory;
}
