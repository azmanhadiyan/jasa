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
                    <a class="btn btn-primary pull-right" href="{{ url('/kelurahan') }}">
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

            <form action="{{ url('/kelurahan/update',$kelurahan->id) }}" method="POST">
                @csrf
                {{ method_field('PUT') }}
                <div class="box-body">
                    <div class="row mb-3 form-group">
                        <label for="nama_kelurahan" class="col-sm-2 col-form-label">Kelurahan</label>
                        <div class="col-sm-3">
                            <input type="text" value="{{ $kelurahan->nama_kelurahan}}" class="form-control" name="nama_kelurahan">
                        </div>
                    </div>
                    <div class="row mb-3 form-group">
                        <label for="nama_kecamatan" class="col-sm-2 col-form-label">Kecamatan</label>
                        <div class="col-sm-3">
                            <input type="text" value="{{ $kelurahan->nama_kecamatan}}" class="form-control" name="nama_kecamatan">
                        </div>
                    </div>
                    <div class="row mb-3 form-group">
                        <label for="nama_kota" class="col-sm-2 col-form-label">Kota</label>
                        <div class="col-sm-3">
                            <input type="text" value="{{ $kelurahan->nama_kota}}" class="form-control" name="nama_kota">
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
