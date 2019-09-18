<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WaliMurid;
use App\Siswa;
use Session;

class WaliMuridController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $walimurid = WaliMurid::all();
        $siswa = Siswa::all();
        return view('admin.walimurid.index', compact('siswa', 'walimurid'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siswa = Siswa::all();
        return view('admin.walimurid.create', compact('siswa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $walimurid = new WaliMurid;
        $walimurid->siswa_id = $request->siswa_id;
        $walimurid->wali_nama_ayah = $request->wali_nama_ayah;
        $walimurid->wali_pekerjaan_ayah = $request->wali_pekerjaan_ayah;
        $walimurid->wali_nama_ibu = $request->wali_nama_ibu;
        $walimurid->wali_pekerjaan_ibu = $request->wali_pekerjaan_ibu;
        $walimurid->wali_alamat = $request->wali_alamat;
        $walimurid->wali_telepon = $request->wali_telepon;
        $walimurid->save();
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Berhasil Menyimpan <b>$walimurid->wali_nama_ayah</b>"
        ]);
        return redirect()->route('walimurid.index');
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
        $walimurid = WaliMurid::findOrFail($id);
        $siswa = Siswa::all();
        return view('admin.walimurid.edit', compact('siswa', 'walimurid'));
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
        $walimurid = WaliMurid::findOrFail($request->id);
        $walimurid->siswa_id = $request->siswa_id;
        $walimurid->wali_nama_ayah = $request->wali_nama_ayah;
        $walimurid->wali_pekerjaan_ayah = $request->wali_pekerjaan_ayah;
        $walimurid->wali_nama_ibu = $request->wali_nama_ibu;
        $walimurid->wali_pekerjaan_ibu = $request->wali_pekerjaan_ibu;
        $walimurid->wali_alamat = $request->wali_alamat;
        $walimurid->wali_telepon = $request->wali_telepon;
        $walimurid->save();
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Berhasil Mengedit <b>$walimurid->wali_nama_ayah</b>"
        ]);
        return redirect()->route('walimurid.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $walimurid = WaliMurid::findOrFail($id)->delete();
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Berhasil menghapus data"
        ]);
        return redirect()->route('walimurid.index');
    }
}
