<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class adminmod extends Model
{
    use HasFactory;
    protected $table = 'admin';
    protected $primarykey = 'id_admin';
    public $timestamps = false;
    public $fillable = [
        'nama_admin',
        'tanggal_lahir',
        'gender',
        'alamat',
        'adminname',
        'password',
        'level'
    ];
}