<?php

namespace App\Http\Controllers;

use App\Models\Metadata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.profile.index');
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
        $request->validate(
            [
                '_foto' => 'mimes:jpeg,jpg,png,gif',
                '_email' => 'required|email'
            ],
            [
                '_foto.mimes' => 'Format tidak sesuai (JPEG, JPG, PNG)',
                '_email.required' => 'Email Harus Diisi',
                '_email.email' => 'Masukkan Format Email yang Benar'
            ]
        );

        if ($request->hasFile('_foto')) {
            $foto_file = $request->file('_foto');
            $foto_ekstensi = $foto_file->extension();
            $foto_baru = date('ymdhis') . ".$foto_ekstensi";
            $foto_file->move(public_path('foto'), $foto_baru);

            // Kalau ada Update Foto
            $foto_lama = get_meta_data('_foto');
            File::delete(public_path('foto') . "/" . $foto_lama);

            Metadata::updateOrCreate(['meta_key' => '_foto'], ['meta_value' => $foto_baru]);
        }

        Metadata::updateOrCreate(['meta_key' => '_email'], ['meta_value' => $request->_email]);
        Metadata::updateOrCreate(['meta_key' => '_kota'], ['meta_value' => $request->_kota]);
        Metadata::updateOrCreate(['meta_key' => '_provinsi'], ['meta_value' => $request->_provinsi]);
        Metadata::updateOrCreate(['meta_key' => '_nohp'], ['meta_value' => $request->_nohp]);

        Metadata::updateOrCreate(['meta_key' => '_facebook'], ['meta_value' => $request->_facebook]);
        Metadata::updateOrCreate(['meta_key' => '_instagram'], ['meta_value' => $request->_instagram]);
        Metadata::updateOrCreate(['meta_key' => '_linkedln'], ['meta_value' => $request->_linkedln]);
        Metadata::updateOrCreate(['meta_key' => '_github'], ['meta_value' => $request->_github]);



        return redirect()->route('profile.index')->with('success', 'Berhasil Update Data Profile');
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
