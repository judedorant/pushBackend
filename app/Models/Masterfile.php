<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masterfile extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'employee';
    public $primaryKey = 'empID';
    protected $fillable = [
        'firstName', 'middleName', 'lastName', 'suffix', 'birthDate', 'gender', 
        'contactNumber', 'contactNumber2', 'telNumber'
    ];

    public $timestamps = false;
    

}
