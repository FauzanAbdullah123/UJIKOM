<title>Data Nilai</title>
<style>
.card-header{
    color: aliceblue;
}
</style>
@extends('layouts.app')
@section('content')
@include('admin.nilai.create')
@include('admin.nilai.edit')
@include('layouts.flash')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-dark">Data Nilai</div>
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
                            <th><center>Nama Guru</center></th>
                            <th><center>Nama Standar Kompetensi</center></th>
                            <th><center>Nilai Angka</center></th>
                            <th><center>Nilai Huruf</center></th>
                            <th colspan="3" style="text-align: center;">AKSI</th>
                        </tr>
                        @php $no = 1; @endphp
                        @foreach($nilai as $data)
                        <tr>
                            <td><center>{{ $no++ }}</center></td>
                            <td><center>{{ $data->siswa->siswa_nama }}</center></td>
                            <td><center>{{ $data->guru->guru_nama }}</center></td>
                            <td><center>{{ $data->standarkompetensi->SK_nama }}</center></td>
                            <td><center>{{ $data->nilai_angka }}</center></td>
                            <td><center>{{ $data->nilai_huruf }}</center></td>

                            <td><center><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit" 
                                data-id="{{ $data->id }}" 
                                data-siswa="{{ $data->siswa->siswa_nama }}"
                                data-guru="{{ $data->guru->guru_nama }}"
                                data-sk="{{ $data->standarkompetensi->SK_nama }}"
                                data-nilaiangka="{{ $data->nilai_angka }}"
                                data-nilaihuruf="{{ $data->nilai_huruf }}">Edit</button>
                                </center>
                            </td>
                            <td>
                                <form action="{{ route('nilai.destroy',$data->id) }}" method="post">
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
        var guru = button.data('guru')
        var sk = button.data('sk')
        var nilaiangka = button.data('nilaiangka')
        var nilaihuruf = button.data('nilaihuruf')
        var modal = $(this)
    
        modal.find('input[name="id"]').val(id)
        modal.find('input[name="siswa_id"]').val(siswa)
        modal.find('input[name="guru_id"]').val(guru)
        modal.find('input[name="SK_id"]').val(sk)
        modal.find('input[name="nilai_angka"]').val(nilaiangka)
        modal.find('input[name="nilai_huruf"]').val(nilaihuruf)
    })  
        </script>
@endsection