<?php

namespace App\Http\Controllers;

use App\Models\beliproduk;
use App\Models\detail_pembelian_produk_mod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class transaksiproduk extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }
    public function beliproduk (Request $req)
    {
        $validator = Validator::make($req->all(), [
            'id_user' => 'required',
            'tanggal_beli' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $save = beliproduk::create([
            'id_user' => $req->id_user,
            'tanggal_beli' => $req->tanggal_beli
        ]);

        if ($save) {
            return response()->json(['status' => 1]);
        } else {
            return response()->json(['status' => 0]);
        }
    }

    public function tambahItem(Request $req, $id)
    {
        $validator = Validator::make($req->all(), [
            //'id_pembelian_produk'=>'required',
            'id_produk' => 'required',
            'id_user'=>'required',
            'qty' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $save = detail_pembelian_produk_mod::create([
            'id_pembelian_produk' => $id,
            'id_produk' => $req->id_produk,
            'id_user' => $req->id_user,
            'qty' => $req->qty
        ]);

        if ($save) {
            return response()->json(['status' => 1]);
        } else {
            return response()->json(['status' => 0]);
        }
    }
}
