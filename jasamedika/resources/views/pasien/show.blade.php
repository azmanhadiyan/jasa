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
                    <a class="btn btn-primary pull-right" href="{{ url('/pasien') }}"> Back</a>
                </p>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-striped ">
                        <tbody>
                            <tr>
                                <th>ID Pasien</th>
                                <td>:</td>
                                <td>{{ $pasien->id }}</td>
                            </tr>
                            <tr>
                                <th>Nama Pasien</th>
                                <td>:</td>
                                <td>{{ $pasien->nama }}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>:</td>
                                <td>{{ $pasien->alamat }}</td>
                            </tr>
                            <tr>
                                <th>Rt / Rw</th>
                                <td>:</td>
                                <td>{{ $pasien->rt_rw }}</td>
                            </tr>
                            <tr>
                                <th>Kelurahan</th>
                                <td>:</td>
                                <td>{{ $pasien->kelurahan->nama_kelurahan }}</td>
                            </tr>
                            <tr>
                                <th>Kecamatan</th>
                                <td>:</td>
                                <td>{{ $pasien->kelurahan->nama_kecamatan }}</td>
                            </tr>
                            <tr>
                                <th>Kota</th>
                                <td>:</td>
                                <td>{{ $pasien->kelurahan->nama_kota }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Lahir</th>
                                <td>:</td>
                                <td>{{ date('d M Y',strtotime($pasien->tanggal_lahir)) }}</td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td>:</td>
                                <td>{{ $pasien->jenis_kelamin }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
