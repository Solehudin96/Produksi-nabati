<div class="row g-3">
    <div class="col-md-6">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" name="nama" id="nama" class="form-control" 
               value="{{ old('nama', $karyawan->nama ?? '') }}" required>
    </div>

    <div class="col-md-6">
        <label for="nik" class="form-label">NIK</label>
        <input type="text" name="nik" id="nik" class="form-control" 
               value="{{ old('nik', $karyawan->nik ?? '') }}" required>
    </div>

    <div class="col-md-6">
        <label for="jabatan" class="form-label">Jabatan</label>
        <input type="text" name="jabatan" id="jabatan" class="form-control" 
               value="{{ old('jabatan', $karyawan->jabatan ?? '') }}" required>
    </div>

    <div class="col-md-6">
        <label for="departemen" class="form-label">Departemen</label>
        <input type="text" name="departemen" id="departemen" class="form-control" 
               value="{{ old('departemen', $karyawan->departemen ?? '') }}" required>
    </div>

    <div class="col-md-6">
        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
        <select name="jenis_kelamin" id="jenis_kelamin" class="form-select">
            <option value="">-- Pilih --</option>
            <option value="Laki-laki" {{ old('jenis_kelamin', $karyawan->jenis_kelamin ?? '') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
            <option value="Perempuan" {{ old('jenis_kelamin', $karyawan->jenis_kelamin ?? '') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
        </select>
    </div>

    <div class="col-md-6">
        <label for="no_telp" class="form-label">No. Telp</label>
        <input type="text" name="no_telp" id="no_telp" class="form-control" 
               value="{{ old('no_telp', $karyawan->no_telp ?? '') }}">
    </div>

    <div class="col-md-12">
        <label for="alamat" class="form-label">Alamat</label>
        <textarea name="alamat" id="alamat" rows="2" class="form-control">{{ old('alamat', $karyawan->alamat ?? '') }}</textarea>
    </div>

      <div class="col-md-6">
        <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
        <input type="date" name="tanggal_masuk" id="tanggal_masuk" 
               class="form-control"
               value="{{ old('tanggal_masuk', $karyawan->tanggal_masuk ?? '') }}">
    </div>


    <div class="col-md-6">
        <label for="status" class="form-label">Status</label>
        <select name="status" id="status" class="form-select">
            <option value="">-- Pilih --</option>
            <option value="Aktif" {{ old('status', $karyawan->status ?? '') == 'Aktif' ? 'selected' : '' }}>Aktif</option>
            <option value="Tidak Aktif" {{ old('status', $karyawan->status ?? '') == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
        </select>
    </div>
</div>
