@extends ('layouts.master')
@section ('title','Data Karyawan')
@section ('dataKaryawan','active')
@section ('content')

<div class="content-wrapper">
    <section class="content">
        <div class="container mt-3">
            <div class="card ml-2">
                
                <div class="row">
                    <div class="col-12">
                        <div class="card-header">

                            <div class="py-4 d-flex justify-content-end align-items-center">
                                <h1 class="h2 mr-auto">Tabel Karyawan</h1>
                                    <a href="{{ url('/karyawan/create') }}" class="btn btn-primary"><i class="nav-icon fas fa-plus mr-2"></i>Tambah Data</a>
                            </div>
                            @if(session()->has('pesan'))
                                <div class="alert alert-success" role="alert">
                                    {{ session()->get('pesan') }}
                                </div>
                            @endif
                        </div>
                        <div class="card-body">

                            <table class="table table-striped table-responsive nowrap" id="example">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>No</th>
                                        <th>Nama Karyawan</th>
                                        <th>Jenis Kelamin</th>
                                        <th>No Telp</th>
                                        <th>Status</th>
                                        <th>Jabatan</th>
                                        <th>Pendidikan</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Umur</th>
                                        <th>Alamat</th>
                                        <th>Lahir</th>
                                        <th>Opsi</th>
                                        
                                    </tr>
                                </thead>
                                    <tbody>
                                        @forelse ($karyawan as $item)
                                        <tr class="text-center">
                                            <td></td>
                                            <th>{{$loop->iteration}}</th>
                                            <td>{{$item->nama}}</td>
                                            <td>{{$item->gender}}</td>
                                            <td>{{$item->no_telp}}</td>
                                            <td>{{$item->status->status}}</td>
                                            <td>{{$item->jabatan->nama_jabatan}}</td>
                                            <td>{{$item->pendidikan->pendidikan}}</td>
                                            <td>{{$item->tgl_masuk}}</td>
                                            <td>{{$item->umur}}</td>
                                            <td>{{$item->alamat}}</td>
                                            <td>{{$item->tgl_lahir}}</td>
                                            <td>
                                                <form action="{{ route ('karyawan.edit', $item->id) }}" method="GET" class="d-inline">
                                                    @csrf
                                                    @method('Put')
                                                    <button type="submit" class="btn btn-warning btn-sm mr-1"><i class="nav-icon fas fa-edit mr-2"></i>Edit</button>
                                                </form>
                                                <form action="{{ route ('karyawan.destroy', $item->id) }}" method="post" class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="nav-icon fas fa-trash-alt mr-2"></i>Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <td colspan="6" class="text-center">Data Kosong</td>
                                        @endforelse
                                    </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection