<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistem Penjadwalan">
    <meta name="author" content="">

    <title>Sistem Penjadwalan</title>

    <!-- Custom fonts and styles -->
    <link href="{{ asset('/template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">
    <link href="{{ asset('/template/css/sb-admin-2.min.css') }}" rel="stylesheet">

    {{-- <style>
        /* Sidebar tetap di sisi kiri */
        #accordionSidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 250px; /* Sesuaikan dengan lebar sidebar */
            overflow-y: auto; /* Scroll jika konten sidebar lebih tinggi */
            z-index: 1000;
        }

        /* Konten utama tidak melewati sidebar */
        #content-wrapper {
            margin-left: 250px; /* Sesuaikan dengan lebar sidebar */
            min-height: 100vh; /* Pastikan konten utama memenuhi tinggi layar */
            overflow: hidden; /* Hapus scroll tambahan */
        }

        /* Topbar tetap di atas */
        nav.navbar {
            position: fixed;
            top: 0;
            left: 250px; /* Sesuaikan dengan lebar sidebar */
            width: calc(100% - 250px); /* Sesuaikan dengan konten utama */
            z-index: 1000;
        }

        /* Konten utama menyesuaikan dengan topbar */
        #content {
            margin-top: 56px; /* Tinggi topbar */
            padding-bottom: 50px; /* Ruang untuk footer */
            overflow-y: auto; /* Scroll diaktifkan hanya untuk konten utama */
            height: calc(100vh - 56px - 50px); /* Kurangi tinggi topbar dan footer */
        }

        /* Footer tetap di bawah */
        footer.sticky-footer {
            position: fixed;
            bottom: 0;
            left: 250px; /* Sesuaikan dengan lebar sidebar */
            width: calc(100% - 250px); /* Sesuaikan dengan konten utama */
            z-index: 1000;
        }

        /* Hilangkan scroll ekstra pada body */
        body {
            overflow: hidden;
        }
    </style> --}}
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-graduation-cap"></i>

                </div>
                <div class="sidebar-brand-text mx-3">Sistem Penjadwalan</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Dashboard Link -->
            <li class="nav-item">
                <a class="nav-link" href="/dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">Data Pengguna</div>
            <!-- Links -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDataPengguna" aria-expanded="false" aria-controls="collapseDataPengguna">
                    <i class="fas fa-users"></i>
                    <span>Data Pengguna</span>
                </a>
                <div id="collapseDataPengguna" class="collapse" aria-labelledby="headingDataPengguna" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Kelola Data:</h6>
                        <a class="collapse-item" href="/mahasiswa">Mahasiswa</a>
                        <a class="collapse-item" href="/dosens">Dosen</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">Data Master</div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDataMaster" aria-expanded="false" aria-controls="collapseDataMaster">
                    <i class="fas fa-database"></i>
                    <span>Data Master</span>
                </a>
                <div id="collapseDataMaster" class="collapse" aria-labelledby="headingDataMaster" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Kelola Data Master:</h6>
                        <a class="collapse-item" href="/ruangan">Ruangan</a>
                        <a class="collapse-item" href="/prodi">Prodi</a>
                        <a class="collapse-item" href="/jurusan">Jurusan</a>
                        <a class="collapse-item" href="/jenjang">Jenjang</a>
                        <a class="collapse-item" href="/golongan">Golongan</a>
                        <a class="collapse-item" href="/sesi">Sesi</a>
                        <a class="collapse-item" href="/jabatan">Jabatan</a>
                    </div>
                </div>
            </li>


            <!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">Data PKL</div>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDataPKL" aria-expanded="false" aria-controls="collapseDataPKL">
        <i class="fas fa-clipboard-list"></i>
        <span>Data PKL</span>
    </a>
    <div id="collapseDataPKL" class="collapse" aria-labelledby="headingDataPKL" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Kelola Data PKL:</h6>
            <a class="collapse-item" href="/registrasi_pkl">Registrasi PKL</a>
            <a class="collapse-item" href="/penjadwalan_pkl">Penjadwalan PKL</a>
            <a class="collapse-item" href="/laporan_pkl">Laporan PKL</a>
            <a class="collapse-item" href="/tempat_pkl">Tempat Pkl</a>
        </div>
    </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">Data Sempro</div>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDataSempro" aria-expanded="false" aria-controls="collapseDataSempro">
        <i class="fas fa-book"></i>
        <span>Data Sempro</span>
    </a>
    <div id="collapseDataSempro" class="collapse" aria-labelledby="headingDataSempro" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Kelola Data Sempro:</h6>
            <a class="collapse-item" href="/usulan_sempro">Usulan Sempro</a>
            <a class="collapse-item" href="/penjadwalan_sempro">Penjadwalan Sempro</a>
            <a class="collapse-item" href="/laporan_sempro">Laporan Sempro</a>
        </div>
    </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">Data TA</div>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDataTA" aria-expanded="false" aria-controls="collapseDataTA">
        <i class="fas fa-graduation-cap"></i>
        <span>Data TA</span>
    </a>
    <div id="collapseDataTA" class="collapse" aria-labelledby="headingDataTA" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Kelola Data TA:</h6>
            <a class="collapse-item" href="/usulan_ta">Usulan TA</a>
            <a class="collapse-item" href="/penjadwalan_ta">Penjadwalan TA</a>
            <a class="collapse-item" href="/laporan_ta">Laporan TA</a>
        </div>
    </div>
</li>


<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">Data Hak Akses</div>

<!-- Links for Data Hak Akses -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDataHakAkses" aria-expanded="false" aria-controls="collapseDataHakAkses">
        <i class="fas fa-user-lock"></i>
        <span>Data Hak Akses</span>
    </a>
    <div id="collapseDataHakAkses" class="collapse" aria-labelledby="headingDataHakAkses" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Kelola Hak Akses:</h6>
            <a class="collapse-item" href="{{ route('roles.index') }}">Role</a>
            <a class="collapse-item" href="{{ route('users.index') }}">Users</a>
        </div>
    </div>
</li>
            <!-- Divider -->
            <hr class="sidebar-divider">
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">



                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Topbar Search -->
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-3">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                <i class="fas fa-user-circle fa-lg"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </li>
                    </ul>



                    <form class="d-none d-sm-inline-block form-inline ml-auto">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for...">
                            <div class="input-group-append">
                                <button class="btn btn-dark" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>



                    </form>

                </nav>


                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @yield('content')
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>&copy; Sistem Penjadwalan 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
</body>

</html>
