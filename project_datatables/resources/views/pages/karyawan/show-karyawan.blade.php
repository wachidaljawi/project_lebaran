@extends ('layouts.master')
@section ('title','Show karyawan')
@section ('showKaryawan','active')
@section ('content')
<div class="content-wrapper">
    <div class="content">

        <div class="container mt-3">
            <div class="row">
                <div class="col-12">
                    <div class="py-4 d-flex justify-content-end align-items-center">
                        <h1 class="h2 mr-auto">Info Karyawan {{$karyawan->nama}}</h1>
                        <hr>
                    </div>
                    @if(session()->has('pesan'))
                        <div class="alert alert-success" role="alert">
                            {{ session()->get('pesan') }}
                        </div>
                    @endif
                    <ul>
                        <li>Nama Karyawan : {{$karyawan->nama}}</li>
                        <li>Umur : {{$karyawan->umur}}</li>
                        <li>Jenis Kelamin : {{$karyawan->gender}}</li>
                        <li>Alamat : {{$karyawan->alamat}}</li>
                        <li>Tanggal Lahir : {{$karyawan->tgl_lahir}}</li>
                        <li>Status : {{$karyawan->status->status}}</li>
                        <li>Jabatan : {{$karyawan->jabatan->nama_jabatan}}</li>
                        <li>Pendidikan : {{$karyawan->pendidikan->pendidikan}}</li>
                        <li>Tanggal Masuk : {{$karyawan->tgl_masuk}}</li>
                    </ul>
                </div>
            </div>
            <a href="/karyawan" class="btn btn-outline-info btn-sm">Kembali</a>
        </div>
    </div>
</div>
@endsection
