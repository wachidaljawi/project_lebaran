@extends ('layouts.master')
@section ('title','Data Status')
@section ('dataStatus','active')
@section ('content')

<div class="content-wrapper">
    <section class="content">
        <div class="container mt-3">
            <div class="row">
                <div class="col-12">
                    <div class="py-4 d-flex justify-content-end align-items-center">
                        <h1 class="h2 mr-auto">Tabel Bagian</h1>
                            <a href="{{ url('/bagian/create') }}" class="btn btn-primary">Tambah Bagian</a>
                    </div>
                    @if(session()->has('pesan'))
                        <div class="alert alert-success" role="alert">
                            {{ session()->get('pesan') }}
                        </div>
                    @endif
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Status</th>
                                <th>Option</th>
                                
                            </tr>
                        </thead>
                            <tbody>
                                @forelse ($status as $item)
                                <tr>
                                    <th>{{$loop->iteration}}</th>
                                    <td><a href="{{ '/status/'.$item->id }}">{{$item->status}}</a></td>
                                    <td>
                                        <div class="row">
                                            <div class="col">
                                                <form action="{{ route ('karyawan.edit', $tampil->id) }}" method="GET">
                                                    @csrf
                                                    @method('Put')
                                                    <button type="submit" class="btn btn-warning btn-sm btn-block mb-2">Edit</button>
                                                </form>
                                            </div>
                                            <div class="col">
                                                <form action="{{ route ('karyawan.destroy', $tampil->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger btn-sm btn-block">Delete</button>
                                                </form>
                                            </div>
                                        </div>
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
    </section>
</div>

@endsection