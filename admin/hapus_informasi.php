<?php
session_start();
include '../koneksi.php';
include '../fungsi.php';
$db = new Koneksi();
$koneksi =  $db->DBConnect();
$fungsi = new fungsi($koneksi);
if($_SESSION['USER']['level'] != 'admin'){
    session_start();
    session_destroy(); 
    echo '<script>alert("Sudah Login, Silahkan Logout Terlebih dahulu!");window.location="./index.php?page=login"</script>';
}
$tabel = 'informasi';
$where = 'id';
$id = $_GET['hapusid'];
$hasil = $fungsi->tampil_data_id($tabel,$where,$id);
if ('../assets/gambar/'.$hasil['image']) {
    unlink('../assets/gambar/'.$hasil['image']);
}
$fungsi->hapus_data($tabel,$where,$id);
echo '<script>alert("Hapus Data Berhasil");window.location="./index.php?page=datainformasi"</script>';
?>