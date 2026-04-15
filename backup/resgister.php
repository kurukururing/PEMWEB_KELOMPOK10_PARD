<?php 
include "connect.php";
$role = "mahasiswa"; // Default role

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

if (isset($_POST['submit'])) {
    // Ambil data sesuai atribut 'name'
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $role = "mahasiswa"; // Set otomatis atau ambil dari input hidden

    if ($nama && $email && $pass) {
        if ($op == 'edit') {
            // Logika Update (Jika Anda ingin fitur edit juga jalan)
            $id_akun = $_GET['id_akun'];
            $sql_u = "UPDATE akun SET email='$email', password='$pass' WHERE id_akun='$id_akun'";
            mysqli_query($conn, $sql_u);
            $sukses = "Data berhasil diupdate";
        } else {
            // INSERT ke tabel AKUN
            $sql1 = "INSERT INTO akun (email, password, user_role) VALUES ('$email', '$pass', '$role')";
            $q1 = mysqli_query($conn, $sql1);

            if ($q1) {
                // Ambil ID terakhir yang baru saja masuk ke tabel akun
                $last_id = mysqli_insert_id($conn);

                // INSERT ke tabel MAHASISWA (Asumsi ada kolom id_akun sebagai foreign key)
                $sql2 = "INSERT INTO mahasiswa (nama_mahasiswa, id_akun) VALUES ('$nama', '$last_id')";
                $q2 = mysqli_query($conn, $sql2);

                if ($q2) {
                    $nama = "";
                    $email = "";
                    $pass = "";
                    $sukses = "Registrasi Berhasil!";
                    header("location:dashboard.html");
                } else {
                    $error = "Gagal simpan data mahasiswa: " . mysqli_error($conn);
                }

            } else {
                $error = "Gagal simpan akun: " . mysqli_error($conn);
            }
        }

    } else {
        $error = "Silahkan masukkan semua data";
    }
}
?>