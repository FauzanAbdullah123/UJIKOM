<title>Data Wali Murid</title>
<style>
.card-header{
    color: aliceblue;
}
</style>
@extends('layouts.app')
@section('content')
@include('admin.walimurid.create')
@include('admin.walimurid.edit')
@include('layouts.flash')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-dark">Data Wali Murid</div>
                <div class="card-body">
                <center>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah">Tambah</button>
                </center>
                <br>
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th><center>No</center></th>
                            <th><center>Nama Siswa</center></th>
                            <th><center>Nama Ayah/Wali</center></th>
                            <th><center>Pekerjaan Ayah</center></th>
                            <th><center>Nama Ibu/Wali</center></th>
                            <th><center>Pekerjaan Ibu</center></th>
                            <th><center>Alamat Wali</center></th>
                            <th><center>Telepon Wali</center></th>
                            <th colspan="3" style="text-align: center;">AKSI</th>
                        </tr>
                        @php $no = 1; @endphp
                        @foreach($walimurid as $data)
                        <tr>
                            <td><center>{{ $no++ }}</center></td>
                            <td><center>{{ $data->siswa->siswa_nama }}</center></td>
                            <td><center>{{ $data->wali_nama_ayah }}</center></td>
                            <td><center>{{ $data->wali_pekerjaan_ayah }}</center></td>
                            <td><center>{{ $data->wali_nama_ibu }}</center></td>
                            <td><center>{{ $data->wali_pekerjaan_ibu }}</center></td>
                            <td><center>{{ $data->wali_alamat }}</center></td>
                            <td><center>{{ $data->wali_telepon }}</center></td>

                            <td><center><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit" 
                                data-id="{{ $data->id }}" 
                                data-siswa="{{ $data->siswa->siswa_nama }}"
                                data-namaayah="{{ $data->wali_nama_ayah }}"
                                data-kerjaayah="{{ $data->wali_pekerjaan_ayah }}"
                                data-namaibu="{{ $data->wali_nama_ibu }}"
                                data-kerjaibu="{{ $data->wali_pekerjaan_ibu }}"
                                data-alamat="{{ $data->wali_alamat }}"
                                data-telepon="{{ $data->wali_telepon }}">Edit</button>
                                </center>
                            </td>
                            <td>
                                <form action="{{ route('walimurid.destroy',$data->id) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button class="btn btn-sm btn-danger" type="submit">
                                        Hapus Data
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            </div>
        </div>
    </div>
    <script>
        $('#edit').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id')
        var siswa = button.data('siswa')
        var namaayah = button.data('namaayah')
        var kerjaayah = button.data('kerjaayah')
        var namaibu = button.data('namaibu')
        var kerjaibu = button.data('kerjaibu')
        var alamat = button.data('alamat')
        var telepon = button.data('telepon')
        var modal = $(this)
    
        modal.find('input[name="id"]').val(id)
        modal.find('input[name="siswa_id"]').val(siswa)
        modal.find('input[name="wali_nama_ayah"]').val(namaayah)
        modal.find('input[name="wali_pekerjaan_ayah"]').val(kerjaayah)
        modal.find('input[name="wali_nama_ibu"]').val(namaibu)
        modal.find('input[name="wali_pekerjaan_ibu"]').val(kerjaibu)
        modal.find('input[name="wali_alamat"]').val(alamat)
        modal.find('input[name="wali_telepon"]').val(telepon)

    })  
        </script>
@endsection