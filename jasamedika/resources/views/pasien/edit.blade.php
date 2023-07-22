@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h2>{{ $title }}</h2>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i>
                        Refresh</button>
                    <a class="btn btn-primary pull-right" href="{{ url('/pasien') }}">
                        Back</a>
                </p>
            </div>

            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ url('/pasien/update',$pasien->id) }}" method="POST">
                @csrf
                {{ method_field('PUT') }}
                <div class="box-body">
                    <div class="row mb-3 form-group">
                        <label for="id" class="col-sm-2 col-form-label">Id Pasien</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" required name="id" value="{{ $pasien->id }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3 form-group">
                        <label for="nama" class="col-sm-2 col-form-label">Nama Pasien</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" required name="nama" value="{{ $pasien->nama }}">
                        </div>
                    </div>
                    <div class="row mb-3 form-group">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat </label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" required name="alamat" value="{{ $pasien->alamat }}">
                        </div>
                    </div>
                    <div class="row mb-3 form-group">
                        <label for="no_telepon" class="col-sm-2 col-form-label">No Telepon </label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" required name="no_telepon" value="{{ $pasien->no_telepon }}">
                        </div>
                    </div>
                    <div class="row mb-3 form-group">
                        <label for="rt_rw" class="col-sm-2 col-form-label">Rt / Rw </label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" required name="rt_rw" value="{{ $pasien->rt_rw }}">
                        </div>
                    </div>
                    <div class="row mb-3 form-group">
                        <label for="kelurahan_id" class="col-sm-2 col-form-label">Kelurahan</label>
                        <div class="col-sm-3">
                            <select name="kelurahan_id" id="kelurahan_id" class="form-control select2" required>
                                <option value="">-Pilih Kelurahan-</option>
                                @foreach($kelurahan as $item)
                                <option value="{{ $item->id}}" 
                                        {{$item->id == $pasien->kelurahan_id ? 'selected' : ''}}>{{ $item->nama_kelurahan }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="row mb-3 form-group">
                        <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir </label>
                        <div class="col-sm-3">
                            <input type="date" class="form-control" required name="tanggal_lahir" value="{{ $pasien->tanggal_lahir }}">
                        </div>
                    </div>
                    
                    <div class="row mb-3 form-group">
                        <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin </label>
                        <div class="col-sm-3">
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control select2" required>
                                <option value="">-Pilih Jenis Kelamin-</option>
                                <option value="Laki-Laki" {{ $pasien->jenis_kelamin == "Laki-Laki" ? 'selected' : '' }}>Laki-Laki </option>
                                <option value="Perempuan" {{ $pasien->jenis_kelamin == "Perempuan" ? 'selected' : '' }}>Perempuan</option>
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
