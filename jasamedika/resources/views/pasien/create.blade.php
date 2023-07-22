@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h2>{{ $title }}</h2>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i>Refresh</button>
                    <a class="btn btn-primary pull-right" href="{{ url('/pasien') }}"> Backdsfs</a>
                </p>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Maaf!</strong> Pasien yang anda masukan sudah ada.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            {{-- notifikasi form validasi --}}
            @if ($errors->has('file'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('file') }}</strong>
            </span>
            @endif

            {{-- notifikasi sukses --}}
            @if ($sukses = Session::get('sukses'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $sukses }}</strong>
            </div>
            @endif

            <form action="{{ url('/pasien/store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="box-body">
                    <div class="row mb-3 form-group">
                        <label for="id" class="col-sm-2 col-form-label">Id Pasien</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" required name="id" value="{{ $id_pasien }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3 form-group">
                        <label for="nama" class="col-sm-2 col-form-label">Nama Pasien</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" required name="nama" value="{{ old('nama')}}">
                        </div>
                    </div>
                    <div class="row mb-3 form-group">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat </label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" required name="alamat" value="{{ old('alamat')}}">
                        </div>
                    </div>
                    <div class="row mb-3 form-group">
                        <label for="no_telepon" class="col-sm-2 col-form-label">No Telepon </label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" required name="no_telepon" value="{{ old('no_telepon')}}">
                        </div>
                    </div>
                    <div class="row mb-3 form-group">
                        <label for="rt_rw" class="col-sm-2 col-form-label">Rt / Rw </label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" required name="rt_rw" value="{{ old('rt_rw')}}">
                        </div>
                    </div>
                    <div class="row mb-3 form-group">
                        <label for="kelurahan_id" class="col-sm-2 col-form-label">Kelurahan</label>
                        <div class="col-sm-3">
                            <select name="kelurahan_id" id="kelurahan_id" class="form-control select2" required>
                                <option value="">-Pilih Kelurahan-</option>
                                @foreach($kelurahan as $item)
                                <option value="{{ $item->id}}">{{ $item->nama_kelurahan }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="row mb-3 form-group">
                        <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir </label>
                        <div class="col-sm-3">
                            <input type="date" class="form-control" required name="tanggal_lahir" value="{{ old('tanggal_lahir')}}">
                        </div>
                    </div>
                    <div class="row mb-3 form-group">
                        <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin </label>
                        <div class="col-sm-3">
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control select2" required>
                                <option value="">-Pilih Jenis Kelamin-</option>
                                <option value="Laki Laki" @if (old('jenis_kelamin') == "Laki Laki") {{ 'selected' }} @endif>Laki Laki</option>
                                <option value="Perempuan" @if (old('jenis_kelamin') == "Perempuan") {{ 'selected' }} @endif>Perempuan</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection


