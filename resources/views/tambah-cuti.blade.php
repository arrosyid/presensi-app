@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Tambahkan Cuti</div>

                <div class="card-body">
                    <form method="POST"  action="{{ Auth::user()->type == 'admin' ? route('admin.store-cuti') : route('store-cuti') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputName1">Nama</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputName1" name="name" placeholder="Nama" value="{{ Auth::user()->name }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label for="exampleFormControlSelect1">Jenis Cuti</label>
                            <select class="form-select @error('jenis_cuti') is-invalid @enderror" id="exampleFormControlSelect1" name="jenis_cuti">
                                <option value="Cuti Sakit">Cuti Sakit</option>
                                <option value="Cuti Liburan">Cuti Liburan</option>
                                <option value="Cuti Hari Libur Nasional">Cuti Hari Libur Nasional</option>
                                <option value="Cuti Hari Libur Keagamaan">Cuti Hari Libur Keagamaan</option>
                                <option value="Cuti Hamil">Cuti Hamil</option>
                                <option value="Cuti Ayah">Cuti Ayah</option>
                                <option value="Cuti Kedukaan">Cuti Kedukaan</option>
                                <option value="Cuti Kompensasi">Cuti Kompensasi</option>
                                <option value="Cuti Panjang">Cuti Panjang</option>
                                <option value="Cuti Tidak Dibayar">Cuti Tidak Dibayar</option>
                                <option value="Cuti Pendidikan">Cuti Pendidikan</option>
                            </select>
                            @error('jenis_cuti')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                        <label for="tanggal_mulai1">Tanggal mulai</label>
                            <input type="date" class="form-control @error('tanggal_mulai') is-invalid @enderror" id="tanggal_mulai1" name="tanggal_mulai" placeholder="Tanggal Mulai">
                            @error('tanggal_mulai')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                        <label for="tanggal-selesai1">Tanggal selesai</label>
                            <input type="date" class="form-control @error('tanggal_selesai') is-invalid @enderror" id="tanggal_selesai1" name="tanggal_selesai" placeholder="Tanggal Selesai">
                            @error('tanggal_selesai')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label for="exampleInputKet1">Keterangan</label>
                            <input type="text" class="form-control @error('keterangan') is-invalid @enderror" id="exampleInputKet1" name="keterangan" placeholder="Keterangan">
                            @error('keterangan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Ajukan Cuti</button>
                    </form>
                </div>
            </div>
        </div>


    </div>
</div>

@endsection



