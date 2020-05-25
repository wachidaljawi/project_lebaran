@extends ('layouts.master')
@section ('title','Edit karyawan')
@section ('editKaryawan','active')
@section ('content')

<div class="content-wrapper">
    <div class="content">
        <div class="container bg-white">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center">Edit Karyawan</h1>
                    <hr>
                    <form action={{url('/karyawan/'.$karyawan->id)}} method="post">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nama">Nama Karyawan</label>
                                    <input type="text" class="form-control" id="nama"  placeholder="Masukan nama anda" name="nama" value="{{ $karyawan->nama }}">
                                    @error('nama')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="umur">Umur</label>
                                    <input type="text" class="form-control" id="umur"  placeholder="Masukan umur anda" name="umur" value="{{ $karyawan->umur }}">
                                    @error('umur')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="no_telp">Nomer Telp</label>
                                    <input type="text" class="form-control" id="no_telp"  placeholder="Masukan nomer telp anda" name="no_telp" value="{{ $karyawan->no_telp }}">
                                    @error('no_telp')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="gender">Jenis kelamin</label>
                                </div>
                                <span>
                                <div class="form-check form-check-inline">
                                    <span><input type="radio" class="form-check-input" name="gender" id="laki-laki" value="Laki-laki" {{$karyawan->gender == 'Laki-laki' ?'checked' : ''}}>
                                    <label for="Laki-laki" class="form form-check-input">Laki-Laki</label></span>
                                </div>
                                </span>
                                <div class="form-check form-check-inline">
                                    <span><input type="radio" class="form-check-input" name="gender" id="perempuan" value="Perempuan" {{$karyawan->gender == 'Perempuan' ?'checked' : ''}}>
                                    <label for="perempuan" class="form form-check-input">Perempuan</label></span>
                                </div>
                                @error('gender')
                                    <div class="alert alert-danger">{{($message)}}</div>
                                @enderror
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea name="alamat" id="alamat" cols="3" class="form-control">{{$karyawan->alamat}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <div class="input-group date" id="datepicker">
                                        <input type="date" class="form-control datetimepicker-input" name="tgl_lahir" value="{{ $karyawan->tgl_lahir }}">
                                    </div>
                                    @error('tgl_lahir')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status_id">Status</label>
                                    <select name="status_id" id="status_id" class="form-control">
                                        @foreach($status as $tampil)
                                            <option value="{{$tampil->id}}" {{old('status_id') ?? $karyawan->status_id == $tampil->id ? 'selected' : ''}}>{{ $tampil->status }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('status_id')
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jabatan_id">Jabatan</label>
                                    <select name="jabatan_id" id="jabatan_id" class="form-control">
                                        @foreach($jabatan as $tampil)
                                            <option value="{{$tampil->id}}" {{old('jabatan_id') ?? $karyawan->jabatan_id == $tampil->id ? 'selected' : ''}}>{{ $tampil->nama_jabatan }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('jabatan_id')
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pendidikan_id">Pendidikan</label>
                                    <select name="pendidikan_id" id="pendidikan_id" class="form-control">
                                        @foreach($pendidikan as $tampil)
                                            <option value="{{$tampil->id}}" {{old('pendidikan_id') ?? $karyawan->pendidikan_id == $tampil->id ? 'selected' : ''}}>{{ $tampil->pendidikan }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('pendidikan_id')
                                        <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                                <label>Tanggal Masuk</label>
                                <div class="input-group date" id="tgl_masuk">
                                    <input type="date" class="form-control datetimepicker-input" name="tgl_masuk" value="{{ $karyawan->tgl_masuk }}">
                                    
                                </div>
                                @error('tgl_lahir')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        <button type="submit" class="btn btn-primary btn-sm">Update</button>
                        <a href="/karyawan" class="btn btn-outline-warning btn-sm">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<<script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4'
        });
  </script>
@endsection