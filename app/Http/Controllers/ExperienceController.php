<?php

namespace App\Http\Controllers;

use App\Models\Riwayat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ExperienceController extends Controller
{
    private $_tipe;
    function __construct()
    {
        $this->_tipe = 'experience';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = Riwayat::where('tipe', $this->_tipe)->orderBy('tgl_akhir', 'desc')->get();
        return view('dashboard.experience.index')->with([
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $skill_url = public_path('devicon.json');
        $skill_data = file_get_contents($skill_url);
        $skill_data = json_decode($skill_data, true);
        $skill = array_column($skill_data, 'name');
        $skill = "'" . implode("','", $skill) . "'";
        return view('dashboard.experience.create')->with([
            'skill' => $skill
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Session::flash('isi', $request->isi);
        // Session::flash('judul', $request->judul);
        // Session::flash('info1', $request->info1);
        // Session::flash('tgl_mulai', $request->tgl_mulai);
        // Session::flash('tgl_akhir', $request->tgl_akhir);

        $request->validate(
            [
                'judul' => 'required',
                'info1' => 'required',
                'isi' => 'required'
            ],
            [
                'judul.required' => 'Posisi Harus Diisi',
                'info1.required' => 'Nama Perusahaan Harus Diisi',
                // 'tgl_mulai.required' => 'Tanggal Mulai Harus Diisi',
                'isi.required' => 'Workflow tidak boleh kosong',
            ]
        );

        $data = [
            'judul' => $request->judul,
            'info1' => $request->info1,
            'tipe' => $this->_tipe,
            'isi' => $request->isi
        ];
        Riwayat::create($data);

        return redirect()->route('experience.index')->with('success', 'Berhasil Menambahkan Experience');
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
        $data = Riwayat::where('id', $id)->where('tipe', $this->_tipe)->first();
        return view('dashboard.experience.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'judul' => 'required',
                'info1' => 'required',
                'isi' => 'required'
            ],
            [
                'judul.required' => 'Posisi Harus Diisi',
                'info1.required' => 'Nama Perusahaan Harus Diisi',
                'isi.required' => 'Isi tidak boleh kosong',
            ]
        );

        $data = [
            'judul' => $request->judul,
            'info1' => $request->info1,
            'tipe' => $this->_tipe,
            'isi' => $request->isi
        ];
        Riwayat::where('id', $id)->where('tipe', $this->_tipe)->update($data);

        return redirect()->route('experience.index')->with('success', 'Berhasil Mengubah Data Experience');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Riwayat::where('id', $id)->where('tipe', $this->_tipe)->delete();
        return redirect()->route('experience.index')->with('success', 'Berhasil Menghapus Data Experience');
    }
}
