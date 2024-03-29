<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nilai;
use App\Guru;
use App\Siswa;
use App\StandarKompetensi;
use Session;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nilai = Nilai::all();
        $siswa = Siswa::all();
        $guru = Guru::all();
        $standarkompetensi = StandarKompetensi::all();
        return view('admin.nilai.index', compact('standarkompetensi', 'siswa', 'guru', 'nilai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $standarkompetensi = StandarKompetensi::all();
        $siswa = Siswa::all();
        $guru = Guru::all();
        return view('admin.nilai.create', compact('guru', 'siswa', 'standarkompetensi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nilai = new Nilai;
        $nilai->siswa_id = $request->siswa_id;
        $nilai->guru_id = $request->guru_id;
        $nilai->SK_id = $request->SK_id;
        $nilai->nilai_angka = $request->nilai_angka;
        $nilai->nilai_huruf = $request->nilai_huruf;
        $nilai->save();
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Berhasil Menyimpan <b>$nilai->nilai_angka</b>"
        ]);
        return redirect()->route('nilai.index');
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
        $nilai = Nilai::findOrFail($id);
        $siswa = Siswa::all();
        $guru = Guru::all();
        $standarkompetensi = StandarKompetensi::all();
        return view('admin.nilai.edit', compact('standarkompetensi', 'guru', 'siswa', 'nilai'));
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
        $nilai = Nilai::findOrFail($request->id);
        $nilai->siswa_id = $request->siswa_id;
        $nilai->guru_id = $request->guru_id;
        $nilai->SK_id = $request->SK_id;
        $nilai->nilai_angka = $request->nilai_angka;
        $nilai->nilai_huruf = $request->nilai_huruf;
        $nilai->save();
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Berhasil Mengedit <b>$nilai->nilai_angka</b>"
        ]);
        return redirect()->route('nilai.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nilai = Nilai::findOrFail($id)->delete();
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Berhasil menghapus data"
        ]);
        return redirect()->route('nilai.index');
    }
}
