<?php
    if(!isset($_COOKIE["key"])){
        header("Location: login.php");
    }

    include "../koneksi.php";

    $getSiswa = mysqli_query($conn, "SELECT id, username, foto, nisn, nama, asal_sekolah, status FROM siswa");

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard Admin - PPDB SMP</title>
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
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
                        <li><a class="dropdown-item" href="functionAdmin.php?logout=1">Logout</a></li>
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
                                Informasi
                            </a>
                            <a class="nav-link active" href="kelolaPendaftar.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Kelola Pendaftar
                            </a>
                            <a class="nav-link" href="kelolaAkun.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Kelola Akun
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Kelola Pendaftar</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item active">Pendaftar</li>
                        </ol>

                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <table id="pendaftar" class="display">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NISN</th>
                                                <th>Foto</th>
                                                <th>Nama</th>
                                                <th>Asal Sekolah</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                                <th>Detail</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>NISN</th>
                                                <th>Foto</th>
                                                <th>Nama</th>
                                                <th>Asal Sekolah</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                                <th>Detail</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php $no = 1 ?>
                                            <?php foreach ($getSiswa as $siswa) : ?>
                                                <tr>
                                                    <td><?= $no ?></td>
                                                    <td><?= $siswa["nisn"] ?></td>
                                                    <td width="100px">
                                                        <img src="../assets/img/<?= $siswa["foto"] ?>" class="w-50" alt="" srcset="">
                                                    </td>
                                                    <td><?= $siswa["nama"] ?></td>
                                                    <td><?= $siswa["asal_sekolah"] ?></td>
                                                    <td>
                                                        <?php if($siswa["status"] == "") : ?>
                                                            <div class="badge bg-primary">Ditinjau</div>
                                                        <?php elseif($siswa["status"] == "DT") : ?>    
                                                            <div class="badge bg-success">Diterima</div>
                                                        <?php elseif($siswa["status"] == "C") : ?>    
                                                            <div class="badge bg-secondary">Cadangan</div>
                                                        <?php elseif($siswa["status"] == "TDT") : ?>  
                                                            <div class="badge bg-danger">Tidak Diterima</div>
                                                        <?php endif ?>
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="btn btn-sm btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                                pilih
                                                            </button>
                                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                                <li><a class="dropdown-item" href="functionAdmin.php?action=1&stat=DT&id=<?= $siswa["id"] ?>">Terima</a></li>
                                                                <li><a class="dropdown-item" href="functionAdmin.php?action=1&stat=C&id=<?= $siswa["id"] ?>">Cadangkan</a></li>
                                                                <li><a class="dropdown-item" href="functionAdmin.php?action=1&stat=TDT&id=<?= $siswa["id"] ?>">Tolak</a></li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="detailSiswa.php?user=<?= $siswa["username"] ?>" class="btn btn-sm btn-info">Detail</a>
                                                    </td>
                                                </tr>
                                                <?php $no++ ?>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="../js/scripts.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
        <script>
            $(document).ready( function () {
                $("#pendaftar").DataTable();
            } );
        </script>
        
    </body>
</html>
