@extends ('layouts.master')
@section ('title','Form Jabatan')
@section ('formJabatan','active')
@section ('content')

<div class="content-wrapper">
    <div class="content">
        <div class="container bg-white">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center">Form Jabatan</h1>
                    <hr>
                    <form action={{url('/jabatan')}} method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_jabatan">Jabatan</label>
                                    <input type="text" class="form-control" id="nama_jabatan"  placeholder="Masukan jabatan anda" name="nama_jabatan" value="{{ old('nama_jabatan') }}">
                                    @error('nama_jabatan')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        <a href="/jabatan" class="btn btn-outline-warning btn-sm">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection