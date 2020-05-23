<?php

namespace App\Http\Controllers;

use App\jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.jabatan.data-jabatan', ['jabatan' => jabatan::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.jabatan.form-jabatan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama_jabatan' => 'required',
        ]);
        jabatan::create($validateData);
        return redirect('/jabatan')->with('pesan', "Data $request->nama_jabatan Berhasil ditambahkan");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function show(jabatan $jabatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function edit(jabatan $jabatan)
    {
        return view('pages.jabatan.edit-jabatan', compact('jabatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, jabatan $jabatan)
    {
        $validateData = $request->validate([
            'nama_jabatan' => 'required',
        ]);
        $jabatan->update($validateData);
        return redirect('/jabatan')->with('pesan', "Data $jabatan->nama_jabatan Berhasil diupdate");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(jabatan $jabatan)
    {
        $jabatan->delete();
        return redirect('/jabatan')->with('pesan', "Status $jabatan->nama_jabatan berhasil dihapus");

    }
}
