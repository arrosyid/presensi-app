@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <a href="{{route('create-user')}}" type="button" class="btn btn-info mb-2">+ Tambah User</a>
            <div class="card">
                <div class="card-header">Daftar User</div>

                <div class="card-body">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>
                            <!-- <a href="{{ url('hapus-user'). '/'. $item->id }}" class="btn btn-success">Hapus</a> -->
                            
                            @if ($item->id == Auth::id())

                        @else
                        <div class="form-button-action">
                            <form action ="{{ route('user.destroy', encrypt($item->id)) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link btn-danger btn-lg" onclick="return confirm('Hapus User {{ $item->name }} ?')"><i class="bi bi-trash-fill"></i></button>
                                </form>
                            </div>
                            @endif
                        </td>
                        </tr>

                        
                        @endforeach
                    </tbody>
                </table>
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



