@extends('pages.home')

@section('title', 'Tambah Dosen')

@section('content')
    <div class="container">
        <h1>Tambah Dosen</h1>
        <form action="{{ route('dosens.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nidn">NIDN <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('nidn') is-invalid @enderror" id="nidn" name="nidn" value="{{ old('nidn') }}" required>
                @error('nidn')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="nama">Nama Lengkap <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}" required>
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="gender">Jenis Kelamin <span class="text-danger">*</span></label>
                <select class="form-control @error('gender') is-invalid @enderror" id="gender" name="gender" required>
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="L" {{ old('gender') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="P" {{ old('gender') == 'P' ? 'selected' : '' }}>Perempuan</option>
                </select>
                @error('gender')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="tempat_lahir">Tempat Lahir <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required>
                @error('tempat_lahir')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="tgl_lahir">Tanggal Lahir <span class="text-danger">*</span></label>
                <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" id="tgl_lahir" name="tgl_lahir" value="{{ old('tgl_lahir') }}" required>
                @error('tgl_lahir')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="pendidikan">Pendidikan Terakhir <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('pendidikan') is-invalid @enderror" id="pendidikan" name="pendidikan" value="{{ old('pendidikan') }}" required>
                @error('pendidikan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group">
                <label for="alamat">Alamat <span class="text-danger">*</span></label>
                <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" required>{{ old('alamat') }}</textarea>
                @error('alamat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group">
                <label for="id_jurusan">Jurusan <span class="text-danger">*</span></label>
                <select class="form-control @error('id_jurusan') is-invalid @enderror" id="id_jurusan" name="id_jurusan" required>
                    <option value="">Pilih Jurusan</option>
                    @foreach($jurusan as $j)
                        <option value="{{ $j->id_jurusan }}" {{ old('id_jurusan') == $j->id_jurusan ? 'selected' : '' }}>{{ $j->nama_jurusan }}</option>
                    @endforeach
                </select>
                @error('id_jurusan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="id_prodi">Program Studi <span class="text-danger">*</span></label>
                <select class="form-control @error('id_prodi') is-invalid @enderror" id="id_prodi" name="id_prodi" required>
                    <option value="">Pilih Program Studi</option>
                    @foreach($prodi as $p)
                        <option value="{{ $p->id_prodi }}" {{ old('id_prodi') == $p->id_prodi ? 'selected' : '' }}>{{ $p->nama_prodi }}</option>
                    @endforeach
                </select>
                @error('id_prodi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="id_jabatan">Jabatan <span class="text-danger">*</span></label>
                <select class="form-control @error('id_jabatan') is-invalid @enderror" id="id_jabatan" name="id_jabatan" required>
                    <option value="">Pilih Jabatan</option>
                    @foreach($jabatan as $jb)
                        <option value="{{ $jb->id_jabatan }}" {{ old('id_jabatan') == $jb->id_jabatan ? 'selected' : '' }}>{{ $jb->nama_jabatan }}</option>
                    @endforeach
                </select>
                @error('id_jabatan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="id_golongan">Golongan <span class="text-danger">*</span></label>
                <select class="form-control @error('id_golongan') is-invalid @enderror" id="id_golongan" name="id_golongan" required>
                    <option value="">Pilih Golongan</option>
                    @foreach($golongan as $g)
                        <option value="{{ $g->id_golongan }}" {{ old('id_golongan') == $g->id_golongan ? 'selected' : '' }}>{{ $g->nama_golongan }}</option>
                    @endforeach
                </select>
                @error('id_golongan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- New Fields -->

            <div class="form-group">
                <label for="password">Password <span class="text-danger">*</span></label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="link_sinta">Link Sinta <span class="text-danger">*</span></label>
                <input type="url" class="form-control @error('link_sinta') is-invalid @enderror" id="link_sinta" name="link_sinta" value="{{ old('link_sinta') }}" required>
                @error('link_sinta')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="schoolar">Schoolar <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('schoolar') is-invalid @enderror" id="schoolar" name="schoolar" value="{{ old('schoolar') }}" required>
                @error('schoolar')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="sinta">Sinta <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('sinta') is-invalid @enderror" id="sinta" name="sinta" value="{{ old('sinta') }}" required>
                @error('sinta')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email <span class="text-danger">*</span></label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="no_hp">Nomor HP <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" value="{{ old('no_hp') }}" required>
                @error('no_hp')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="status">Status <span class="text-danger">*</span></label>
                <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                    <option value="">Pilih Status</option>
                    <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="nonaktif" {{ old('status') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                </select>
                @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="foto">Foto</label>
                <input type="file" name="foto" class="form-control">
                @error('foto')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>



            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('dosens.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
