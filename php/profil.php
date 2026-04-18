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
    $sql        = "SELECT a.username, a.email, a.created_at, a.is_active,
                    m.npm, m.nama_mahasiswa, m.jenis_kelamin, m.jenjang, m.tanggal_lahir, m.instansi
                FROM akun a
                JOIN mahasiswa m ON a.id_akun = m.id_akun
                WHERE a.id_akun = '$id_akun'";
    $q          = mysqli_query($connection, $sql);
    $d          = mysqli_fetch_assoc($q);

    $username       = $d['username'];
    $email          = $d['email'];
    $created_at     = date('d M Y', strtotime($d['created_at']));
    $isActive       = $d['is_active'];

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

            $sukses = "Profil berhasil diperbarui.";
        }
    }

    // Delete
    if(isset($_POST['delete_button'])) {
        mysqli_query($connection, "UPDATE akun SET is_active = 0 WHERE id_akun='$id_akun'");
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
<script>
  tailwind.config = {
    theme: {
      extend: {
        colors: {
          primary: {
            light: '#fde047',
            DEFAULT: '#eab308', // Kuning
            dark: '#a16207',
          },
          secondary: {
            light: '#f87171',
            DEFAULT: '#dc2626', // Merah
            dark: '#991b1b',
          },
        }
      }
    }
  }
</script>
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
            
            <div class="flex items-center gap-3 md:gap-5">
                <button class="relative p-2 text-slate-400 hover:text-violet-600 transition-colors">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                </button>
            </div>
        </header>

        <div class="flex-1 overflow-y-auto custom-scroll p-6 md:p-10">
            <div class="max-w-6xl mx-auto">
                
                <div class="bg-white rounded-[2rem] border border-slate-100 soft-shadow mb-8 overflow-hidden">
                    <div class="h-40 md:h-56 bg-gradient-to-r from-violet-600 via-fuchsia-600 to-pink-500 relative">
                        <div class="absolute inset-0 bg-white/10 backdrop-blur-sm mix-blend-overlay"></div>
                        <button class="absolute top-4 right-4 bg-black/30 hover:bg-black/50 text-white p-2.5 rounded-full backdrop-blur-md transition-all">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </button>
                    </div>
                    
                    <div class="px-8 pb-8 relative">
                        <div class="flex flex-col md:flex-row items-center md:items-end gap-6 mb-4">
                            <div class="relative -mt-16 md:-mt-20"> 
                                <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Axel" alt="Profile" class="w-32 h-32 md:w-40 md:h-40 rounded-full border-4 md:border-[6px] border-white shadow-xl bg-slate-100">
                                <button class="absolute bottom-2 right-2 bg-violet-600 hover:bg-violet-700 text-white p-2.5 rounded-full shadow-lg transition-colors border-2 border-white">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                </button>
                            </div>
                            
                            <div class="text-center md:text-left mb-2 flex-1 pt-4 md:pt-0">
                                <h2 class="text-3xl font-extrabold text-slate-800">
                                    <?= $nama ?>
                                </h2>
                                <p class="text-violet-600 font-bold mb-1">
                                    @<?= $username ?>
                                </p>
                                <p class="text-slate-500 font-medium">
                                    Mahasiswa <?= $jenjang ? $jenjang : '' ?> | Bergabung <?= $created_at ?>
                                </p>
                            </div>
                            
                            <div class="flex gap-3 mt-4 md:mt-0">
                                <button class="px-6 py-2.5 bg-slate-100 text-slate-600 font-bold rounded-full hover:bg-slate-200 transition-colors">Bagikan Profil</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 pb-10">
                    <div class="lg:col-span-2 space-y-8">
                        
                        <div class="bg-white p-8 rounded-3xl border border-slate-100 soft-shadow">
                            <h3 class="text-xl font-extrabold text-slate-800 mb-6">Informasi Pribadi</h3>

                            <?php if($error): ?>
                                <p class="text-red-500 font-bold mb-4"><?= $error ?></p>
                            <?php endif; ?>

                            <?php if($sukses): ?>
                                <p class="text-green-500 font-bold mb-4"><?= $sukses ?></p>
                            <?php endif; ?>

                            <form action="" method="POST" class="space-y-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-sm font-bold text-slate-700 mb-2">Nama Lengkap</label>
                                        <input type="text" name="nama" value="<?= $nama ?>" 
                                            class="w-full px-5 py-3 rounded-xl border border-slate-200 bg-slate-50 text-slate-800 font-medium 
                                            focus:outline-none focus:border-violet-500 focus:ring-1 focus:ring-violet-500 transition-all">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-bold text-slate-700 mb-2">Username</label>
                                        <input type="text" name="username" value="<?= $username ?>" 
                                            class="w-full px-5 py-3 rounded-xl border border-slate-200 bg-slate-50 text-slate-800 font-medium 
                                            focus:outline-none focus:border-violet-500 focus:ring-1 focus:ring-violet-500 transition-all">
                                    </div>
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Email Address</label>
                                    <input type="email" value="<?= $email ?>" readonly
                                        class="w-full px-5 py-3 rounded-xl border border-slate-200 bg-slate-50 text-slate-800 font-medium 
                                        focus:outline-none focus:border-violet-500 focus:ring-1 focus:ring-violet-500 transition-all">
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Jenjang</label>
                                    <input type="text" name="jenjang" value="<?= $jenjang ?>"
                                        class="w-full px-5 py-3 rounded-xl border border-slate-200 bg-slate-50 text-slate-800 font-medium 
                                        focus:outline-none focus:border-violet-500 focus:ring-1 focus:ring-violet-500 transition-all">
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" value="<?= $tanggal_lahir ?>"
                                        class="w-full px-5 py-3 rounded-xl border border-slate-200 bg-slate-50 text-slate-800 font-medium 
                                        focus:outline-none focus:border-violet-500 focus:ring-1 focus:ring-violet-500 transition-all">
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Jenis Kelamin</label>
                                    <select name="jenis_kelamin"
                                        class="w-full px-5 py-3 rounded-xl border border-slate-200 bg-slate-50 text-slate-800 font-medium 
                                        focus:outline-none focus:border-violet-500 focus:ring-1 focus:ring-violet-500 transition-all">
                                        
                                        <option value="">- Pilih -</option>
                                        <option value="Laki-laki" <?= $jenis_kelamin == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                                        <option value="Perempuan" <?= $jenis_kelamin == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
                                    </select>
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Afiliasi Instansi</label>
                                    <input type="text" name="instansi" value="<?= $instansi ?>"
                                        class="w-full px-5 py-3 rounded-xl border border-slate-200 bg-slate-50 text-slate-800 font-medium 
                                        focus:outline-none focus:border-violet-500 focus:ring-1 focus:ring-violet-500 transition-all">                                        
                                </div>

                                <div class="flex justify-end pt-4">
                                    <button type="submit" name="update_button" 
                                        class="bg-violet-600 text-white font-bold py-3 px-8 rounded-full shadow-lg shadow-violet-200 
                                        hover:bg-violet-700 transition-all">
                                        Simpan Perubahan</button>
                                </div>
                            </form>
                            </div>

                        <div class="bg-white p-8 rounded-3xl border border-slate-100 soft-shadow">
                            <h3 class="text-xl font-extrabold text-slate-800 mb-6">Keamanan Akun</h3>
                            <form class="space-y-6">
                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Password Saat Ini</label>
                                    <input type="password" name="password"
                                        placeholder="••••••••" 
                                        class="w-full px-5 py-3 rounded-xl border border-slate-200 bg-slate-50 text-slate-800 font-medium 
                                        focus:outline-none focus:border-violet-500 focus:ring-1 focus:ring-violet-500 transition-all">
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-sm font-bold text-slate-700 mb-2">Password Baru</label>
                                        <input type="password" placeholder="Masukkan password baru" class="w-full px-5 py-3 rounded-xl border border-slate-200 bg-slate-50 text-slate-800 font-medium focus:outline-none focus:border-violet-500 focus:ring-1 focus:ring-violet-500 transition-all">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-bold text-slate-700 mb-2">Konfirmasi Password</label>
                                        <input type="password" placeholder="Ulangi password baru" class="w-full px-5 py-3 rounded-xl border border-slate-200 bg-slate-50 text-slate-800 font-medium focus:outline-none focus:border-violet-500 focus:ring-1 focus:ring-violet-500 transition-all">
                                    </div>
                                </div>

                                <div class="flex justify-end pt-4">
                                    <button type="button" class="bg-slate-800 text-white font-bold py-3 px-8 rounded-full hover:bg-slate-900 transition-all">Perbarui Password</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="space-y-8">
                        <div class="bg-white p-6 rounded-3xl border border-slate-100 soft-shadow">
                            <h3 class="text-lg font-extrabold text-slate-800 mb-4">Lencana Saya 🏅</h3>
                            <div class="grid grid-cols-3 gap-4">
                                <div class="flex flex-col items-center p-3 bg-fuchsia-50 rounded-2xl border border-fuchsia-100 group cursor-pointer relative">
                                    <span class="text-3xl mb-2 group-hover:scale-110 transition-transform">🕵️</span>
                                    <span class="text-[10px] font-bold text-fuchsia-700 text-center">Detektif Mula</span>
                                </div>
                                <div class="flex flex-col items-center p-3 bg-blue-50 rounded-2xl border border-blue-100 group cursor-pointer relative">
                                    <span class="text-3xl mb-2 group-hover:scale-110 transition-transform">🧩</span>
                                    <span class="text-[10px] font-bold text-blue-700 text-center">Logician 1</span>
                                </div>
                                <div class="flex flex-col items-center p-3 bg-emerald-50 rounded-2xl border border-emerald-100 group cursor-pointer relative">
                                    <span class="text-3xl mb-2 group-hover:scale-110 transition-transform">🔥</span>
                                    <span class="text-[10px] font-bold text-emerald-700 text-center">Streak 7h</span>
                                </div>
                                <div class="flex flex-col items-center p-3 bg-slate-50 rounded-2xl border border-slate-200 opacity-50">
                                    <span class="text-3xl mb-2 grayscale">👑</span>
                                    <span class="text-[10px] font-bold text-slate-500 text-center">Terkunci</span>
                                </div>
                            </div>
                        </div>

                        <div class="bg-gradient-to-br from-indigo-700 to-purple-800 p-6 rounded-3xl text-white soft-shadow relative overflow-hidden">
                            <div class="absolute -top-10 -right-10 w-32 h-32 bg-white/10 rounded-full blur-2xl"></div>
                            <h3 class="text-sm font-bold text-indigo-100 mb-1">Status Akun</h3>
                            <p class="text-2xl font-extrabold mb-4">Pemikir Pro ✨</p>
                            <p class="text-sm text-indigo-200 mb-6 font-medium leading-relaxed">Kamu memiliki akses penuh ke semua modul latihan dan analisis tingkat lanjut.</p>
                            <button class="w-full bg-white text-indigo-700 font-bold py-2.5 rounded-full hover:bg-slate-50 transition-colors">Kelola Langganan</button>
                        </div>

                        <div class="bg-white p-6 rounded-3xl border border-red-100">
                            <h3 class="text-lg font-extrabold text-red-600 mb-4">Zona Bahaya</h3>
                            <div class="space-y-3">
                                <button type="button" onclick="showLogoutModal()" class="flex w-full justify-between items-center px-4 py-3 bg-red-50 hover:bg-red-100 text-red-600 rounded-xl font-bold transition-colors">
                                    Keluar dari Akun
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                </button>
                                <button type="button" onclick="showDeleteModal()" class="w-full text-left px-4 py-3 text-slate-400 hover:text-red-500 font-bold transition-colors text-sm">
                                    Hapus Akun Permanen
                                </button>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </main>

    <div id="logoutModal" class="fixed inset-0 z-[100] hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm" onclick="hideLogoutModal()"></div>
        <div class="relative bg-white rounded-[2.5rem] w-full max-w-md p-8 shadow-2xl border border-slate-100 transform transition-all">
            <div class="flex flex-col items-center text-center">
                <div class="w-20 h-20 bg-red-50 rounded-full flex items-center justify-center text-3xl mb-6">👋</div>
                <h3 class="text-2xl font-extrabold text-slate-800 mb-2">Mau istirahat dulu?</h3>
                <p class="text-slate-500 font-medium mb-8">Kamu akan keluar dari sesi THINKARA. Pastikan semua progresmu sudah tersimpan ya!</p>
                <div class="flex flex-col w-full gap-3">
                    <a href="./logout.php" class="w-full py-4 bg-red-500 hover:bg-red-600 text-white font-bold rounded-2xl shadow-lg shadow-red-100 transition-all">Ya, Keluar Sekarang</a>
                    <button onclick="hideLogoutModal()" class="w-full py-4 bg-slate-100 hover:bg-slate-200 text-slate-600 font-bold rounded-2xl transition-all">Tetap di Sini</button>
                </div>
            </div>
        </div>
    </div>

    <div id="deleteModal" class="fixed inset-0 z-[100] hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-md" onclick="hideDeleteModal()"></div>
        <div class="relative bg-white rounded-[2.5rem] w-full max-w-md p-8 shadow-2xl border border-slate-100 transform transition-all">
            <div class="flex flex-col items-center text-center">
                <div class="w-20 h-20 bg-red-100 rounded-full flex items-center justify-center text-3xl mb-6 text-red-600">🚨</div>
                <h3 class="text-2xl font-extrabold text-slate-800 mb-2">Hapus Akun Permanen?</h3>
                <p class="text-slate-500 font-medium mb-8">Tindakan ini tidak dapat dibatalkan. Seluruh data, skor, dan lencana kamu akan hilang selamanya.</p>
                
                <form action="" method="POST" class="w-full flex flex-col gap-3">
                    <button type="submit" name="delete_button" class="w-full py-4 bg-red-600 hover:bg-red-700 text-white font-bold rounded-2xl shadow-lg shadow-red-200 transition-all">
                        Ya, Hapus Akun Saya
                    </button>
                    <button type="button" onclick="hideDeleteModal()" class="w-full py-4 bg-slate-100 hover:bg-slate-200 text-slate-600 font-bold rounded-2xl transition-all">
                        Batal
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Script Logout
        function showLogoutModal() {
            const modal = document.getElementById('logoutModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.style.overflow = 'hidden';
        }
        function hideLogoutModal() {
            const modal = document.getElementById('logoutModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = 'auto';
        }

        // Script Delete Account
        function showDeleteModal() {
            const modal = document.getElementById('deleteModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.style.overflow = 'hidden';
        }
        function hideDeleteModal() {
            const modal = document.getElementById('deleteModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = 'auto';
        }
    </script>

</body>
</html>