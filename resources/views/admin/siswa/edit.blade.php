<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('siswa.update', 'test') }}" method="post"  ENCTYPE="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="id" id="id">
                <div class="form-group">
                  <label for="nama">NISN Siswa</label>
                  <input type="text" name="siswa_NISN" id="siswa_NISN" class="form-control" placeholder="NISN Siswa" required>
                </div>
                <div class="form-group">
                    <label for="">Nama Kompetensi Keahlian</label>
                    <select name="kompetensi_id" class="form-control">
                        @foreach($kompetensikeahlian as $data)
                            <option value="{{ $data->id }}">{{ $data->kompetensi_nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="nama">Nama Siswa</label>
                    <input type="text" name="siswa_nama" id="siswa_nama" class="form-control" placeholder="Nama Siswa" required>
                </div>
                <div class="form-group">
                    <label for="nama">Alamat Siswa</label>
                    <textarea name="siswa_alamat" id="siswa_alamat" cols="30" rows="10" class="form-control" placeholder="Alamat Siswa" required></textarea>
                </div>
                <div class="form-group">
                    <label for="nama">Tanggal Lahir Siswa</label>
                    <input type="date" name="siswa_tgl_lahir" id="siswa_tgl_lahir" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Foto Siswa</label>
                    <input class="form-control" type="file" name="foto" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
            </div>
        </div>
    </div>
</div>