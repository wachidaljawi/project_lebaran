<?php

namespace App\Http\Controllers;

use App\karyawan;
use App\status;
use App\jabatan;
use App\pendidikan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $karyawan = karyawan::all();
        $status = status::all();
        $jabatan = jabatan::all();
        $pendidikan = pendidikan::all();
        // return response()->json($karyawan);
        if ($request->ajax()) {

            return datatables()->of($karyawan)->make(true);
        }

        return view('pages.karyawan.data-karyawan', compact('karyawan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $status = status::all();
        $jabatan = jabatan::all();
        $pendidikan = pendidikan::all();
        return view('pages.karyawan.form-karyawan', compact('status', 'jabatan', 'pendidikan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|min:3|max:50',
            'alamat' => 'required',
            'umur' => '',
            'gender' => 'required',
            'no_telp' => 'required',
            'tgl_lahir' => 'required',
            'status_id' => 'required',
            'jabatan_id' => 'required',
            'pendidikan_id' => 'required',
            'tgl_masuk' => 'required',

        ]);
        $karyawan = karyawan::create($validatedData);
        // $karyawan->hobi()->attach($request->hobi);
        return redirect('/karyawan')->with('pesan', "Data $request->nama Berhasil ditambahkan");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function show(karyawan $karyawan)
    {

        return view('pages.karyawan.show-karyawan', ['karyawan' => $karyawan]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function edit(karyawan $karyawan)
    {
        $status = status::all();
        $jabatan = jabatan::all();
        $pendidikan = pendidikan::all();

        return view('pages.karyawan.edit-karyawan', ['karyawan' => $karyawan, 'status' => $status, 'jabatan' => $jabatan, 'pendidikan' => $pendidikan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, karyawan $karyawan)
    {
        $validatedData = $request->validate([
            'nama' => 'required|min:3|max:50',
            'alamat' => 'required',
            'umur' => '',
            'gender' => 'required',
            'no_telp' => 'required',
            'tgl_lahir' => 'required',
            'status_id' => 'required',
            'jabatan_id' => 'required',
            'pendidikan_id' => 'required',
            'tgl_masuk' => 'required',
        ]);
        $karyawan->update($validatedData);
        return redirect('/karyawan')->with('pesan', "Data $karyawan->nama Berhasil diupdate");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy(karyawan $karyawan)
    {
        $karyawan->delete();
        return redirect('/karyawan')->with('pesan', "Data $karyawan->nama berhasil dihapus");
    }
}
