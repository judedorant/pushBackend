<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';
    protected $fillable = ['employee_number', 'ntlogin', 'name', 'password', 'created_at', 'updated_at', 'api_token', 'ou', 'image'];

    
}
