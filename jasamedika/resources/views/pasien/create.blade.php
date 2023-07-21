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
            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Maaf!</strong> Kelurahan yang anda masukan sudah ada.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="{{ url('pasien/store') }}" method="POST">
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

@section('scripts')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript">

        // btn refresh
        $('.btn-refresh').click(function (e) {
            e.preventDefault();
            $('.preloader').fadeIn();
            location.reload();
        });

        //addtable
        $('.addpolco').on('click', function(){
            addpolco();
        });

        function addpolco(){
            var po_lco = '<hr><div>'+
                            '<div class="row mb-3 form-group">'+
                                '<label for="podd" class="col-sm-2 col-form-label">PODD</label>'+
                                '<div class="col-sm-3">'+
                                    '<input type="date" class="form-control" required name="podd">'+
                                '</div>'+
                                '<label for="crd_date" class="col-sm-2 col-form-label">CRD Date</label>'+
                                '<div class="col-sm-3">'+
                                    '<input type="date" class="form-control" required name="crd_date">'+
                                '</div>'+
                            '</div>'+
                            '<div class="row mb-3 form-group">'+
                                '<label for="lco_date" class="col-sm-2 col-form-label">LCO Date</label>'+
                                '<div class="col-sm-3">'+
                                    '<input type="date" class="form-control" required name="lco_date">'+
                                '</div>'+
                                '<label for="country_to" class="col-sm-2 col-form-label">Country To</label>'+
                                '<div class="col-sm-3">'+
                                    '<input type="text" class="form-control" required name="country_to">'+
                                '</div>'+
                            '</div>'+
                            '<div class="row mb-3 form-group">'+
                                '<label for="ship_mode" class="col-sm-2 col-form-label">Ship Mode</label>'+
                                '<div class="col-sm-3">'+
                                    '<input type="text" class="form-control" required name="ship_mode">'+
                                '</div>'+
                                '<label for="customer_number" class="col-sm-2 col-form-label">Customer Number</label>'+
                                '<div class="col-sm-3">'+
                                    '<input type="number" class="form-control" required name="customer_number">'+
                                '</div>'+
                            '</div>'+
                            '<div class="row mb-3 form-group">'+
                                '<label for="material_file" class="col-sm-2 col-form-label">Material File</label>'+
                                '<div class="col-sm-3">'+
                                    '<input type="text" class="form-control" required name="material_file">'+
                                '</div>'+
                                '<label for="customer_name" class="col-sm-2 col-form-label">Customer Name</label>'+
                                '<div class="col-sm-3">'+
                                    '<input type="text" class="form-control" required name="customer_name">'+
                                '</div>'+
                            '</div>'+
                            '<div class="row mb-3 form-group">'+
                                '<label for="size_run" class="col-sm-2 col-form-label">Size Run</label>'+
                                '<div class="col-sm-3">'+
                                    '<input type="text" class="form-control" required name="size_run">'+
                                '</div>'+
                                '<label for="article_number" class="col-sm-2 col-form-label">Article Number</label>'+
                                '<div class="col-sm-3">'+
                                    '<input type="text" class="form-control" id="order" required name="article_number">'+
                                '</div>'+
                            '</div>'+
                            '<div class="row mb-3 form-group">'+
                                '<label for="po_number" class="col-sm-2 col-form-label">PO Number</label>'+
                                '<div class="col-sm-3">'+
                                    '<input type="text" class="form-control" required name="po_number">'+
                                '</div>'+
                                '<label for="article_name" class="col-sm-2 col-form-label">Article Name</label>'+
                                '<div class="col-sm-3">'+
                                    '<input type="text" class="form-control" id="article_name" required name="article_name">'+
                                '</div>'+
                            '</div>'+
                            '<div class="row mb-3 form-group">'+
                                '<label for="order_qty" class="col-sm-2 col-form-label">Order Qty</label>'+
                                '<div class="col-sm-3">'+
                                    '<input type="number" class="form-control" id="order" required name="order_qty">'+
                                '</div>'+
                                '<div class="col-sm-7">'+
                                    '<a href="#" class="remove btn btn-danger pull-right">Hapus</a>'+
                                '</div>'+
                            '</div>'+
                        '</div>';
            $('.po_lco').append(po_lco);
        };

        $('.remove').live('click',function(){
            $(this).parent().parent().parent().remove();
        });

        $(document).ready(function() {
        $("#order_qty").keyup(function() {
            var order_qty  = $("#order_qty").val();

            var order_qty_ship = order_qty;
            $("#order_qty_ship").val(order_qty_ship);
        });
    });
    
</script>

@endsection

