<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class petugasModel extends Model
{
    protected $table = 'users';
    protected $fillable = [
        'id','username', 'password', 'nama_petugas', 'level'
    ];

    protected $hidden = [
        'password',
    ];
}
