<?php
    include("./connect.php");
    include("./akses.php");

    // Cek Akses
    if ($_SESSION['role'] != "mahasiswa") {
        echo "Kamu tidak punya akses";
        exit();
    }

    $username           = "";
    $email              = "";

    $npm                = "";
    $nama               = "";
    $jenis_kelamin      = "";
    $jenjang            = "";
    $tanggal_lahir      = "";
    $instansi           = "";

    $sukses             = "";
    $error              = "";

    // Cek Akun
    $id_akun    = $_SESSION['id_akun'];
    $sql        = "SELECT a.username, a.email, a.created_at,
                    m.npm, m.nama_mahasiswa, m.jenis_kelamin, m.jenjang, m.tanggal_lahir, m.instansi
                FROM akun a
                JOIN mahasiswa m ON a.id_akun = m.id_akun
                WHERE a.id_akun = '$id_akun'";
    $q          = mysqli_query($connection, $sql);
    $d          = mysqli_fetch_assoc($q);

    $username       = $d['username'];
    $email          = $d['email'];
    $created_at     = date('d M Y', strtotime($d['created_at']));

    $npm            = $d['npm'];
    $nama           = $d['nama_mahasiswa'];
    
    $jenis_kelamin  = $d['jenis_kelamin']   ?? '';
    $jenjang        = $d['jenjang']         ?? '';
    $tanggal_lahir  = $d['tanggal_lahir']   ?? '';
    $instansi       = $d['instansi']        ?? '';

    // Update
    if(isset($_POST['update_button'])) {
        $nama           = $_POST['nama'];
        $username       = $_POST['username'];
        $jenis_kelamin  = $_POST['jenis_kelamin'];
        $jenjang        = $_POST['jenjang'];
        $tanggal_lahir  = $_POST['tanggal_lahir'];
        $instansi       = $_POST['instansi'];

        if($nama == '' || $username == '') {
            $error = "Nama dan Username wajib diisi.";
        } else {
            // Update akun
            $sql1 = "UPDATE akun SET username='$username' WHERE id_akun='$id_akun'";
            mysqli_query($connection, $sql1);

            // Update mahasiswa
            $sql2 = "UPDATE mahasiswa SET nama_mahasiswa='$nama', jenis_kelamin='$jenis_kelamin', jenjang='$jenjang', 
                    tanggal_lahir='$tanggal_lahir', instansi='$instansi' WHERE id_akun='$id_akun'";
            mysqli_query($connection, $sql2);

            // $sukses = "Profil berhasil diperbarui.";
        }
    }

    // Delete Akun (Sesuai nama tombol di form)
    if(isset($_POST['delete_button'])) {
        mysqli_query($connection, "DELETE FROM mahasiswa WHERE id_akun='$id_akun'");
        mysqli_query($connection, "DELETE FROM akun WHERE id_akun='$id_akun'");
        session_destroy();

        header("location:./akun.php#login");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna | THINKARA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Nunito', sans-serif; background-color: #F8F9FE; }
        .soft-shadow { box-shadow: 0 10px 40px -10px rgba(124, 58, 237, 0.08); }
        .custom-scroll::-webkit-scrollbar { width: 6px; }
        .custom-scroll::-webkit-scrollbar-track { background: transparent; }
        .custom-scroll::-webkit-scrollbar-thumb { background-color: #cbd5e1; border-radius: 20px; }
        .custom-scroll::-webkit-scrollbar-thumb:hover { background-color: #94a3b8; }
    </style>
</head>
<body class="text-slate-700 h-screen flex overflow-hidden">

    <aside class="hidden md:flex flex-col w-72 bg-white border-r border-slate-100 h-full shrink-0">
        <div class="p-8 pb-6 flex items-center gap-3">
            <div class="w-10 h-10 bg-violet-600 rounded-xl flex items-center justify-center text-white text-xl shadow-lg shadow-violet-200">✨</div>
            <span class="text-2xl font-extrabold text-violet-600 tracking-tight">THINKARA</span>
        </div>

        <nav class="flex-1 px-6 space-y-2 mt-4 overflow-y-auto custom-scroll">
            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-4 px-4">Menu Utama</p>
            <a href="./dashboard.php" class="flex items-center gap-4 px-4 py-3 text-slate-500 hover:bg-slate-50 hover:text-violet-600 rounded-2xl font-bold transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                Dashboard
            </a>
            <a href="./leaderboard.php" class="flex items-center gap-4 px-4 py-3 text-slate-500 hover:bg-slate-50 hover:text-violet-600 rounded-2xl font-bold transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2z"></path></svg>
                Leaderboard
            </a>
            <a href="#" class="flex items-center gap-4 px-4 py-3 text-slate-500 hover:bg-slate-50 hover:text-violet-600 rounded-2xl font-bold transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z"></path></svg>
                Arena Latihan
            </a>
            
            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-4 px-4 mt-8">Pengaturan</p>
            <a href="./profil.php" class="flex items-center gap-4 px-4 py-3 bg-violet-50 text-violet-700 rounded-2xl font-bold transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                ProfilKu
            </a>
            <button onclick="openLogoutModal()" class="flex w-full items-center gap-4 px-4 py-3 text-red-500 hover:bg-red-50 rounded-2xl font-bold transition-colors mt-2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                Keluar
            </button>
        </nav>
    </aside>

    <main class="flex-1 flex flex-col h-full relative overflow-hidden">
        <header class="h-20 bg-white/80 backdrop-blur-md border-b border-slate-100 flex items-center justify-between px-6 md:px-10 z-10 shrink-0">
            <div class="flex items-center gap-4 md:hidden">
                <button class="text-violet-600 p-2 bg-violet-50 rounded-xl">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
            </div>
            <div>
                <h1 class="text-xl md:text-2xl font-extrabold text-slate-800">Pengaturan Profil</h1>
            </div>
        </header>

        <div class="flex-1 overflow-y-auto custom-scroll p-6 md:p-10">
            <div class="max-w-6xl mx-auto">
                <div class="bg-white rounded-[2rem] border border-slate-100 soft-shadow mb-8 overflow-hidden">
                    <div class="h-40 md:h-56 bg-gradient-to-r from-violet-600 via-fuchsia-600 to-pink-500 relative">
                        <div class="absolute inset-0 bg-white/10 backdrop-blur-sm mix-blend-overlay"></div>
                    </div>
                    <div class="px-8 pb-8 relative">
                        <div class="flex flex-col md:flex-row items-center md:items-end gap-6 mb-4">
                            <div class="relative -mt-16 md:-mt-20"> 
                                <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=<?= $username ?>" alt="Profile" class="w-32 h-32 md:w-40 md:h-40 rounded-full border-4 md:border-[6px] border-white shadow-xl bg-slate-100">
                            </div>
                            <div class="text-center md:text-left mb-2 flex-1 pt-4 md:pt-0">
                                <h2 class="text-3xl font-extrabold text-slate-800"><?= $nama ?></h2>
                                <p class="text-violet-600 font-bold mb-1">@<?= $username ?></p>
                                <p class="text-slate-500 font-medium">Mahasiswa <?= $jenjang ?> | Bergabung <?= $created_at ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 pb-10">
                    <div class="lg:col-span-2 space-y-8">
                        <div class="bg-white p-8 rounded-3xl border border-slate-100 soft-shadow">
                            <h3 class="text-xl font-extrabold text-slate-800 mb-6">Informasi Pribadi</h3>
                            <form action="" method="POST" class="space-y-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-sm font-bold text-slate-700 mb-2">Nama Lengkap</label>
                                        <input type="text" name="nama" value="<?= $nama ?>" class="w-full px-5 py-3 rounded-xl border border-slate-200 bg-slate-50 text-slate-800 focus:ring-1 focus:ring-violet-500 outline-none transition-all">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-bold text-slate-700 mb-2">Username</label>
                                        <input type="text" name="username" value="<?= $username ?>" class="w-full px-5 py-3 rounded-xl border border-slate-200 bg-slate-50 text-slate-800 focus:ring-1 focus:ring-violet-500 outline-none transition-all">
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-sm font-bold text-slate-700 mb-2">Jenjang</label>
                                        <input type="text" name="jenjang" value="<?= $jenjang ?>" class="w-full px-5 py-3 rounded-xl border border-slate-200 bg-slate-50 outline-none">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-bold text-slate-700 mb-2">Tanggal Lahir</label>
                                        <input type="date" name="tanggal_lahir" value="<?= $tanggal_lahir ?>" class="w-full px-5 py-3 rounded-xl border border-slate-200 bg-slate-50 outline-none">
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Afiliasi Instansi</label>
                                    <input type="text" name="instansi" value="<?= $instansi ?>" class="w-full px-5 py-3 rounded-xl border border-slate-200 bg-slate-50 outline-none">
                                </div>
                                <div class="flex justify-end pt-4">
                                    <button type="submit" name="update_button" class="bg-violet-600 text-white font-bold py-3 px-8 rounded-full shadow-lg hover:bg-violet-700 transition-all">Simpan Perubahan</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="space-y-8">
                        <div class="bg-white p-6 rounded-3xl border border-red-100">
                            <h3 class="text-lg font-extrabold text-red-600 mb-4">Zona Bahaya</h3>
                            <div class="space-y-3">
                                <button onclick="openLogoutModal()" class="flex w-full justify-between items-center px-4 py-3 bg-red-50 hover:bg-red-100 text-red-600 rounded-xl font-bold transition-colors">
                                    Keluar dari Akun
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                </button>
                                <form action="" method="POST" onsubmit="return confirm('Yakin ingin menghapus akun?');">
                                    <button type="submit" name="delete_button" class="w-full text-left px-4 py-3 text-slate-400 hover:text-red-500 font-bold transition-colors text-sm">
                                        Hapus Akun Permanen
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <div id="logoutModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
        <div class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm transition-opacity" onclick="closeLogoutModal()"></div>
        <div class="flex min-h-full items-center justify-center p-4 text-center">
            <div class="relative transform overflow-hidden rounded-[2.5rem] bg-white p-8 text-left shadow-2xl transition-all sm:w-full sm:max-w-md border border-slate-100">
                <div class="flex flex-col items-center">
                    <div class="w-20 h-20 bg-red-50 rounded-full flex items-center justify-center text-red-500 mb-6 text-4xl">🚪</div>
                    <h3 class="text-2xl font-extrabold text-slate-800 mb-2">Mau Keluar?</h3>
                    <p class="text-slate-500 text-center font-medium mb-8">Pastikan semua progresmu aman sebelum meninggalkan THINKARA.</p>
                    <div class="flex flex-col w-full gap-3">
                        <a href="./logout.php" class="w-full py-4 bg-red-500 hover:bg-red-600 text-white font-bold rounded-2xl text-center shadow-lg transition-all">Ya, Keluar Sekarang</a>
                        <button onclick="closeLogoutModal()" class="w-full py-4 bg-slate-100 hover:bg-slate-200 text-slate-600 font-bold rounded-2xl transition-all">Batal</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const logoutModal = document.getElementById('logoutModal');
        function openLogoutModal() {
            logoutModal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
        function closeLogoutModal() {
            logoutModal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
    </script>
</body>
</html>