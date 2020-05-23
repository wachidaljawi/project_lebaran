@extends ('layouts.master')
@section ('title','Edit Status')
@section ('editStatus','active')
@section ('content')

<div class="content-wrapper">
    <div class="content">
        <div class="container bg-white">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center">Edit Status</h1>
                    <hr>
                    @if(session()->has('pesan'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('pesan') }}
                    </div>
                    @endif
                    <form action={{url('/status/'.$status->id)}} method="post">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status">status</label>
                                    <input type="text" class="form-control" id="status"  placeholder="Masukan status anda" name="status" value="{{ $status->status }}">
                                    @error('status')
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