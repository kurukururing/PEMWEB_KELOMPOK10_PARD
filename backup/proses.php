<?php 
include "connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emailLogin = $_POST["emailL"];
    $passLogin = $_POST["passL"];

    $sql1 = "SELECT * FROM `akun`
            WHERE email = '$emailLogin'
            AND password = '$passLogin';";
    $q1 = mysqli_query($conn, $sql1);
    $r1 = mysqli_fetch_array($q1);

    //---//
    if (isset($r1['user_role'])) {

        if ($r1["user_role"] == "mahasiswa") {
            $_SESSION["emailLogin"] = $emailLogin;
            header("location:dashboard.html");
            echo "Login Berhasil";
            exit();

        } else if ($r1["user_role"] == "admin") {
            $_SESSION["emailLogin"] = $emailLogin;
            header("location:dashboard.html");
            exit();

        } else if ($r1["user_role"] == "dosen") {
            $_SESSION["emailLogin"] = $emailLogin;
            header("location:dashboard.html");
            exit();
        }
        
    } else {
        echo "Username or Password is incorrect";
    }

}

?>