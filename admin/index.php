<?php
session_start();
include '../koneksi.php';
include '../fungsi.php';
// include 'proses.php';
$db = new Koneksi();
$koneksi =  $db->DBConnect();
$fungsi = new fungsi($koneksi);
error_reporting(0);
$get_url = $_SERVER['REQUEST_URI'];
if ($get_url == '/siikm-pbo/admin' or $get_url == '/siikm-pbo/admin/index.php' or $get_url == '/siikm-pbo/admin/index.php?page') {
    header('location:./index.php?page=home');
}else{
    $getpage = $_GET['page']; 
    switch ($getpage) {
        case '':
            header('location:./index.php?page=home');
            break;

        case 'home':
            include './home.php';
            break;

        case 'login':
            include './login.php';
            break;

        case 'datamahasiswa':
            include './datamahasiswa.php';
            break;

        case 'contact':
            include './contact.php';
            break;

        case 'datainformasi':
            include './informasi.php';
            break;

        case 'datakategori':
            include './datakategori.php';
            break;

        case 'tambah':
            include './tambah.php';
            break;

        case 'tambah_kategori':
            include './tambahkategori.php';
            break;

        case 'logout':
            session_start();
            session_destroy();
            header("location:./index.php?page=login"); 
            break;

        default:
            echo "Not Found";
            break;
    }
}
?>