@extends ('layouts.master')
@section ('title','Edit Jabatan')
@section ('editJabatan','active')
@section ('content')

<div class="content-wrapper">
    <div class="content">
        <div class="container bg-white">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center">Edit jabatan</h1>
                    <hr>
                    @if(session()->has('pesan'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('pesan') }}
                    </div>
                    @endif
                    <form action={{url('/jabatan/'.$jabatan->id)}} method="post">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_jabatan">Jabatan</label>
                                    <input type="text" class="form-control" id="nama_jabatan"  placeholder="Masukan jabatan anda" name="nama_jabatan" value="{{ $jabatan->nama_jabatan }}">
                                    @error('nama_jabatan')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-sm">Update</button>
                        <a href="/status" class="btn btn-outline-warning btn-sm">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection