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
                    <a href="{{ url('pasien/create') }}"
                        class="btn btn-sm btn-flat btn-primary pull-right"><i class="fa fa-plus"></i> Add Data Pasien</a>
                </p>
            </div>

            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Maaf!</strong> Inputan anda bermasalah.<br><br>
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

            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-hover myTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Action</th>
                                <th>Nama Pasien</th>
                                <th>Alamat</th>
                                <th>No Telepon</th>
                                <th>Rt / Rw</th>
                                <th>Kelurahan</th>
                                <th>Kecamatan</th>
                                <th>Kota</th>
                                <th>Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                            </tr>
                        </thead>
                        @php $i=1 @endphp
                        @foreach ($pasien as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>
                                <form action="{{ url('/pasien/'.$item->id) }}" method="POST">
                                    <a href="{{ url('/pasien/show',$item->id) }}"
                                        class="btn btn-sm btn-flat btn btn-info"><i class="fa fa-eye"></i></a>
                                    <a href="{{ url('/pasien/edit',$item->id) }}"
                                        class="btn btn-sm btn-flat btn btn-warning"><i class="fa fa-edit "></i></a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-flat btn btn-danger" onclick="return confirm('Are you sure?')"><i
                                            class="fa fa-trash"></i></button>
                                </form>
                            </td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->no_telepon }}</td>
                            <td>{{ $item->rt_rw }}</td>
                            <td>{{ $item->kelurahan->nama_kelurahan }}</td>
                            <td>{{ $item->kelurahan->nama_kecamatan }}</td>
                            <td>{{ $item->kelurahan->nama_kota }}</td>
                            <td>{{ date('d M Y',strtotime($item->tanggal_lahir)) }}</td>
                            <td>{{ $item->jenis_kelamin }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

<script type="text/javascript">
    $(document).ready(function () {

        $('.btn-filter').click(function (e) {
            e.preventDefault();

            $('#modal-filter').modal();
        })

    })

</script>
@endsection
