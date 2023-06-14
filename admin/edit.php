<?php
    session_start();
    include '../koneksi.php';
    include '../fungsi.php';
    $db = new Koneksi();
    error_reporting(0);
    $koneksi =  $db->DBConnect();
    $fungsi = new fungsi($koneksi);
    if($_SESSION['USER']['level'] != 'admin'){
        session_start();
        session_destroy(); 
        echo '<script>alert("Sudah Login, Silahkan Logout Terlebih dahulu!");window.location="./index.php?page=login"</script>';
    }
    $idGet = strip_tags($_GET['id']);
    $hasil = $fungsi->tampil_data_id('informasi','id',$idGet);
?>
<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Dashboard Admin</title>

    <meta name="description" content="" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />
	<script src="../assets/ckeditor/ckeditor.js"></script>
    <script src="../assets/vendor/js/helpers.js"></script>
    <script src="../assets/js/config.js"></script>
  </head>

  <body>
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="../index.php" class="app-brand-link">
              <span class="app-brand-text demo menu-text fw-bolder ms-2">SIIKM</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <?php
            include './menu.php';
          ?>
        </aside>
        <div class="layout-page">
        <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <h5 class="fs-4 lh-0" style="margin-top:15px"><strong>SISTEM INFORMASI MAHASISWA</strong></h5>
            </div>
          </nav>
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page / Data Informasi / </span>Edit Data informasi</h4>

            <div class="card">
            <div class="col-md-12">
                  <div class="card mb-4">
                    <div class="card-body">
                    <img style="width:200px" src="../assets/gambar/<?=$hasil['image']?>" alt="">
                    <form method="POST" action="" enctype='multipart/form-data'>
                      <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar</label>
                        <input class="form-control" name="gambar" type="file" id="formFile" />
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Keterangan</label>
                        <textarea class="form-control" name="keterangan" id="ckeditor" rows="3"><?=$hasil['keterangan']?></textarea>
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlSelect1" class="form-label">Kategori</label>
                        <select class="form-select" name="kategori" id="exampleFormControlSelect1" aria-label="Default select example">
                        <?php
                            $datakategori = $fungsi->tampil('kategori');
                            foreach($datakategori as $val){
                        ?>
                          <option value="<?=$val['nama']?>"><?=$val['nama']?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Link Pendaftaran</label>
                        <input
                          type="text"
                          value="<?=$hasil['link_daftar']?>"
                          name="link_daftar"
                          class="form-control"
                          id="exampleFormControlInput1"
                          placeholder="http://example.com"
                        />
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Link Halaman</label>
                        <input
                          value="<?=$hasil['link_halaman']?>"
                          type="text"
                          name="link_halaman"
                          class="form-control"
                          id="exampleFormControlInput1"
                          placeholder="http://example.com"
                        />
                      </div>
                      <input type="hidden" value="<?php echo $hasil['id'];?>" class="form-control" name="id" required>
                      <div class="demo-inline-spacing">
                            <button name="submit" type="submit" class="btn btn-primary">
                              <span class="tf-icons bx bx-plus"></span>&nbsp; Update
                            </button>
                          </div>
                    </div>
                  </div>
                </div>                
                </form>

            </div>
            </div>

            <div class="content-backdrop fade"></div>
          </div>
        </div>
      </div>

      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <script>
        CKEDITOR.replace( 'ckeditor' );
    </script>
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>
    <script src="../assets/js/main.js"></script>

    <script src="../assets/js/dashboards-analytics.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>

<?php
if(isset($_POST['submit'])){
    $keterangan = $_POST['keterangan'];
    $kategori = $_POST['kategori'];
    $link_daftar = $_POST['link_daftar'];
    $link_halaman = $_POST['link_halaman'];
    $filename = $_FILES['gambar']['name'];
    
    if ($filename == "") {
        $tabel = 'informasi';
        $data = array(
                'keterangan'	=>$keterangan,
                'link_daftar'	=>$link_daftar,
                'link_halaman'	=>$link_halaman,
                'kategori'		=>$kategori
            );
        $where = 'id';
        $id = $_POST['id'];
        $fungsi->edit_data($tabel,$data,$where,$id);
        echo '<script>alert("Edit Data Berhasil");window.location="./index.php?page=datainformasi"</script>';
    }else{
        $target_file = '../assets/gambar/'.$filename;
        $file_extension = pathinfo($target_file, PATHINFO_EXTENSION);
        $file_extension = strtolower($file_extension);
        $valid_extension = array("png","jpeg","jpg");
        if ('../assets/gambar/'.$hasil['image']) {
            unlink('../assets/gambar/'.$hasil['image']);
        }
        if(in_array($file_extension, $valid_extension)) {
            if(move_uploaded_file($_FILES['gambar']['tmp_name'],$target_file)) {
                // $statement->execute(array($filename,$target_file));
                $tabel = 'informasi';
                $data = array(
                    'keterangan'	=>$keterangan,
                    'link_daftar'	=>$link_daftar,
                    'link_halaman'	=>$link_halaman,
                    'image'		    =>$filename,
                    'kategori'		=>$kategori
                );
                $where = 'id';
                $id = $_POST['id'];
                $fungsi->edit_data($tabel,$data,$where,$id);
                echo '<script>alert("Edit Data Berhasil");window.location="../index.php?page=datainformasi"</script>';
            }
        }
    }
    
    
}
?>
