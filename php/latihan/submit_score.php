<?php
  include("../connect.php");
  include("../akses.php");

  $id_akun = $_SESSION['id_akun'];
  $skor = (int)$_POST['skor'];
  $waktu = (int)$_POST['waktu'];
  $timeFormatted = gmdate("H:i:s", $waktu);

  $cek = mysqli_query($connection, "SELECT * FROM leaderboard WHERE id_akun = $id_akun");

  if (mysqli_num_rows($cek) > 0) {

      $data = mysqli_fetch_assoc($cek);

      $newSkor = $data['skor'] + $skor;
      $newXp   = $data['xp'] + ($skor * 2); // rumus

      // waktu tercepat
      $oldTime = $data['waktu_tercepat'];

      if ($oldTime == "00:00:00" || $timeFormatted < $oldTime) {
          $bestTime = $timeFormatted;
      } else {
          $bestTime = $oldTime;
      }

      mysqli_query($connection, "
          UPDATE leaderboard SET
              skor = $newSkor,
              xp = $newXp,
              waktu_tercepat = '$bestTime'
          WHERE id_akun = $id_akun
      ");

  } else {

      // insert first
      $xp = $skor * 2;

      mysqli_query($connection, "
          INSERT INTO leaderboard (id_akun, skor, xp, waktu_tercepat)
          VALUES ($id_akun, $skor, $xp, '$timeFormatted')
      ");
  }

  header("Location: ../leaderboard.php");
  exit();
?>