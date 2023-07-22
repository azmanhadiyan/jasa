<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Kelurahan;
use Illuminate\Http\Request;

use Carbon\Carbon;
use Date;

class PasienController extends Controller
{
    public function index()
    {
        $title = "Data Pasien";
        $pasien = Pasien::all();
        
        return view('pasien.index', compact( 'title','pasien'));
    }

    public function create()
    {
        $title = "Create Data Pasien";
        $kelurahan = Kelurahan::all();
        $data = Pasien::latest('created_at')->first();
        $id_pasien = $data['id'];
        $id_date = substr($data['id'],0,4);
        $date = date('ym'); 
        if ($id_date == $date) {
            $id_pasien = $id_pasien + 1;
        }else {
            $no = "0000001";
            $id_pasien = $date.$no;
        }

        return view('pasien.create',compact('title','kelurahan','id_pasien'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required',
            'rt_rw' => 'required',
            'kelurahan_id' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
        ]);
        try {
            
            $data = new Pasien;
            $data->id = $request->id;
            $data->nama = $request->nama;
            $data->alamat = $request->alamat;
            $data->no_telepon = $request->no_telepon;
            $data->rt_rw = $request->rt_rw;
            $data->kelurahan_id = $request->kelurahan_id;
            $data->tanggal_lahir = $request->tanggal_lahir;
            $data->jenis_kelamin = $request->jenis_kelamin;
            $data->save();
            
            \Session::flash('sukses','Data berhasil ditambah');
            return redirect('pasien');
        } catch (\Exception $e) {
            \Session::flash('gagal',$e->getMessage());
            return redirect()->back();
        }
    }

    public function show($id)
    {
        $title = "Detail Data Pasien";
        $pasien = Pasien::find($id);
        return view('pasien.show', compact('title','pasien'));
    }

    public function edit($id)
    {
        $title = "Edit Data Pasien";
        $pasien = Pasien::find($id);
        $kelurahan = Kelurahan::all();
        return view('pasien.edit', compact('title','pasien','kelurahan'));
    }

    public function update(Request $request, $id)
    { 
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required',
            'rt_rw' => 'required',
            'kelurahan_id' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
        ]);
        try {
            $data = Pasien::find($id);
            $data->nama = $request->nama;
            $data->alamat = $request->alamat;
            $data->no_telepon = $request->no_telepon;
            $data->rt_rw = $request->rt_rw;
            $data->kelurahan_id = $request->kelurahan_id;
            $data->tanggal_lahir = $request->tanggal_lahir;
            $data->jenis_kelamin = $request->jenis_kelamin;
            $data->save();

            \Session::flash('sukses','Data berhasil diedit');
            return redirect('pasien');
        } catch (\Exception $e) {
            \Session::flash('gagal',$e->getMessage());
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        try {
            Pasien::where('id',$id)->delete();
            \Session::flash('sukses','Data berhasil dihapus');
        } catch (\Exception $e) {
            \Session::flash('gagal',$e->getMessage());
        }
        return redirect()->back();
    }
}
