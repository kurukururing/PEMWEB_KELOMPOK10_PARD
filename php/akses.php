<?php
    session_start();
    
    // Cek login
    if(!isset($_SESSION['email'])) {
        header("location:./akun.php#login");
        exit();
    }
?>