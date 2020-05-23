@extends ('layouts.master')
@section ('title','Edit Pendidikan')
@section ('editPendidikan','active')
@section ('content')

<div class="content-wrapper">
    <div class="content">
        <div class="container bg-white">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center">Edit pendidikan</h1>
                    <hr>
                    @if(session()->has('pesan'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('pesan') }}
                    </div>
                    @endif
                    <form action={{url('/pendidikan/'.$pendidikan->id)}} method="post">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pendidikan">Jabatan</label>
                                    <input type="text" class="form-control" id="pendidikan"  placeholder="Masukan pendidikan anda" name="pendidikan" value="{{ $pendidikan->pendidikan }}">
                                    @error('pendidikan')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-sm">Update</button>
                        <a href="/pendidikan" class="btn btn-outline-warning btn-sm">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection