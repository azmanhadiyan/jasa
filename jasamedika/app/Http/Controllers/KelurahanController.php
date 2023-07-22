<?php

namespace App\Http\Controllers;

use App\Models\Kelurahan;
use Illuminate\Http\Request;

class KelurahanController extends Controller
{
    public function index()
    {
        $title = "Data Kelurahan";
        $kelurahan = Kelurahan::all();
        
        return view('kelurahan.index', compact( 'title','kelurahan'));
    }

    public function create()
    {
        $title = "Create Data Kelurahan";
        return view('kelurahan.create',compact('title'));
    }

    public function store(Request $request)
    {
        dd($request);
        $request->validate([
            'nama_kelurahan' => 'required|unique:kelurahan',
            'nama_kecamatan' => 'required',
            'nama_kota' => 'required',
        ]);
        try {
            $data = new Kelurahan;
            $data->nama_kelurahan = $request->nama_kelurahan;
            $data->nama_kecamatan = $request->nama_kecamatan;
            $data->nama_kota = $request->nama_kota;
            $data->save();
            
            \Session::flash('sukses','Data berhasil ditambah');
            return redirect('kelurahan');
        } catch (\Exception $e) {
            \Session::flash('gagal',$e->getMessage());
            return redirect()->back();
        }
    }

    public function show($id)
    {
        $title = "Detail Data Kelurahan";
        $kelurahan = Kelurahan::find($id);
        return view('kelurahan.show', compact('title','kelurahan'));
    }

    public function edit($id)
    {
        $title = "Edit Data Kelurahan";
        $kelurahan = Kelurahan::find($id);
        return view('kelurahan.edit', compact('title','kelurahan'));
    }

    public function update(Request $request, $id)
    { 
        $request->validate([
            'nama_kelurahan' => 'required',
            'nama_kecamatan' => 'required',
            'nama_kota' => 'required',
        ]);
        try {
            $data = Kelurahan::find($id);
            $data->nama_kelurahan = $request->nama_kelurahan;
            $data->nama_kecamatan = $request->nama_kecamatan;
            $data->nama_kota = $request->nama_kota;
            $data->save();

            \Session::flash('sukses','Data berhasil diedit');
            return redirect('kelurahan');
        } catch (\Exception $e) {
            \Session::flash('gagal',$e->getMessage());
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        try {
            Kelurahan::where('id',$id)->delete();
            \Session::flash('sukses','Data berhasil dihapus');
        } catch (\Exception $e) {
            \Session::flash('gagal',$e->getMessage());
        }
        return redirect()->back();
    }
}
