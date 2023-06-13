<?php if(!empty($_SESSION['USER']) and $_SESSION['USER']['level'] != 'mahasiswa'){
  session_start();
  session_destroy();
  ?> 
  <script>alert("Sudah Login, Silahkan Logout Terlebih dahulu!");window.location="./index.php?page=login"</script>
<?php }?>

<!DOCTYPE html>
<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="./assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Registrasi Mahasiswa</title>

    <meta name="description" content="" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="./assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="./assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="./assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="./assets/css/demo.css" />
    <link rel="stylesheet" href="./assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="./assets/vendor/css/pages/page-auth.css" />
    <script src="./assets/vendor/js/helpers.js"></script>
    <script src="./assets/js/config.js"></script>
  </head>

  <body>
    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <div class="card">
            <div class="card-body">
              <div class="app-brand justify-content-center">
                <a href="index.html" class="app-brand-link gap-2">
                  <span class="app-brand-text demo text-body fw-bolder">SIIKM</span>
                </a>
              </div>
              <h4 class="mb-2">Silahkan Mendaftar Dulu Ya 🚀</h4>
              <p class="mb-4">Untuk masuk Sistem Informas Mahasiswa Wajib Mempunyai akun, pastikan benar mengisi data diri anda !</p>

              <form id="formAuthentication" class="mb-3" method="POST">
                <div class="mb-3">
                  <label for="nama" class="form-label">Nama Lengkap</label>
                  <input
                    type="text"
                    class="form-control"
                    id="nama"
                    name="nama"
                    autofocus
                    required
                  />
                </div>
                <div class="mb-3">
                  <label for="tanggallahir" class="form-label">Tanggal Lahir</label>
                  <input
                    type="date"
                    class="form-control"
                    id="tanggal"
                    name="tanggal"
                    autofocus
                    required
                  />
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email" required/>
                </div>
                <div class="mb-3 form-password-toggle">
                  <label class="form-label" for="password">Password</label>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="password"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                      required
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>

                <button name="submit" type="submit" class="btn btn-primary d-grid w-100">Sign up</button>
              </form>

              <p class="text-center">
                <span>Already have an account?</span>
                <a href="auth-login-basic.html">
                  <span>Sign in instead</span>
                </a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="./assets/vendor/libs/jquery/jquery.js"></script>
    <script src="./assets/vendor/libs/popper/popper.js"></script>
    <script src="./assets/vendor/js/bootstrap.js"></script>
    <script src="./assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="./assets/vendor/js/menu.js"></script>
    <script src="./assets/js/main.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>


<?php
if(isset($_POST['submit'])){
    $nama = strip_tags($_POST['nama']);
    $email = strip_tags($_POST['email']);
    $tgl_lahir = strip_tags($_POST['tanggal']);
    $pass = strip_tags($_POST['password']);
    $tabel = 'user';
    $data[] = array(
        'nama'		    =>$nama,
        'password'  	=>md5($pass),
        'level'	        =>'mahasiswa',
        'tanggal_lahir'	=>$tgl_lahir,
        'email'			=>$email,
    );
    $fungsi->tambah_data($tabel,$data);
    echo '<script>alert("Tambah Data Berhasil");window.location="./index.php?page=login"</script>';
}
?>