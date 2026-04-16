<?php 
    // Mulai sesi Login
    session_start();
    
    // Cek Login
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

    // var_dump($_SESSION);
    // exit();
    
    include("./connect.php");
    
    $username   = "";
    $email      = "";
    $password   = "";
    $role       = "";
    
    $npm        = "";
    $nama       = "";

    $sukses     = "";
    $error      = "";

    // Button login klik
    if(isset($_POST['login_button'])) {
        $email      = $_POST['email'];
        $password   = $_POST['password'];

        // Cek kosong
        if($email == '' or $password == '') {
            $error .= "Silahkan masukkan Email dan Password.";
        }

        // Cek Akun
        if(empty($error)) {
            $sql    = "SELECT * FROM akun WHERE email = '$email'";
            $q      = mysqli_query($connection, $sql);
            $r      = mysqli_fetch_array($q);

            // Cek Password
            if(!$r || $r['password'] != md5($password)) {
                $error .= "Akun tidak ditemukan.";
            } else {
                // Cek Hak
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

    // Button signup klik
    if(isset($_POST['signup_button'])) {
        $username   = $_POST['username'];
        $email      = $_POST['email'];
        $password   = $_POST['password'];
        $role       = "mahasiswa"; // default sementara

        $npm        = $_POST['npm'];
        $npm        = trim($npm); // no space
        $nama       = $username; // default sementara

        // Cek kosong
        if($username == '' or $email == '' or $password == '' or $npm == '') {
            $error .= "Silahkan masukkan semua data.";
        }

        // Cek NPM
        if(!preg_match("/^[0-9]{1,11}$/", $npm)) {
            $error .= "NPM harus berupa angka dan maksimal 11 digit.";
        }

        // Cek Eksistensi
        if(empty($error)) {
            $cek    = mysqli_query($connection, "SELECT * FROM akun 
                    WHERE email = '$email' OR username = '$username'");
            if(mysqli_num_rows($cek) > 0) {
                $data = mysqli_fetch_assoc($cek);

                // Cek Email
                if($data['email'] == $email) {
                    $error .= "Email sudah terdaftar.";
                }
                // Cek Username
                if($data['username'] == $username) {
                    $error .= "Username sudah terdaftar.";
                }
            }
        }

        // Add Akun
        if(empty($error)) {
            // Enkripsi password
            $password_hash = md5($password);

            // Tabel akun
            $sql1       = "INSERT INTO akun (username, email, password, user_role) 
                        VALUES ('$username', '$email', '$password_hash', '$role')";
            $q1         = mysqli_query($connection, $sql1);
            $id_akun    = mysqli_insert_id($connection); // panggil id

            // Tabel mahasiswa
            $sql2       = "INSERT INTO mahasiswa (id_akun, npm, nama_mahasiswa)
                        VALUES ('$id_akun', '$npm', '$nama')";
            $q2         = mysqli_query($connection, $sql2);

            $_SESSION['email']      = $email;
            $_SESSION['role']       = $role;
            $_SESSION['id_akun']    = $id_akun;

            // $sukses = "Registrasi berhasil.";
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
        
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>

    <body class="bg-[#F8F9FE] text-slate-700 flex min-h-screen">

        <div class="hidden lg:flex lg:w-1/2 bg-gradient-to-br from-violet-600 via-fuchsia-600 to-pink-500 relative 
                overflow-hidden items-center justify-center p-12">
            
            <div class="absolute top-0 left-0 w-full h-full bg-white/5 opacity-50 backdrop-blur-3xl skew-y-6 transform 
                -translate-y-1/2"></div>
            <div class="absolute bottom-10 left-10 w-72 h-72 bg-pink-500 rounded-full mix-blend-multiply filter blur-3xl 
                opacity-40"></div>

            <div class="relative z-10 text-white max-w-lg">
                <span class="text-5xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-white to-white/70 
                    tracking-tight flex items-center gap-2 mb-6">
                    <div class="w-12 h-12 bg-white/20 rounded-2xl flex items-center justify-center text-white text-3xl 
                        backdrop-blur-md">✨</div>
                    THINKARA.
                </span>

                <h1 class="text-4xl font-extrabold mb-4 leading-tight">Selamat Datang Kembali!</h1>
                <p class="text-lg font-medium opacity-90 leading-relaxed mb-8">
                    Lanjutkan perjalananmu mengasah logika dan bangun argumen yang tak terpatahkan hari ini.
                </p>

                <div class="flex items-center gap-4 bg-white/10 p-5 rounded-2xl backdrop-blur-md border border-white/20 shadow-xl">
                    <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z">
                            </path>
                        </svg>
                    </div>

                    <div>
                        <h4 class="font-bold">Mode Latihan Tersedia</h4>
                        <p class="text-sm text-white/80 font-medium">Argument Builder, Fallacy Finder & lainnya.</p>
                    </div>
                </div>            
            </div>

        </div>

        <div class="w-full lg:w-1/2 flex flex-col justify-center items-center p-6 sm:p-12 relative">

            <a href="../index.php" class="absolute top-8 left-8 flex items-center text-slate-500 hover:text-violet-600 
                font-bold transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                    </path>
                </svg>
                Kembali
            </a>

            <div class="w-full max-w-md bg-white p-8 sm:p-10 rounded-[2rem] shadow-xl shadow-violet-100/50 border 
                border-slate-100 relative z-10">

                <div class="text-center mb-8">
                    <span class="text-3xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-violet-600 
                        to-fuchsia-500 lg:hidden block mb-4">✨
                        THINKARA.
                    </span>
                    <h2 id="formTitle" class="text-3xl font-extrabold text-slate-800 mb-2">Masuk Akun</h2>
                    <p id="formSubtitle" class="text-slate-500 font-medium">Silakan masukkan detail akun Anda.</p>
                </div>

                <?php 
                    if($error) {
                        echo "$error";
                    }
                ?>

                <!-- LOGIN -->
                <form action="" method="POST" id="loginForm" class="space-y-5 block">
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Email</label>
                        <input id="email" name="email" type="email" required value="<?= $email ?>"
                            class="w-full px-5 py-3.5 rounded-xl border border-slate-200 bg-slate-50 text-slate-800 
                                font-medium focus:outline-none focus:border-violet-500 focus:ring-1 focus:ring-violet-500 
                                transition-all placeholder-slate-400"
                            placeholder="nama@email.com">
                    </div>

                    <div>
                        <div class="flex justify-between items-center mb-2">
                            <label class="block text-sm font-bold text-slate-700">Password</label>
                            <a href="#" class="text-sm text-violet-600 hover:text-violet-700 font-bold">Lupa Password?</a>
                        </div>

                        <input id="password" name="password" type="password" required 
                            class="w-full px-5 py-3.5 rounded-xl border border-slate-200 bg-slate-50 text-slate-800 
                            font-medium focus:outline-none focus:border-violet-500 focus:ring-1 focus:ring-violet-500 
                            transition-all placeholder-slate-400"
                            placeholder="••••••••">
                    </div>

                    <button name="login_button" type="submit" value="submit"
                        class="w-full bg-violet-600 text-white font-bold py-3.5 rounded-xl shadow-lg shadow-violet-200 
                            hover:bg-violet-700 transform hover:-translate-y-0.5 transition-all duration-300 mt-4">
                        Masuk
                    </button>

                    <div class="text-center mt-6">
                        <p class="text-slate-500 text-sm font-medium">Belum punya akun?
                            <a href="#signup" onclick="toggleForm('signup')"
                                class="text-fuchsia-600 font-bold hover:underline">Daftar sekarang</a>
                        </p>
                    </div>
                </form>
                <!-- /LOGIN -->

                <!-- SIGNUP -->
                <form action="" method="POST" id="signupForm" class="space-y-5 hidden">
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Username</label>
                        <input id="username" name="username" type="text" required value="<?= $username ?>"
                            class="w-full px-5 py-3.5 rounded-xl border border-slate-200 bg-slate-50 text-slate-800 
                            font-medium focus:outline-none focus:border-violet-500 focus:ring-1 focus:ring-violet-500 
                            transition-all placeholder-slate-400"
                            placeholder="Masukkan username kamu">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Email</label>
                        <input id="email" name="email" type="email" required value="<?= $email ?>"
                            class="w-full px-5 py-3.5 rounded-xl border border-slate-200 bg-slate-50 text-slate-800 
                            font-medium focus:outline-none focus:border-violet-500 focus:ring-1 focus:ring-violet-500 
                            transition-all placeholder-slate-400"
                            placeholder="nama@email.com">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Password</label>
                        <input id="password" name="password" type="password" required
                            class="w-full px-5 py-3.5 rounded-xl border border-slate-200 bg-slate-50 text-slate-800 
                            font-medium focus:outline-none focus:border-violet-500 focus:ring-1 focus:ring-violet-500 
                            transition-all placeholder-slate-400"
                            placeholder="Buat password kuat">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">NPM</label>
                        <input id="npm" name="npm" type="text" required
                            pattern="[0-9]{1,11}" maxlength="11" oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                            value="<?= $npm ?>"
                            class="w-full px-5 py-3.5 rounded-xl border border-slate-200 bg-slate-50 text-slate-800 
                            font-medium focus:outline-none focus:border-violet-500 focus:ring-1 focus:ring-violet-500 
                            transition-all placeholder-slate-400"
                            placeholder="Masukkan NPM kamu">
                    </div>
                    
                    <input type="hidden" id="role" name="role" value="mahasiswa">

                    <button name="signup_button" type="submit" value="submit"
                        class="w-full bg-gradient-to-r from-violet-600 to-fuchsia-500 text-white font-bold py-3.5 
                            rounded-xl shadow-lg shadow-violet-200 hover:shadow-xl transform hover:-translate-y-0.5 
                            transition-all duration-300 mt-4">
                        Buat Akun
                    </button>

                    <div class="text-center mt-6">
                        <p class="text-slate-500 text-sm font-medium">Sudah punya akun?
                            <a href="#login" onclick="toggleForm('login')"
                                class="text-violet-600 font-bold hover:underline">Masuk di sini</a>
                        </p>
                    </div>
                </form>
                <!-- /SIGNUP -->

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
                    // Update URL hash tanpa reload halaman
                    window.history.pushState(null, null, '#login');
                }
            }

            document.addEventListener("DOMContentLoaded", function () {
                if (window.location.hash === '#signup') {
                    toggleForm('signup');
                }
            });
        </script>
    </body>

</html>