<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class   beliproduk extends Model
{
    use HasFactory;
    protected $table = 'pembelian_produk', $primaryKey = 'id_pembelian_produk';
    public $timestamps = false, $fillable = [
        'id_user', 'tanggal_beli', 'harga'
    ];
}