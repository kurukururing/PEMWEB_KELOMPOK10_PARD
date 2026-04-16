<?php 
    session_start();
    
    if(isset($_SESSION['email'])) {
        if($_SESSION['role'] == "admin") {
            header("location:./dashboard2.php");
        } elseif($_SESSION['role'] == "dosen") {
            header("location:./dashboard3.php");
        } elseif($_SESSION['role'] == "mahasiswa") {
            header("location:./dashboard.php");
        }
        exit();
    }

    include("./connect.php");
    
    $username   = "";
    $email      = "";
    $password   = "";
    $role       = "";
    
    $npm        = "";
    $nama       = "";

    $sukses     = "";
    $error      = "";

    if(isset($_POST['login_button'])) {
        $email      = $_POST['email'];
        $password   = $_POST['password'];

        if($email == '' or $password == '') {
            $error .= "Silahkan masukkan Email dan Password.";
        }

        if(empty($error)) {
            $sql    = "SELECT * FROM akun WHERE email = '$email'";
            $q      = mysqli_query($connection, $sql);
            $r      = mysqli_fetch_array($q);

            if(!$r || $r['password'] != md5($password)) {
                $error .= "Akun tidak ditemukan atau password salah.";
            } else {
                $_SESSION['email']      = $r['email'];
                $_SESSION['role']       = $r['user_role'];
                $_SESSION['id_akun']    = $r['id_akun'];

                if ($r['user_role'] == "admin") {
                    header("location:./dashboard2.php");
                } elseif ($r['user_role'] == "dosen") {
                    header("location:./dashboard3.php");
                } elseif ($r['user_role'] == "mahasiswa") {
                    header("location:./dashboard.php");
                }
                exit();
            }
        }
    }

    if(isset($_POST['signup_button'])) {
        $username   = $_POST['username'];
        $email      = $_POST['email'];
        $password   = $_POST['password'];
        $role       = "mahasiswa";

        $npm        = $_POST['npm'];
        $npm        = trim($npm);
        $nama       = $username;

        if($username == '' or $email == '' or $password == '' or $npm == '') {
            $error .= "Silahkan masukkan semua data.";
        }

        if(!preg_match("/^[0-9]{1,11}$/", $npm)) {
            $error .= "NPM harus berupa angka dan maksimal 11 digit.";
        }

        if(empty($error)) {
            $cek    = mysqli_query($connection, "SELECT * FROM akun WHERE email = '$email' OR username = '$username'");
            if(mysqli_num_rows($cek) > 0) {
                $data = mysqli_fetch_assoc($cek);
                if($data['email'] == $email) { $error .= "Email sudah terdaftar. "; }
                if($data['username'] == $username) { $error .= "Username sudah terdaftar."; }
            }
        }

        if(empty($error)) {
            $password_hash = md5($password);
            $sql1       = "INSERT INTO akun (username, email, password, user_role) VALUES ('$username', '$email', '$password_hash', '$role')";
            mysqli_query($connection, $sql1);
            $id_akun    = mysqli_insert_id($connection);

            $sql2       = "INSERT INTO mahasiswa (id_akun, npm, nama_mahasiswa) VALUES ('$id_akun', '$npm', '$nama')";
            mysqli_query($connection, $sql2);

            $_SESSION['email']      = $email;
            $_SESSION['role']       = $role;
            $_SESSION['id_akun']    = $id_akun;

            header("location:./dashboard.php");
            exit();
        }
    }
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk / Daftar | THINKARA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>body { font-family: 'Nunito', sans-serif; }</style>
</head>
<body class="bg-[#F8F9FE] text-slate-700 flex min-h-screen">

    <div class="hidden lg:flex lg:w-1/2 bg-gradient-to-br from-violet-600 via-fuchsia-600 to-pink-500 relative overflow-hidden items-center justify-center p-12">
        <div class="absolute top-0 left-0 w-full h-full bg-white/5 opacity-50 backdrop-blur-3xl skew-y-6 transform -translate-y-1/2"></div>
        <div class="relative z-10 text-white max-w-lg text-center lg:text-left">
            <span class="text-5xl font-extrabold flex items-center gap-2 mb-6">
                <div class="w-12 h-12 bg-white/20 rounded-2xl flex items-center justify-center text-3xl backdrop-blur-md">✨</div>
                THINKARA.
            </span>
            <h1 class="text-4xl font-extrabold mb-4 leading-tight">Selamat Datang Kembali!</h1>
            <p class="text-lg font-medium opacity-90 leading-relaxed">Lanjutkan perjalananmu mengasah logika hari ini.</p>
        </div>
    </div>

    <div class="w-full lg:w-1/2 flex flex-col justify-center items-center p-6 sm:p-12 relative">
        <a href="../index.php" class="absolute top-8 left-8 flex items-center text-slate-500 hover:text-violet-600 font-bold transition-colors">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali
        </a>

        <div class="w-full max-w-md bg-white p-8 sm:p-10 rounded-[2rem] shadow-xl border border-slate-100">
            <div class="text-center mb-8">
                <h2 id="formTitle" class="text-3xl font-extrabold text-slate-800 mb-2">Masuk Akun</h2>
                <p id="formSubtitle" class="text-slate-500 font-medium">Silakan masukkan detail akun Anda.</p>
            </div>

            <form action="" method="POST" id="loginForm" class="space-y-5">
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Email</label>
                    <input name="email" type="email" required value="<?= $email ?>" class="w-full px-5 py-3.5 rounded-xl border border-slate-200 bg-slate-50 outline-none focus:border-violet-500 transition-all" placeholder="nama@email.com">
                </div>
                <div>
                    <div class="flex justify-between items-center mb-2">
                        <label class="block text-sm font-bold text-slate-700">Password</label>
                        <a href="#" class="text-sm text-violet-600 font-bold">Lupa Password?</a>
                    </div>
                    <input name="password" type="password" required class="w-full px-5 py-3.5 rounded-xl border border-slate-200 bg-slate-50 outline-none focus:border-violet-500 transition-all" placeholder="••••••••">
                </div>
                <button name="login_button" type="submit" class="w-full bg-violet-600 text-white font-bold py-3.5 rounded-xl shadow-lg hover:bg-violet-700 transition-all">Masuk</button>
                <p class="text-center text-slate-500 text-sm mt-6">Belum punya akun? <a href="#signup" onclick="toggleForm('signup')" class="text-fuchsia-600 font-bold hover:underline">Daftar sekarang</a></p>
            </form>

            <form action="" method="POST" id="signupForm" class="space-y-5 hidden">
                <div><label class="block text-sm font-bold text-slate-700 mb-2">Username</label>
                <input name="username" type="text" required value="<?= $username ?>" class="w-full px-5 py-3.5 rounded-xl border border-slate-200 bg-slate-50 outline-none focus:border-violet-500 transition-all" placeholder="Username"></div>
                <div><label class="block text-sm font-bold text-slate-700 mb-2">Email</label>
                <input name="email" type="email" required value="<?= $email ?>" class="w-full px-5 py-3.5 rounded-xl border border-slate-200 bg-slate-50 outline-none focus:border-violet-500 transition-all" placeholder="nama@email.com"></div>
                <div><label class="block text-sm font-bold text-slate-700 mb-2">Password</label>
                <input name="password" type="password" required class="w-full px-5 py-3.5 rounded-xl border border-slate-200 bg-slate-50 outline-none focus:border-violet-500 transition-all" placeholder="Password"></div>
                <div><label class="block text-sm font-bold text-slate-700 mb-2">NPM</label>
                <input name="npm" type="text" required maxlength="11" oninput="this.value = this.value.replace(/[^0-9]/g, '')" value="<?= $npm ?>" class="w-full px-5 py-3.5 rounded-xl border border-slate-200 bg-slate-50 outline-none focus:border-violet-500 transition-all" placeholder="NPM (Angka)"></div>
                <button name="signup_button" type="submit" class="w-full bg-gradient-to-r from-violet-600 to-fuchsia-500 text-white font-bold py-3.5 rounded-xl shadow-lg transition-all">Buat Akun</button>
                <p class="text-center text-slate-500 text-sm mt-6">Sudah punya akun? <a href="#login" onclick="toggleForm('login')" class="text-violet-600 font-bold hover:underline">Masuk di sini</a></p>
            </form>
        </div>
    </div>

    <div id="errorModal" class="fixed inset-0 z-[100] hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm" onclick="closeModal()"></div>
        <div class="relative bg-white rounded-[2rem] w-full max-w-sm p-8 shadow-2xl border border-slate-100 transform transition-all">
            <div class="flex flex-col items-center text-center">
                <div class="w-16 h-16 bg-red-50 rounded-2xl flex items-center justify-center text-red-500 mb-4 text-3xl">⚠️</div>
                <h3 class="text-xl font-extrabold text-slate-800 mb-2">Ups! Terjadi Kesalahan</h3>
                <p class="text-slate-500 font-medium mb-6"><?= $error ?></p>
                <button onclick="closeModal()" class="w-full py-3 bg-slate-800 text-white font-bold rounded-xl hover:bg-slate-900 transition-all">Tutup</button>
            </div>
        </div>
    </div>

    <script>
        function toggleForm(type) {
            const loginForm = document.getElementById('loginForm');
            const signupForm = document.getElementById('signupForm');
            const formTitle = document.getElementById('formTitle');
            const formSubtitle = document.getElementById('formSubtitle');

            if (type === 'signup') {
                loginForm.classList.add('hidden');
                signupForm.classList.remove('hidden');
                formTitle.innerText = "Buat Akun Baru";
                formSubtitle.innerText = "Mulai perjalanan kritis Anda sekarang.";
                window.history.pushState(null, null, '#signup');
            } else {
                signupForm.classList.add('hidden');
                loginForm.classList.remove('hidden');
                formTitle.innerText = "Masuk Akun";
                formSubtitle.innerText = "Silakan masukkan detail akun Anda.";
                window.history.pushState(null, null, '#login');
            }
        }

        function closeModal() {
            document.getElementById('errorModal').classList.add('hidden');
            document.getElementById('errorModal').classList.remove('flex');
        }

        document.addEventListener("DOMContentLoaded", function () {
            if (window.location.hash === '#signup') {
                toggleForm('signup');
            }
            // Tampilkan modal jika ada error dari PHP
            <?php if (!empty($error)): ?>
                const modal = document.getElementById('errorModal');
                modal.classList.remove('hidden');
                modal.classList.add('flex');
            <?php endif; ?>
        });
    </script>
</body>
</html>