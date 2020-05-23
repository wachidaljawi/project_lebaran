<?php

namespace App\Http\Controllers;

use App\status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.status.data-status', ['status' => status::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.status.form-status');
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
            'status' => 'required',
        ]);
        status::create($validateData);
        return redirect('/status')->with('pesan', "Status $request->status Berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\status  $status
     * @return \Illuminate\Http\Response
     */
    public function show(status $status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\status  $status
     * @return \Illuminate\Http\Response
     */
    public function edit(status $status)
    {
        return view('pages.status.edit-status', compact('status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\status  $status
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, status $status)
    {
        $validateData = $request->validate([
            'status' => 'required',

        ]);
        $status->update($validateData);
        return redirect('/status')->with('pesan', "Status $status->status Berhasil diupdate");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\status  $status
     * @return \Illuminate\Http\Response
     */
    public function destroy(status $status)
    {
        $status->delete();
        return redirect('/status')->with('pesan', "Status $status->status berhasil dihapus");
    }
}
