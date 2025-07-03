@extends('pages.home')

@section('title', 'Detail Data Mahasiswa PKL')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary text-center">Detail Data Mahasiswa PKL</h4>
        </div>
        <div class="card-body">
            <!-- Informasi Utama -->
            <section class="mb-5">

                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th width="30%">Nama Mahasiswa</th>
                            <td>{{$mahasiswaPkl->mahasiswa->nama}}</td>
                        </tr>
                        <tr>
                            <th>Judul PKL</th>
                            <td>{{ $mahasiswaPkl->judul ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Tempat PKL</th>
                            <td>{{ $mahasiswaPkl->registrasi->tempatPkl->nama_perusahaan ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Tahun PKL</th>
                            <td>{{ $mahasiswaPkl->tahun_pkl ?? '-' }}</td>
                        </tr>
                    </tbody>
                </table>
            </section>

            <!-- Informasi Sidang -->
            <section class="mb-5">

                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th width="30%">Ruangan Sidang</th>
                            <td>{{ $mahasiswaPkl->ruangan_sidang ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Dosen Pembimbing</th>
                            <td>{{ $mahasiswaPkl->registrasi->pembimbing->nama ?? 'Belum Ada Pembimbing' }}</td>
                        </tr>
                        <tr>
                            <th>Sesi</th>
                            <td>
                                {{ $mahasiswaPkl->sesi ? $mahasiswaPkl->sesi->nama_sesi . ' (' . $mahasiswaPkl->sesi->jam_mulai . ' - ' . $mahasiswaPkl->sesi->jam_berakhir . ')' : '-' }}
                            </td>
                        </tr>
                        <tr>
                            <th>Dosen Penguji</th>
                            <td>{{ $mahasiswaPkl->dosenpenguji->nama ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Pembimbing PKL Industri</th>
                            <td>{{ $mahasiswaPkl->pembimbing_pkl ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Sidang</th>
                            <td>{{ $mahasiswaPkl->tanggal_sidang ?? '-' }}</td>
                        </tr>
                    </tbody>
                </table>
            </section>

            <!-- Nilai dan Rekomendasi -->
            <section class="mb-5">

                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th width="30%">Nilai Dosen Pembimbing</th>
                            <td>
                                @if ($dosen_pembimbing)
                                    {{ $dosen_pembimbing->registrasi->nama ?? 'Nama tidak tersedia' }} ({{ $dosen_pembimbing->total_nilai ?? '-' }})
                                @else
                                    Data penilaian tidak tersedia.
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Nilai Penguji</th>
                            <td>{{ $dosen_penguji->total_nilai ?? 'Data tidak tersedia' }}</td>
                        </tr>
                        <tr>
                            <th>Nilai Pembimbing Industri</th>
                            <td>{{ $mahasiswaPkl->nilai_pembimbing_industri ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Total Nilai Akhir</th>
                            <td>{{ $mahasiswaPkl->total_nilai_akhir ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Rekomendasi</th>
                            <td>{{ $mahasiswaPkl->rekomendasi ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Informasi Detail</th>
                            <td>{{ $mahasiswaPkl->informasi_detail ?? '-' }}</td>
                        </tr>
                    </tbody>
                </table>
            </section>

            <!-- Dokumen -->
            <section>

                <div class="row">
                    @foreach (['dokument_nilai_industri' => 'Dokumen Nilai Industri', 'dokument_pkl' => 'Dokumen PKL', 'dokument_pkl_revisi' => 'Dokumen PKL Revisi', 'dokument_kuisioner' => 'Dokumen Kuisioner'] as $field => $label)
                    <div class="col-md-6 mb-4">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h6 class="card-title fw-bold">{{ $label }}</h6>
                                <div>
                                    @if ($mahasiswaPkl->$field)
                                        <a href="{{ asset('storage/'.$mahasiswaPkl->$field) }}" class="btn btn-sm btn-warning" target="_blank">
                                            <i class="fas fa-file-download"></i> Lihat Dokumen
                                        </a>
                                    @else
                                        <span class="text-muted">Tidak ada dokumen</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>

            <div class="text-end mt-4">
                <a href="{{ route('mahasiswa_pkl.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
