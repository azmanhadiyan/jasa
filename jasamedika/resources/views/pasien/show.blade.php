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
                    <a class="btn btn-primary pull-right" href="{{ url('/kelurahan') }}"> Back</a>
                </p>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-striped ">
                        <tbody>
                            <tr>
                                <th>Kelurahan</th>
                                <td>:</td>
                                <td>{{ $kelurahan->nama_kelurahan }}</td>
                            </tr>
                            <tr>
                                <th>Kecamatan</th>
                                <td>:</td>
                                <td>{{ $kelurahan->nama_kecamatan }}</td>
                            </tr>
                            <tr>
                                <th>Kota</th>
                                <td>:</td>
                                <td>{{ $kelurahan->nama_kota }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
