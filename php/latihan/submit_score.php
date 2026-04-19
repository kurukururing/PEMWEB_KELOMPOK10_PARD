<?php
    include("../connect.php");
    include("../akses.php"); // Memastikan session_start() sudah ada di sini

    // Pastikan data POST ada
    if (isset($_POST['skor']) && isset($_POST['waktu'])) {
        
        $id_akun = $_SESSION['id_akun'];
        $skor    = (int)$_POST['skor'];
        $durasi  = (int)$_POST['waktu']; // Dalam detik (integer)
        
        // id_latihan 1 adalah untuk Argument Builder (sesuai gambar tabel latihan kamu)
        $id_latihan = 1; 
        
        // Rumus XP (Skor x 2)
        $xp = $skor * 2;

        // Waktu main menggunakan waktu sekarang (WIB/Server time)
        // Kolom di DB kamu adalah 'waktu_main' (datetime)
        $waktu_main = date("Y-m-d H:i:s");

        // LOGIC: Karena tabel 'hasil_sesi_latihan' adalah tabel riwayat, 
        // kita langsung melakukan INSERT setiap kali user selesai latihan.
        $query = "INSERT INTO hasil_sesi_latihan (id_akun, id_latihan, xp, skor, waktu_main, durasi) 
                  VALUES ($id_akun, $id_latihan, $xp, $skor, '$waktu_main', $durasi)";

        if (mysqli_query($connection, $query)) {
            // Jika berhasil, arahkan ke halaman leaderboard
            header("Location: ../leaderboard.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($connection);
        }

    } else {
        // Jika diakses tanpa data POST, kembalikan ke dashboard
        header("Location: ../dashboard.php");
        exit();
    }
?>