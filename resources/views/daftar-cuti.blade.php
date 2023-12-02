@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Rekap Cuti</div>

                <div class="card-body">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th>Jenis Cuti</th>
                            <th>Keterangan</th>
                            <th>status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($daftar_cuti as $item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td>{{$item->tanggal_mulai}}</td>
                            <td>{{$item->tanggal_selesai}}</td>
                            <td>{{$item->jenis_cuti}}</td>
                            <td>{{$item->keterangan}}</td>
                            <td>{{$item->status}}</td>
                            <td>
                                <a href="{{ url('edit-cuti'). '/'. $item->id }}" class="btn btn-success">Edit</a>
                                <a href="{{ url('hapus-cuti'). '/'. $item->id }}" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
                <div class="card-footer">
                    <a href="{{ route('tambah-cuti') }}" class="btn btn-primary">Tambahkan Cuti</a>
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
