@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Tambahkan Cuti</div>

                <div class="card-body">
                    <form method="POST"  action="{{ url('tambah-cuti') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <input type="hidden" value="{{ $ }}">
                            <label for="exampleInputEmail1">Nama</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" name="name" aria-describedby="emailHelp">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mt-2">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mt-2">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1" name="password" placeholder="Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>


    </div>
</div>
<script type="text/javascript" class="init">


$(document).ready(function () {
	var table = $('#example').DataTable( {
        rowReorder: {
            selector: 'td:nth-child(2)'
        },
        responsive: true
    } );
});

</script>

@endsection



