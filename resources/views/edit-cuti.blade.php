@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Tambahkan Cuti</div>

                <div class="card-body">
                    <form method="POST"  action="{{ route('cuti.update') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputName1">Nama</label>
                            <input type="text" class="form-control" id="exampleInputName1" name="name" placeholder="Nama" value="{{ Auth::user()->name }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Jenis Cuti</label>
                            <input type="text" class="form-control" id="exampleInputName1" name="jenis_cuti" placeholder="Nama" value="{{ $cuti->jenis_cuti }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Tanggal Mulai</label>
                            <input type="text" class="form-control" id="exampleInputName1" name="tanggal_mulai" placeholder="Nama" value="{{ $cuti->tanggal_mulai }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Tanggal Selesai</label>
                            <input type="text" class="form-control" id="exampleInputName1" name="tanggal_selesai" placeholder="Nama" value="{{ $cuti->tanggal_selesai }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Keterangan</label>
                            <input type="text" class="form-control" id="exampleInputName1" name="keterangan" placeholder="Nama" value="{{ $cuti->keterangan }}" disabled>
                            <input type="hidden" class="form-control" id="exampleInputName1" name="id" placeholder="Nama" value="{{ $cuti->id }}" disabled>
                        </div>
                        <div class="form-group mt-2">
                            <label for="exampleFormControlSelect1">Status</label>
                            <select class="form-select @error('status') is-invalid @enderror" id="exampleFormControlSelect1" name="status">
                                <option value="Sedang Diproses">Sedang Diproses</option>
                                <option value="Disetujui">Disetujui</option>
                                <option value="Ditolak">Ditolak</option>
                                <option value="Revisi">Revisi</option>
                            </select>
                            @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Simpan Cuti</button>
                    </form>
                </div>
            </div>
        </div>


    </div>
</div>

@endsection



