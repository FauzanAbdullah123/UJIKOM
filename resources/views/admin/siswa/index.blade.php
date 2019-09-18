<title>Data Siswa</title>
<style>
.card-header{
    color: aliceblue;
}
</style>
@extends('layouts.app')
@section('content')
@include('admin.siswa.create')
@include('admin.siswa.edit')
@include('layouts.flash')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-dark">Data Siswa</div>
                <div class="card-body">
                <center>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah">Tambah</button>
                </center>
                <br>
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th><center>No</center></th>
                            <th><center>NISN Siswa</center></th>
                            <th><center>Nama Kompetensi Keahlian</center></th>
                            <th><center>Nama Siswa</center></th>
                            <th><center>Alamat Siswa</center></th>
                            <th><center>Tanggal Lahir Siswa</center></th>
                            <th><center>Foto Siswa</center></th>
                            <th colspan="3" style="text-align: center;">AKSI</th>
                        </tr>
                        @php $no = 1; @endphp
                        @foreach($siswa as $data)
                        <tr>
                            <td><center>{{ $no++ }}</center></td>
                            <td><center>{{ $data->siswa_NISN }}</center></td>
                            <td><center>{{ $data->kompetensikeahlian->kompetensi_nama }}</center></td>
                            <td><center>{{ $data->siswa_nama }}</center></td>
                            <td><center>{{ $data->siswa_alamat }}</center></td>
                            <td><center>{{ $data->siswa_tgl_lahir }}</center></td>
                            <td>
                                <center>
                                <img width="200px" height="200px"
                                src="{{ asset('assets/img/siswa/'. 
                                $data->foto.'') }}" alt="Foto" style="border-radius: 6%">
                                </center>
                            </td>

                            <td><center><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit" 
                                data-id="{{ $data->id }}" 
                                data-nisn="{{ $data->siswa_NISN }}"
                                data-komp="{{ $data->kompetensikeahlian->kompetensi_nama }}"
                                data-nama="{{ $data->siswa_nama }}"
                                data-alamat="{{ $data->siswa_alamat }}"
                                data-tgl="{{ $data->siswa_tgl_lahir }}">Edit</button>
                                </center>
                            </td>
                            <td>
                                <form action="{{ route('siswa.destroy',$data->id) }}" method="post">
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
        var nisn = button.data('nisn')
        var komp = button.data('komp')
        var nama = button.data('nama')
        var alamat = button.data('alamat')
        var tgl = button.data('tgl')
        // var foto = button.data('foto')
        var modal = $(this)
    
        modal.find('input[name="id"]').val(id)
        modal.find('input[name="siswa_NISN"]').val(nisn)
        modal.find('input[name="kompetensi_id"]').val(komp)
        modal.find('input[name="siswa_nama"]').val(nama)
        modal.find('input[name="siswa_alamat"]').val(alamat)
        modal.find('input[name="siswa_tgl_lahir"]').val(tgl)
        // modal.find('input[name="foto"]').val(foto)
    })  
        </script>
@endsection