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

        <h1 class="text-center border-bottom" style="font-size: 24">KARTU KETERANGAN KELULUSAN SMP XYZ</h1>

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
            <p style="font-weight: bold">Tangal Daftar</p>
            <p>'. date("d-m-Y", strtotime($getSiswa["tgl_daftar"])) .'</p>
        </div>

        <br>

        <div class="row">
            <div class="col-sm text-center">
                <h1 style="font-size: 18; color: green; font-weight: bold;">LOLOS</h1>
                <p>Calon siswa diharapkan melakukan Daftar Ulang pada tanggal 10-20 Desember 2021, dengan membawa surat keterangan kelulusan dan persyaratan administasi</p>
            </div>
        </div>
        
        <br>
        <br>
        <br>

        <div class="row">
            <p style="font-weight: bold;">Persyatatan Administrasi</p>
            <ul>
                <li>Fotocopy Ijazah/SKL</li>            
                <li>Fotocopy SKHUN</li>            
                <li>Fotocopy Akte Kelahiran</li>            
                <li>Fotocopy Kartu Keluarga</li>            
            </ul>

        </div>
        

        


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
    </html>


');
$mpdf->Output('Kartu Keterangan Kelulusan.pdf', 'D');