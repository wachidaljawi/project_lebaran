@extends ('layouts.master')
@section ('title','Form pendidikan')
@section ('formPendidikan','active')
@section ('content')

<div class="content-wrapper">
    <div class="content">
        <div class="container bg-white">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center">Form pendidikan</h1>
                    <hr>
                    <form action={{url('/pendidikan')}} method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pendidikan">Pendidikan</label>
                                    <input type="text" class="form-control" id="pendidikan"  placeholder="Masukan pendidikan anda" name="pendidikan" value="{{ old('pendidikan') }}">
                                    @error('pendidikan')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        <a href="/pendidikan" class="btn btn-outline-warning btn-sm">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection