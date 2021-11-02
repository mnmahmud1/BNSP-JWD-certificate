<?php
    include "koneksi.php";

    if(!isset($_COOKIE["keyS"])){
        header("Location: login.php");
    }

    $username = $_COOKIE["keyS"];
    $getData = mysqli_fetch_assoc(mysqli_query($conn, "SELECT id, username, nama, validasi FROM siswa WHERE username = '$username'"));
    
    if($getData["validasi"] == 1){
        header("Location: status.php");
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
        <title>Dashboard - PPDB SMP</title>
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
                            <a class="nav-link active" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Formulir
                            </a>
                            <a class="nav-link" href="status.php">
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
                        <h1 class="mt-4">Formulir Pendaftaran</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item active">Formulir</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body px-4">

                                <h3 class="mb-4">Data Diri</h3>
                                
                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="mb-3">
                                            <label for="urut" class="form-label">No Urut</label>
                                            <input type="text" name="urut" id="urut" class="form-control" value="<?= $getData["id"] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Username</label>
                                            <input type="text" name="username" id="username" class="form-control" value="<?= $getData["username"] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm">
                                        <div class="mb-3">
                                            <label for="namaLengkap" class="form-label">Nama Lengkap</label>
                                            <input type="text" name="namaLengkap" id="namaLengkap" class="form-control" value="<?= $getData["nama"] ?>" readonly>
                                        </div>
                                    </div>
                                </div>

                                <form method="post" action="function.php" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-sm">
                                            <div class="mb-3">
                                                <label for="foto" class="form-label">Foto Siswa (3x4) Berlatar Merah</label>
                                                <input type="file" name="foto" id="foto" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <div class="mb-3">
                                                <label for="nisn" class="form-label">Nomor Induk Siswa Nasional (NISN)</label>
                                                <input type="text" name="nisn" id="nisn" class="form-control" maxlength="10" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm">
                                            <div class="mb-3">
                                                <label for="jenkel" class="form-label">Jenis Kelamin</label>
                                                <select type="text" name="jenkel" id="jenkel" class="form-select" required>
                                                    <option value="">Pilih</option>
                                                    <option value="Laki-Laki">Laki-Laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <div class="mb-3">
                                                <label for="tempatLahir" class="form-label">Tempat Lahir</label>
                                                <input type="text" name="tempatLahir" id="tempatLahir" class="form-control" maxlength="50" required>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <div class="mb-3">
                                                <label for="tglLahir" class="form-label">Tanggal Lahir</label>
                                                <input type="date" name="tglLahir" id="tglLahir" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm">
                                            <div class="mb-3">
                                                <label for="asalSekolah" class="form-label">Asal Sekolah</label>
                                                <input type="text" name="asalSekolah" id="asalSekolah" class="form-control" maxlength="50" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm">
                                            <div class="mb-3">
                                                <label for="alamat" class="form-label">Alamat</label>
                                                <textarea name="alamat" id="alamat" cols="30" rows="2" class="form-control" required></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="mb-3">
                                                <label for="hpSiswa" class="form-label">No Hp (Opsional)</label>
                                                <input type="tel" name="hpSiswa" id="hpSiswa" class="form-control" maxlength="13">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="dropdown-divider"></div>

                                    <h3 class="mb-4 mt-4">Data Orang Tua/Wali</h3>

                                    <div class="row">
                                        <div class="col-sm">
                                            <div class="mb-3">
                                                <label for="namaWali" class="form-label">Nama</label>
                                                <input type="text" name="namaWali" id="namaWali" class="form-control" maxlength="50" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm">
                                            <div class="mb-3">
                                                <label for="hubSiswa" class="form-label">Hubungan Dengan Siswa</label>
                                                <select name="hubSiswa" id="hubSiswa" class="form-select" required>
                                                    <option value="">Pilih</option>
                                                    <option value="Ibu">Ibu</option>
                                                    <option value="Ayah">Ayah</option>
                                                    <option value="Paman">Paman</option>
                                                    <option value="Bibi">Bibi</option>
                                                    <option value="Kakak">Kakak</option>
                                                    <option value="Kerabat Lainnya">Kerabat Lainnya</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <div class="mb-3">
                                                <label for="pekerjaanWali" class="form-label">Pekerjaan</label>
                                                <select name="pekerjaanWali" id="pekerjaanWali" class="form-select" required>
                                                    <option value="">Pilih</option>
                                                    <option value="Wiraswasta">Wiraswasta</option>
                                                    <option value="Karyawan Swasta">Karyawan Swasta</option>
                                                    <option value="Buruh">Buruh</option>
                                                    <option value="Guru">Guru</option>
                                                    <option value="PNS">PNS</option>
                                                    <option value="Ibur Rumah Tangga">Ibur Rumah Tangga</option>
                                                    <option value="Lainnya">Lainnya</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <div class="mb-3">
                                                <label for="hpWali" class="form-label">No Hp</label>
                                                <input type="tel" name="hpWali" id="hpWali" class="form-control" maxlength="13" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm">
                                            <div class="mb-3">
                                                <label for="alamatWali" class="form-label">Alamat</label>
                                                <textarea name="alamatWali" id="alamatWali" cols="30" rows="2" class="form-control" required></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-lg btn-success"name="lanjutPendaftaran" onclick="return confirm('Setelah Melanjutkan, Identitas Kamu tidak dapat di-ubah kembali, Lanjutkan?')">Lanjutkan Pendaftaran</button>
                                    </div>
                                </form>

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
