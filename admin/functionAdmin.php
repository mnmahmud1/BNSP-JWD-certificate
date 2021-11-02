<?php

    include "../koneksi.php";

    if(isset($_POST["loginAdmin"])){
        $username = htmlspecialchars($_POST['inputUsername']);
        $password = $_POST['inputPassword'];

        $getUser = mysqli_query($conn, "SELECT username, password FROM user WHERE username = '$username'");
        
        if(mysqli_num_rows($getUser) == 1){
            $getPass = mysqli_fetch_assoc($getUser);
            if(password_verify($password, $getPass["password"])){
                setcookie("key", $username, time() + 3600 * 3);
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

    if(isset($_GET["action"]) AND isset($_GET["stat"]) AND isset($_GET["id"])){
        $stat = $_GET["stat"];
        $id = $_GET['id'];
        
        mysqli_query($conn, "UPDATE siswa SET status = '$stat' WHERE id = $id");

        if(mysqli_affected_rows($conn)){
            header("Location: kelolaPendaftar.php");
        } else {
            echo "
                <script>
                    alert('Gagal update status!');
                    window.location.href = 'kelolaPendaftar.php';
                </script>  
            ";
        }
    }

    if(isset($_GET['hapus'])){
        $username = $_GET["hapus"];

        $hapusFoto = mysqli_fetch_assoc(mysqli_query($conn, "SELECT foto FROM siswa WHERE username = '$username'"));
        
        unlink("../assets/img/" . $hapusFoto["foto"]);
        
        mysqli_query($conn, "DELETE FROM siswa WHERE username = '$username'");
        
        if(mysqli_affected_rows($conn)){
            header("Location: kelolaAkun.php");
        } else {
            echo "
                <script>
                    alert('Gagal hapus akun!');
                    window.location.href = 'kelolaAkun.php';
                </script>  
            ";
        }
    }

    if(isset($_POST['ubahPass'])){
        $ubahPass = password_hash($_POST['passBaru'], PASSWORD_DEFAULT);
        $username = $_POST['username'];

        mysqli_query($conn, "UPDATE siswa SET password = '$ubahPass' WHERE username = '$username'");

        if(mysqli_affected_rows($conn)){
            echo "
                <script>
                    alert('Berhasil ubah password!');
                    window.location.href = 'kelolaAkun.php';
                </script>  
            ";
        } else {
            echo "
                <script>
                    alert('Gagal ubah password!');
                    window.location.href = 'kelolaAkun.php';
                </script>  
            ";
        }

        
        
    }















    if(isset($_GET["logout"])){
        setcookie("key", "");
        header('Location: login.php');
    }