@extends('pages.home')

@section('title', 'Detail Dosen')

@section('content')
    <div class="container my-5">
        <h1 class="mb-4 text-center">Detail Dosen</h1>
        <div class="card shadow-lg">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 text-center">
                        @if($dosen->foto)
                            <img src="{{ asset('storage/' . $dosen->foto) }}" alt="Foto Dosen" class="img-fluid rounded" width="250" height="250">
                        @else
                            <p><strong>Foto:</strong> Tidak ada foto</p>
                        @endif
                    </div>
                    <div class="col-md-8">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>NIDN</th>
                                    <td>{{ $dosen->nidn }}</td>
                                </tr>
                                <tr>
                                    <th>Nama</th>
                                    <td>{{ $dosen->nama }}</td>
                                </tr>
                                <tr>
                                    <th>Jenis Kelamin</th>
                                    <td>{{ $dosen->gender == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                                </tr>
                                <tr>
                                    <th>Tempat Lahir</th>
                                    <td>{{ $dosen->tempat_lahir }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Lahir</th>
                                    <td>{{ \Carbon\Carbon::parse($dosen->tgl_lahir)->format('d-m-Y') }}</td>
                                </tr>
                                <tr>
                                    <th>Pendidikan Terakhir</th>
                                    <td>{{ $dosen->pendidikan }}</td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td>{{ $dosen->alamat }}</td>
                                </tr>
                                <tr>
                                    <th>Jurusan</th>
                                    <td>{{ $dosen->jurusan->nama_jurusan }}</td>
                                </tr>
                                <tr>
                                    <th>Program Studi</th>
                                    <td>{{ $dosen->prodi->nama_prodi }}</td>
                                </tr>
                                <tr>
                                    <th>Jabatan</th>
                                    <td>{{ $dosen->jabatan->nama_jabatan }}</td>
                                </tr>
                                <tr>
                                    <th>Golongan</th>
                                    <td>{{ $dosen->golongan->nama_golongan }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $dosen->email }}</td>
                                </tr>
                                <tr>
                                    <th>Nomor HP</th>
                                    <td>{{ $dosen->no_hp }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>{{ $dosen->status == 'aktif' ? 'Aktif' : 'Nonaktif' }}</td>
                                </tr>
                                <tr>
                                    <th>Link Sinta</th>
                                    <td><a href="{{ $dosen->link_sinta }}" target="_blank">{{ $dosen->link_sinta }}</a></td>
                                </tr>
                                <tr>
                                    <th>Schoolar</th>
                                    <td>{{ $dosen->schoolar }}</td>
                                </tr>
                                <tr>
                                    <th>Sinta</th>
                                    <td>{{ $dosen->sinta }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="mt-3 text-center">
                    <a href="{{ route('dosens.index') }}" class="btn btn-primary">Kembali ke Daftar Dosen</a>
                </div>
            </div>
        </div>
    </div>
@endsection
