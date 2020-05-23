<?php

namespace App\Http\Controllers;

use App\pendidikan;
use Illuminate\Http\Request;

class PendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.pendidikan.data-pendidikan', ['pendidikan' => pendidikan::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.pendidikan.form-pendidikan');
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
            'pendidikan' => 'required',
        ]);
        pendidikan::create($validateData);
        return redirect('/pendidikan')->with('pesan', "Data $request->pendidikan Berhasil ditambahkan");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function show(pendidikan $pendidikan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function edit(pendidikan $pendidikan)
    {
        return view('pages.pendidikan.edit-pendidikan', compact('pendidikan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pendidikan $pendidikan)
    {
        $validateData = $request->validate([
            'pendidikan' => 'required',
        ]);
        $pendidikan->update($validateData);
        return redirect('/pendidikan')->with('pesan', "Data $pendidikan->pendidikan Berhasil diupdate");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function destroy(pendidikan $pendidikan)
    {
        $pendidikan->delete();
        return redirect('/pendidikan')->with('pesan', "Data $pendidikan->pendidikan berhasil dihapus");

    }
}
