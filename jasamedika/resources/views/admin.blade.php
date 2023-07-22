@extends('layouts.master')

@section('content')

<body class="bg-secondary">
  <div class="bg-white container-sm col-6 border my-3 rounded px-5 py-3 pb-5">
    <h1>JASAMEDIKA </h1>
    <h3>PT. JASAMEDIKA SARANATAMA</h3>
    <div class="card mt-3">
      <ul class="list-group list-group-flush">
        @if(Auth::user()->role == 'admin')
            <li class="list-group-item"><a href="{{ url('/kelurahan') }}">Menu Data Kelurahan</a></li> 
            @endif
        @if(Auth::user()->role == 'operator')
            <li class="list-group-item"><a href="{{ url('/pasien') }}">Menu Data Pasien</a></li> 
        @endif
      </ul>
    </div>

  </div>
</body>
@endsection

@section('scripts')

<script type="text/javascript">
    $(document).ready(function () {

        // btn refresh
        $('.btn-refresh').click(function (e) {
            e.preventDefault();
            $('.preloader').fadeIn();
            location.reload();
        })

    })

</script>
@endsection