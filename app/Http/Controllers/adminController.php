<?php

namespace App\Http\Controllers;

use App\Models\adminmod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class adminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }
    
    public function getadmin()
    {
        $dt_admin=adminmod ::get();
        return response()->json($dt_admin);
    }

    public function addadmin(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'nama_admin' => 'required',
            'tanggal_lahir' => 'required',
            'gender' => 'required',
            'alamat' => 'required',
            'adminname' => 'required',
            'password' => 'required',
            'level' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson());
        }
        $save = adminmod::create([
            'nama_admin'  => $req->get('nama_admin'),
            'tanggal_lahir' => $req->get('tanggal_lahir'),
            'gender'  => $req->get('gender'),
            'alamat' => $req->get('alamat'),
            'adminname'  => $req->get('adminname'),
            'password' => $req->get('password'),
            'level' => $req->get('level')
        ]);
        if ($save) {
            return response()->json(['status' => true, 'message' => 'berhasil menambahkan admin']);
        } else {
            return response()->json(['status' => false, 'message' => 'gagal menambahkan admin']);
    }
    }
    public function updateadmin(Request $req,$id)
    {
        $validator = Validator::make($req->all(), [
            'nama_admin' => 'required',
            'tanggal_lahir' => 'required',
            'gender' => 'required',
            'alamat' => 'required',
            'adminname' => 'required',
            'password' => 'required',
            'level' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson());
        }
        $ubah = adminmod::where('id_admin',$id)->update([ 
            'nama_admin'  => $req->get('nama_admin'),
            'tanggal_lahir' => $req->get('tanggal_lahir'),
            'gender'  => $req->get('gender'),
            'alamat' => $req->get('alamat'),
            'adminname'  => $req->get('adminname'),
            'password' => $req->get('password'),
            'level' => $req->get('level')
        ]);
        if ($ubah) {
            return response()->json(['status' => true, 'message' => 'berhasil mengedit admin']);
        } else {
            return response()->json(['status' => false, 'message' => 'gagal mengedit admin']);
    }
    }
    public function deleteadmin($id)
    {
        $hapus = adminmod::where('id_admin',$id)->delete();
        if ($hapus) {
            return response()->json(['status' => true, 'message' => 'berhasil menghapus admin']);
        } else {
            return response()->json(['status' => false, 'message' => 'gagal menghapus admin']);
    }
    }
    public function getadminid($id)
    {
        $dt = adminmod::where('id_admin',$id)->first();
        return Response()->json($dt);
    }
}