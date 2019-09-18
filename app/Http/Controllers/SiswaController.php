<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use App\KompetensiKeahlian;
use File;
use Session;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Siswa::all();
        $kompetensikeahlian = KompetensiKeahlian::all();
        return view('admin.siswa.index', compact('kompetensikeahlian', 'siswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kompetensikeahlian = KompetensiKeahlian::all();
        return view('admin.siswa.create', compact('kompetensikeahlian'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $siswa = new Siswa;
        $siswa->siswa_NISN = $request->siswa_NISN;
        $siswa->kompetensi_id = $request->kompetensi_id;
        $siswa->siswa_nama = $request->siswa_nama;
        $siswa->siswa_alamat = $request->siswa_alamat;
        $siswa->siswa_tgl_lahir = $request->siswa_tgl_lahir;
        if ($request->hasFile('foto')){
            $file = $request->file('foto');
            $path = public_path().
                            '/assets/img/siswa/';
            $filename = str_random(6).'_'
                        .$file->getClientOriginalName();
            $uploadSuccess = $file->move(
                $path,
                $filename
            );
            $siswa->foto = $filename;
        }
        $siswa->save();
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Berhasil Menyimpan <b>$siswa->siswa_nama</b>"
        ]);
        return redirect()->route('siswa.index');
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
        $siswa = Siswa::findOrFail($id);
        $kompetensikeahlian = KompetensiKeahlian::all();
        return view('admin.siswa.edit', compact('kompetensikeahlian', 'siswa'));
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
        $siswa = Siswa::findOrFail($request->id);
        $siswa->siswa_NISN = $request->siswa_NISN;
        $siswa->kompetensi_id = $request->kompetensi_id;
        $siswa->siswa_nama = $request->siswa_nama;
        $siswa->siswa_alamat = $request->siswa_alamat;
        $siswa->siswa_tgl_lahir = $request->siswa_tgl_lahir;
        if ($request->hasFile('foto')){
            $file = $request->file('foto');
            $path = public_path().
                            '/assets/img/siswa/';
            $filename = str_random(6).'_'
                        .$file->getClientOriginalName();
            $uploadSuccess = $file->move(
                $path,
                $filename
            );
            // hapus foto lama, jika ada
            if ($siswa->foto){
                $old_foto = $siswa->foto;
                $filepath = public_path()
                .'/assets/img/siswa/'
                .$siswa->foto;    
                try {
                    File::delete($filepath);
                } catch (FileNotFoundException $e) {
                    // File sudah dihapus/tidak ada
                }
            }
            $siswa->foto = $filename;
        }
        $siswa->save();
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Berhasil Mengedit <b>$siswa->siswa_nama</b>"
        ]);
        return redirect()->route('siswa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        if ($siswa->siswa_foto){
            $old_foto = $siswa->siswa_foto;
            $filepath = public_path()
            .'/assets/img/siswa'
            .$siswa->siswa_foto;    
            try {
                File::delete($filepath);
            } catch (FileNotFoundException $e) {
                // File sudah dihapus/tidak ada
            }
        }
        $siswa->delete();
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Berhasil menghapus data"
        ]);
        return redirect()->route('siswa.index');
    }
}
