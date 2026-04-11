<html>

<head>
    <title>Connection • Thinkara</title>
</head>

<body>
</body>

</html>

<?php
$servername = "localhost";
$user = "root";
$password = "";
$db = "thinkara";

session_start();

$conn = mysqli_connect($servername, $user, $password, $db);
if ($conn) {
    echo "";
} else {
    echo "Failed to Connect : " . mysqli_connect_error();
}

$email = "";
$pass = "";
$role = "";
$nama = "";

$sukses = "";
$error = "";

// $emailL = "";
// $passL = "";
?>