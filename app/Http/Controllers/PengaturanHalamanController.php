<?php

namespace App\Http\Controllers;

use App\Models\Halaman;
use App\Models\Metadata;
use Illuminate\Http\Request;

class PengaturanHalamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datahalaman = Halaman::orderBy('judul', 'asc')->get();
        return view('dashboard.pengaturanhalaman.index')->with('datahalaman', $datahalaman);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Metadata::updateOrCreate(['meta_key' => '_halaman_about'], ['meta_value' => $request->_halaman_about]);
        Metadata::updateOrCreate(['meta_key' => '_halaman_interest'], ['meta_value' => $request->_halaman_interest]);
        Metadata::updateOrCreate(['meta_key' => '_halaman_award'], ['meta_value' => $request->_halaman_award]);

        return redirect()->route('pengaturanhalaman.index')->with('success', 'Berhasil Update Data Pengaturan Halaman');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
