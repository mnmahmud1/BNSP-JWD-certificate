<?php
    include "koneksi.php";

    if(!isset($_COOKIE["keyS"])){
        header("Location: login.php");
    }

    $username = $_COOKIE["keyS"];
    $getData = mysqli_fetch_assoc(mysqli_query($conn, "SELECT id, nisn, foto, nama, asal_sekolah, alamat, status, validasi FROM siswa WHERE username = '$username'"));
    
    if($getData["validasi"] != 1){
        header("Location: index.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Status Kelulusan - PPDB SMP</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">PPDB SMP</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <span class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0"></span>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="function.php?logoutS=1">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Dashboard</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Formulir
                            </a>
                            <a class="nav-link active" href="status.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Status Pendaftaran
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Status Pendaftaran</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item active">Status</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body px-4">

                                <div class="row">
                                    <div class="col-sm">
                                        <p> <strong>Formulir pendaftaran sudah berhasil dikirimkan</strong>, silahkan tunggu beberapa waktu untuk mendapatan informasi kelulusan.</p>
                                    </div>
                                </div>

                                <table class="table table-bordered align-middle">
                                    <tr>
                                        <th colspan="3" class="bg-warning">Data Diri Pendaftar</th>
                                    </tr>
                                    <tr>
                                        <td width="200px" rowspan="7">
                                            <img src="assets/img/<?= $getData["foto"] ?>" class="card-img w-100" alt="">
                                        </td>
                                        <td class="fw-bold">No Urut Pendaftaran</td>
                                        <td><?= $getData["id"] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">NISN</td>
                                        <td><?= $getData["nisn"] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Nama Siswa</td>
                                        <td><?= $getData["nama"] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Asal Sekolah</td>
                                        <td><?= $getData["asal_sekolah"] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Alamat Siswa</td>
                                        <td><?= $getData["alamat"] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Status Pendaftaran</td>
                                        <td>
                                            <?php if($getData["status"] == "") : ?>
                                                <div class="badge rounded-pill bg-primary px-4 py-2">
                                                    Sedang Ditinjau
                                                </div>
                                            <?php elseif($getData["status"] == "DT") : ?>
                                                <div class="badge rounded-pill bg-success px-4 py-2">
                                                    Diterima
                                                </div>
                                            <?php elseif($getData["status"] == "C") : ?>
                                                <div class="badge rounded-pill bg-secondary px-4 py-2">
                                                    Cadangan
                                                </div>
                                            <?php elseif($getData["status"] == "TDT") : ?>
                                                <div class="badge rounded-pill bg-danger px-4 py-2">
                                                    Tidak Diterima
                                                </div>
                                            <?php endif ?>
                                        </td>
                                    </tr>
                                </table>

                                <div class="dropdown-divider my-4"></div>

                                <div class="row">
                                    <div class="col-sm">
                                        <div class="d-flex justify-content-center">
                                            <a href="cetakPendaftaran.php?user=<?= $username ?>" target="_blank" class="btn btn-primary">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
                                                    <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
                                                    <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                                                </svg>
                                                Cetak Informasi Pendaftaran
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <?php if($getData["status"] == "DT") : ?>
                                    <div class="dropdown-divider my-4"></div>

                                    <h4 class="text-center fw-bold text-success">Selamat! Kamu lulus tahap administrasi berkas</h5>
                                    <p class="text-center">Calon siswa diharapkan melakukan <strong>Daftar Ulang pada tanggal 10-20 Desember 2021</strong>, dengan membawa surat keterangan kelulusan</p>
                                    <p class="text-center text-danger">Silakan klik tombol di bawah ini untuk melakukan pencetakan surat keterangan kelulusan</p>

                                    <div class="row">
                                        <div class="col-sm">
                                            <div class="d-flex justify-content-center">
                                                <a href="cetakLulus.php?user=<?= $username ?>" target="_blank" class="btn btn-success">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
                                                        <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
                                                        <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                                                    </svg>
                                                    Cetak Keterangan Kelulusan
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif ?>

                                <div class="dropdown-divider my-4"></div>

                                <div class="row">
                                    <div class="col-sm-6">
                                    <table class="table table-bordered align-middle">
                                        <tr>
                                            <th colspan="2">Detail Pendaftaran</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="badge rounded-pill bg-primary px-4 py-2">
                                                    Sedang Ditinjau
                                                </div>
                                            </td>
                                            <td>Formulir pendaftaran sedang dalam proses verifikasi panitia PPDB</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="badge rounded-pill bg-success px-4 py-2">
                                                    Diterima
                                                </div>
                                            </td>
                                            <td>Calon siswa diterima oleh sekolah</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="badge rounded-pill bg-secondary px-4 py-2">
                                                    Cadangan
                                                </div>
                                            </td>
                                            <td>Calon siswa dinyatakan sebagai siswa cadangan dan akan di terima apabila ada siswa yang ber-status diterima tidak melakukan daftar ulang</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="badge rounded-pill bg-danger px-4 py-2">
                                                    Tidak Diterima
                                                </div>
                                            </td>
                                            <td>Calon siswa tidak diterima dikarenakan kuota sudah terpenuhi</td>
                                        </tr>
                                    </table>
                                    </div>
                                </div>

                                

                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; PPDB SMP 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
