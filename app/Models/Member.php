<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = ['first_name', 'middle_name', 'last_name', 'age', 'gender', 'birth_date' . 'contact', 'email', 'network_leader'];
    /** @use HasFactory<\Database\Factories\MemberFactory> */
    use HasFactory;
}
