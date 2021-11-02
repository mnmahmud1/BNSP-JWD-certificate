<?php

    include "koneksi.php";

    
    if(isset($_POST["login"])){
        $username = htmlspecialchars($_POST['inputUsername']);
        $password = $_POST['inputPassword'];

        $getUser = mysqli_query($conn, "SELECT username, password FROM siswa WHERE username = '$username'");
        
        if(mysqli_num_rows($getUser) == 1){
            $getPass = mysqli_fetch_assoc($getUser);
            if(password_verify($password, $getPass["password"])){
                setcookie("keyS", $username, time() + 3600 * 3 );
                header('Location: index.php');
            }
        }

        echo "
            <script>
                alert('Username/Password kamu salah!');
                window.location.href = 'login.php';
            </script>  
        ";

    }

    if(isset($_POST["register"])){
        $nama = $_POST['inputName'];
        $username = $_POST['inputUsername'];
        $password = $_POST['inputPassword'];
        $passwordConfirm = $_POST['inputPasswordConfirm'];

        if($password == $passwordConfirm){
            $cekUsername = mysqli_query($conn, "SELECT username FROM siswa WHERE username = '$username'");
            if(mysqli_num_rows($cekUsername) == 0){
                $passHash = password_hash($password, PASSWORD_DEFAULT);
                mysqli_query($conn, "INSERT INTO siswa (username, password, nama, validasi) VALUES ('$username', '$passHash', '$nama', 0)");

                if(mysqli_affected_rows($conn)){
                    echo "
                        <script>
                            alert('Pendaftaran Berhasil!, Silahkan login');
                            window.location.href = 'login.php';
                        </script>
                    ";
                }
            } else {
                echo "
                    <script>
                        alert('Username telah digunakan, Silahkan Ulangi!');
                        window.location.href = 'register.php';
                    </script>
                ";
            }
        } else {
            echo "
                    <script>
                        alert('Konfirmasi Password Tidak Benar, Silahkan Ulangi!');
                        window.location.href = 'register.php';
                    </script>
                ";
        }
    }

    if(isset($_GET["logoutS"])){
        setcookie("keyS", "");
        header('Location: login.php');
    }

    if(isset($_POST["lanjutPendaftaran"])){
        $nisn = $_POST['nisn'];
        $jenkel = $_POST["jenkel"];
        $tempatLahir = $_POST["tempatLahir"];
        $tglLahir = $_POST["tglLahir"];
        $asalSekolah = $_POST["asalSekolah"];
        $alamat = $_POST["alamat"];
        $hpSiswa = $_POST["hpSiswa"];
        $namaWali = $_POST["namaWali"];
        $hubSiswa = $_POST["hubSiswa"];
        $pekerjaanWali = $_POST["pekerjaanWali"];
        $hpWali = $_POST["hpWali"];
        $alamatWali = $_POST["alamatWali"];
        
        $userCookie = $_COOKIE["keyS"];

        $foto = $_FILES["foto"]["tmp_name"];
        $namaFoto = $_FILES['foto']['name'];
        $targetFoto = 'assets/img/' . $namaFoto;
        move_uploaded_file($foto, $targetFoto);


        mysqli_query($conn, "UPDATE siswa SET
                nisn = '$nisn',
                foto = '$namaFoto',
                jenkel = '$jenkel',
                tempat_lahir = '$tempatLahir',
                tgl_lahir = '$tglLahir',
                asal_sekolah = '$asalSekolah',
                alamat = '$alamat',
                hp_siswa = '$hpSiswa',
                nama_wali = '$namaWali',
                hub_wali = '$hubSiswa',
                pekerjaan_wali = '$pekerjaanWali',
                hp_wali = '$hpWali',
                alamat_wali = '$alamatWali',
                validasi = 1 WHERE username = '$userCookie'");

        if(mysqli_affected_rows($conn)){
            header("Location: status.php");
        }
    }

?>