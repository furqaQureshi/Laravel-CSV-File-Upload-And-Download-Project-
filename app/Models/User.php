<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends Model
{
    use HasFactory;

    protected $table = 'users';
    // protected $name = 'name';

    protected $fillable  = [
        'name',
        'f_name',
        'l_name',
        'address',
        'primary_address',
        'secondary',
        'state',
        'zip',
        'county',
        'age_range',
        'income_range',
        'home_value_range',
        'owns_a_home',
    ];


    // public static function insertData($data)
    // {
    //     DB::table('users')->insert($data);
    // }
}
