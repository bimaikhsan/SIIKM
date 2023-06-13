<?php
    session_start();
    include 'koneksi.php';
    include 'fungsi.php';
    // include 'proses.php';
    $db = new Koneksi();
    $koneksi =  $db->DBConnect();
    $fungsi = new fungsi($koneksi);
    error_reporting(0);
    $id = $_SESSION['USER']['id'];
    $get_url = $_SERVER['REQUEST_URI'];
    if ($get_url == '/siikm-pbo/' or $get_url == '/siikm-pbo/index.php' or $get_url == '/siikm-pbo/index.php?page') {
        header('location:./index.php?page=home');
    }else{
        $getpage = $_GET['page']; 
        switch ($getpage) {
            case '':
                header('location:./index.php?page=home');
                break;

            case 'home':
                include './user/home.php';
                break;
            
            case 'account':
                include './user/account.php';
                break;

            case 'login':
                include './user/login.php';
                break;
            
            case 'informasi':
                include './user/informasi.php';
                break;
            
            case 'signup':
                include './user/signup.php';
                break;

            case 'beasiswa':
                include './user/beasiswa.php';
                break;
            case 'lomba':
                include './user/lomba.php';
                break;
            case 'pertukaranpelajar':
                include './user/pertukaranpelajar.php';
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