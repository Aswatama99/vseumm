<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class produkmod extends Model
{
    use HasFactory;
    protected $table = 'produk';
    protected $primarykey = 'id_produk';
    public $timestamps = false;
    public $fillable = [
        'nama_produk',
        'deskripsi',
        'foto',
        'katagori',
        'author',
        'tanggal_rilis',
        'instagram',
        'harga'
    ];
}