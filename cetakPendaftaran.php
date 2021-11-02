<?php

require_once __DIR__ . '/vendor/autoload.php';

include "koneksi.php";
$user = $_GET["user"];

$getSiswa = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM siswa WHERE username = '$user'"));

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML('<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cetak Informasi Pendaftaran</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>

        <h1 class="text-center border-bottom" style="font-size: 24">KARTU INFORMASI PENDAFTARAN SMP XYZ</h1>

        <p style="font-weight: bold">Identitas Siswa</p>
        <div class="row">
            <div class="col-sm-4">
                <table class="table table-borderless">
                    <tr>
                        <td>Nomor Urut</td>
                        <td>: '. $getSiswa["id"] .'</td>
                        <td rowspan="12" width="50px">
                            <img src="assets/img/'. $getSiswa["foto"] .'" style="width: 7rem">
                        </td>
                    </tr>
                    <tr>
                        <td>NISN</td>
                        <td>: '. $getSiswa["nisn"] .'</td>
                    </tr>
                    <tr>
                        <td>Nama Lengkap</td>
                        <td>: '. $getSiswa["nama"] .'</td>
                    </tr>
                    <tr>
                        <td>Tempat / Tanggal Lahir</td>
                        <td>: '. $getSiswa["tempat_lahir"] .', '. date("d-m-Y", strtotime($getSiswa["tgl_lahir"])) .'</td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>: '. $getSiswa["jenkel"] .'</td>
                    </tr>
                    <tr>
                        <td>Asal Sekolah</td>
                        <td>: '. $getSiswa["asal_sekolah"] .'</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>: '. $getSiswa["alamat"] .'</td>
                    </tr>
                    <tr>
                        <td>No Hp</td>
                        <td>: '. $getSiswa["hp_siswa"] .'</td>
                    </tr>
                </table>
            </div>
            
            <br>
            <p style="font-weight: bold">Identitas Orang Tua/Wali</p>

            <table class="table table-borderless">
                    <tr>
                        <td>Nama</td>
                        <td>: '. $getSiswa["nama_wali"] .'</td>
                    </tr>
                    <tr>
                        <td>Hubungan Dengan Siswa</td>
                        <td>: '. $getSiswa["hub_wali"] .'</td>
                    </tr>
                    <tr>
                        <td>Pekerjaan</td>
                        <td>: '. $getSiswa["pekerjaan_wali"] .'</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>: '. $getSiswa["alamat_wali"] .'</td>
                    </tr>
                    <tr>
                        <td>No Hp</td>
                        <td>: '. $getSiswa["hp_wali"] .'</td>
                    </tr>
                </table>

                <br>
                <p style="font-weight: bold">Tangal Daftar</p>
                <p>'. date("d-m-Y", strtotime($getSiswa["tgl_daftar"])) .'</p>
        </div>
        

        





        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
    </html>


');
$mpdf->Output('Kartu Informasi Pendaftaran.pdf', 'D');