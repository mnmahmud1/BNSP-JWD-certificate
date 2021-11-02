<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register - PPDB SMP</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Daftar Akun Siswa</h3></div>
                                    <div class="card-body">
                                        <form method="post" action="function.php">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputName" name="inputName" type="text" placeholder="Enter your first name" maxlength="50" autofocus required />
                                                <label for="inputName">Nama Lengkap</label>
                                                <span id="validNama"></span>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputUsername" name="inputUsername" type="text" placeholder="Create a username" maxlength="30" required />
                                                <label for="inputUsername">Username</label>
                                                <span id="validUsername"></span>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-5">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPassword" name="inputPassword" type="password" placeholder="Create a password" required />
                                                        <label for="inputPassword">Password</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPasswordConfirm" name="inputPasswordConfirm" type="password" placeholder="Confirm password" required />
                                                        <label for="inputPasswordConfirm">Konfirmasi Password</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 align-self-baseline">
                                                    <span class="badge" id="cekPass"></span>
                                                </div>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid">
                                                    <button type="submit" name="register" class="btn btn-primary btn-block">Daftar Akun</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small">Sudah punya akun? <a href="login.php">Masuk</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>
            $("#inputPassword, #inputPasswordConfirm").on("keyup", function () {
                if ($("#inputPassword").val() == "" && $("#inputPasswordConfirm").val() == "") {
                    $("#cekPass").html("");
                } else if ($("#inputPassword").val() == $("#inputPasswordConfirm").val()) {
                    $("#cekPass").html("Sesuai").css("color", "green");
                } else {
                    $("#cekPass").html("Tidak Sesuai").css("color", "red");
                }
            });

            $("#inputName").on("keyup", function () {
                if ($("#inputName").val().length == 50) {
                    $("#validNama").html("Maksimal 50 Karakter").css("color", "red");
                } else {
                    $("#validNama").html("");
                }
            });

            $("#inputUsername").on("keyup", function () {
                if ($("#inputUsername").val().length == 30) {
                    $("#validUsername").html("Maksimal 30 Karakter").css("color", "red");
                } else {
                    $("#validUsername").html("");
                }
            });
        </script>
    </body>
</html>
