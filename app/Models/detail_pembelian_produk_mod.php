<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class detail_pembelian_produk_mod extends Model
{
    use HasFactory;

    protected $table = 'detail_pembelian_produk', $primaryKey = 'id_detail_pembelian_produk';
    public $timestamps = false, $fillable = [
        'id_pembelian_produk', 'id_produk','id_user','qty'];
}