<?php

namespace App\Http\Controllers;

use App\Models\produkmod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Iluminate\Support\Facades\Hash;

class produkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }
    public function getproduk()
    {
        $dt_produk = produkmod::get();
        return response()->json($dt_produk);
    }

    public function addproduk(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'nama_produk' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required',
            'katagori' => 'required',
            'author' => 'required',
            'tanggal_rilis' => 'required',
            'instagram' => 'required',
            'harga' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson());
        }
        $save = produkmod::create([
            'nama_produk'  => $req->get('nama_produk'),
            'deskripsi' => $req->get('deskripsi'),
            'foto' => $req->get('foto'),
            'katagori' => $req->get('katagori'),
            'author' => $req->get('author'),
            'tanggal_rilis' => $req->get('tanggal_rilis'),
            'instagram' => $req->get('instagram'),
            'harga' => $req->get('harga'),
        ]);
        if ($save) {
            return response()->json(['status' => true, 'message' => 'berhasil menambahkan produk']);
        } else {
            return response()->json(['status' => false, 'message' => 'gagal menambahkan produk']);
    }
    }
    public function updateproduk(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'nama_produk' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required',
            'katagori' => 'required',
            'author' => 'required',
            'tanggal_rilis' => 'required',
            'instagram' => 'required',
            'harga' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson());
        }
        $ubah = produkmod::updateproduk([
            'nama_produk'  => $req->get('nama_produk'),
            'deskripsi' => $req->get('deskripsi'),
            'foto' => $req->get('foto'),
            'katagori' => $req->get('katagori'),
            'author' => $req->get('author'),
            'tanggal_rilis' => $req->get('tanggal_rilis'),
            'instagram' => $req->get('instagram'),
            'harga' => $req->get('harga'),
        ]);
        if ($ubah) {
            return response()->json(['status' => true, 'message' => 'berhasil mengedit produk']);
        } else {
            return response()->json(['status' => false, 'message' => 'gagal mengedit produk']);
    }
    }
    public function deleteproduk($id)
    {
        $hapus = produkmod::where('id_produk',$id)->delete();
        if ($hapus) {
            return response()->json(['status' => true, 'message' => 'berhasil menghapus produk']);
        } else {
            return response()->json(['status' => false, 'message' => 'gagal menghapus produk']);
    }
    }
    public function getprodukid($id)
    {
        $dt = produkmod::where('id_produk',$id)->first();
        return Response()->json($dt);
    }
}