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
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="Karyawan" {{ old('status') == 'Karyawan' ? 'selected' : '' }}>
                                            Karyawan
                                        </option>
                                        <option value="Kontrak" {{ old('status') == 'Kontrak' ? 'selected' : '' }}>
                                            Kontrak
                                        </option>
                                        <option value="Magang" {{ old('status') == 'Magang' ? 'selected' : '' }}>
                                            Karyawan
                                        </option>
                                    </select>
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