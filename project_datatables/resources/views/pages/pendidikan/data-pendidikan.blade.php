@extends ('layouts.master')
@section ('title','Data Pendidikan')
@section ('dataPendidikan','active')
@section ('content')

<div class="content-wrapper">
    <section class="content">
        <div class="container mt-3">
            <div class="row">
                <div class="col-12">
                    <div class="py-4 d-flex justify-content-end align-items-center">
                        <h1 class="h2 mr-auto">Tabel Pendidikan</h1>
                            <a href="{{ url('/pendidikan/create') }}" class="btn btn-primary"><i class="nav-icon fas fa-plus mr-2"></i>Tambah Data</a>
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
                                <th>Pendidikan</th>
                                <th>Option</th>
                                
                            </tr>
                        </thead>
                            <tbody>
                                @forelse ($pendidikan as $item)
                                <tr>
                                    <th>{{$loop->iteration}}</th>
                                    <td>{{$item->pendidikan}}</td>
                                    <td>
                                        <form action="{{ route ('pendidikan.edit', $item->id) }}" method="GET" class="d-inline">
                                            @csrf
                                            @method('Put')
                                            <button type="submit" class="btn btn-warning btn-sm mb-2"><i class="nav-icon fas fa-edit mr-2"></i>Edit</button>
                                        </form>
                                        <form action="{{ route ('pendidikan.destroy', $item->id) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm mb-2"><i class="nav-icon fas fa-trash-alt mr-2"></i>Delete</button>
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
    </section>
</div>

@endsection