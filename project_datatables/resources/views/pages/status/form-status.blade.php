@extends ('layouts.master')
@section ('title','Form Status')
@section ('formStatus','active')
@section ('content')

<div class="content-wrapper">
    <div class="content">
        <div class="container bg-white">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center">Form Status</h1>
                    <hr>
                    <form action={{url('/status')}} method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status">status</label>
                                    <input type="text" class="form-control" id="status"  placeholder="Masukan status anda" name="status" value="{{ old('status') }}">
                                    @error('status')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        <a href="/status" class="btn btn-outline-warning btn-sm">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection