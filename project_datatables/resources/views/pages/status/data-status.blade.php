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
                        <h1 class="h2 mr-auto">Tabel Status</h1>
                            <a href="{{ url('/status/create') }}" class="btn btn-primary"><i class="nav-icon fas fa-plus mr-2"></i>Tambah Data</a>
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
                                    @if($item-> status == 'Karyawan')
                                        <td class="badge badge-success mt-2">{{ $item->status }}</td>
                                    @elseif($item-> status == 'Kontrak')
                                        <td class="badge badge-primary mt-2">{{ $item->status }}</td>
                                    @else
                                        <td class="badge badge-secondary mt-2">{{ $item->status }}</td>

                                    @endif
                                    {{-- <td><span>{{$item->status}}</span></td> --}}
                                    <td>
                                        <div class="row">
                                            <div class="col-2">
                                                <form action="{{ route ('status.edit', $item->id) }}" method="GET">
                                                    @csrf
                                                    @method('Put')
                                                    <button type="submit" class="btn btn-warning btn-sm mb-2"><i class="nav-icon fas fa-edit mr-2"></i>Edit</button>
                                                </form>
                                            </div>
                                            <div class="col-2">
                                                <form action="{{ route ('status.destroy', $item->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="nav-icon fas fa-trash-alt mr-2"></i>Delete</button>
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