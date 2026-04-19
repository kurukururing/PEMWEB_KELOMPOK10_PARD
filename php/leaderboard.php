<?php
    include("./connect.php");
    include("./akses.php"); // Memastikan session_start dan proteksi halaman aktif

    // 1. Logika untuk mengambil nama pengguna yang login
    $id_akun_login = $_SESSION['id_akun'];
    $sql_user = "SELECT m.nama_mahasiswa FROM mahasiswa m WHERE m.id_akun = '$id_akun_login'";
    $result_user = mysqli_query($connection, $sql_user);
    $data_user = mysqli_fetch_assoc($result_user);
    $nama_display = $data_user['nama_mahasiswa'] ?? 'Pelajar Baru';

    // 2. Logika Leaderboard (Kode asli kamu)
    $query = "SELECT a.username, hsl.xp, hsl.skor, hsl.durasi, hsl.waktu_main FROM hasil_sesi_latihan hsl
            LEFT JOIN akun a ON hsl.id_akun = a.id_akun
            ORDER BY hsl.skor DESC";
    $result = mysqli_query($connection, $query);

    $dataFromDB = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $dataFromDB[] = $row;
        }
    }
    $jsonLeaderboard = json_encode($dataFromDB, JSON_PRETTY_PRINT);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaderboard | THINKARA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=JetBrains+Mono:wght@700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Nunito', sans-serif; background-color: #F8F9FE; }
        .font-mono { font-family: 'JetBrains Mono', monospace; }
        .soft-shadow { box-shadow: 0 10px 40px -10px rgba(124, 58, 237, 0.08); }
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
    </style>
</head>
<body class="text-slate-700 h-screen flex overflow-hidden">

    <aside class="hidden md:flex flex-col w-72 bg-white border-r border-slate-100 h-full shrink-0">
        <div class="p-8 pb-6 flex items-center gap-3">
            <div class="w-10 h-10 bg-violet-600 rounded-xl flex items-center justify-center text-white text-xl shadow-lg shadow-violet-200">✨</div>
            <span class="text-2xl font-extrabold text-violet-600 tracking-tight">THINKARA</span>
        </div>

        <nav class="flex-1 px-6 space-y-2 mt-4 overflow-y-auto">
            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-4 px-4">Menu Utama</p>
            <a href="dashboard.php" class="flex items-center gap-4 px-4 py-3 text-slate-500 hover:bg-slate-50 hover:text-violet-600 rounded-2xl font-bold transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                Dashboard
            </a>
            <a href="leaderboard.php" class="flex items-center gap-4 px-4 py-3 bg-violet-50 text-violet-700 rounded-2xl font-bold transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2z"></path></svg>
                Leaderboard
            </a>
            <a href="./latihan/builder.php" class="flex items-center gap-4 px-4 py-3 text-slate-500 hover:bg-slate-50 hover:text-violet-600 rounded-2xl font-bold transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z"></path></svg>
                Arena Latihan
            </a>
        </nav>

        <div class="p-6 border-t border-slate-100">
            <a href="index.php" class="flex items-center gap-4 px-4 py-3 text-red-500 hover:bg-red-50 rounded-2xl font-bold transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                Keluar
            </a>
        </div>
    </aside>

    <main class="flex-1 flex flex-col h-full relative overflow-hidden">
        <header class="h-20 bg-white/80 backdrop-blur-md border-b border-slate-100 flex items-center justify-between px-6 md:px-10 z-10 shrink-0">
            <div class="flex items-center gap-4 md:hidden">
                <button class="text-violet-600 p-2 bg-violet-50 rounded-xl">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
                <span class="text-xl font-extrabold text-violet-600 tracking-tight">THINKARA</span>
            </div>
            <div class="hidden md:block">
                <h1 class="text-xl font-extrabold text-slate-800">Papan Peringkat Global</h1>
            </div>
            <div class="flex items-center gap-4">
                <a href="./profil.php">
                    <div class="flex items-center gap-3 cursor-pointer p-1.5 pr-4 bg-slate-50 hover:bg-slate-100 rounded-full border border-slate-200 transition-colors">
                        <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=<?= $nama_display ?>&backgroundColor=c0aede" alt="Profile" class="w-9 h-9 rounded-full shadow-sm bg-white">
                        <span class="font-bold text-sm hidden md:block"><?= $nama_display ?></span>
                    </div>
                </a>
            </div>
        </header>

        <div class="flex-1 overflow-y-auto p-6 md:p-10 pb-24">
            <div class="max-w-5xl mx-auto">
                
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-10">
                    <div>
                        <h2 class="text-3xl font-extrabold text-slate-800 tracking-tight">Top Thinkers 🏆</h2>
                        <p class="text-slate-500 font-medium">Data performa berdasarkan pemikiran kritis.</p>
                    </div>
                    <div class="flex gap-2">
                        <input type="text" id="pencarian" onkeyup="funSearch()" class="px-5 shadow-sm border-slate-400 rounded-xl font-semibold hover:bg-slate-50" placeholder="Cari ...">
                        <button id="btncepat" onclick="ubahLeaderboard('durasi')" class="px-5 py-2.5 bg-violet-600 text-white font-bold rounded-xl shadow-lg shadow-violet-200 transition-all hover:scale-105">Waktu Tercepat</button>
                        <button id="btnmulai" onclick="ubahLeaderboard('waktu_main')" class="px-5 py-2.5 bg-white border border-slate-200 text-slate-600 font-bold rounded-xl transition-all hover:bg-slate-50">Waktu Mulai</button>
                    </div>
                </div>

                <div class="bg-white rounded-3xl border border-slate-100 soft-shadow overflow-hidden">
                    <div class="overflow-x-auto">
                        <table id="tabel" class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-slate-50 border-b border-slate-100">
                                    <th class="px-6 py-4 text-xs font-black text-slate-400 uppercase tracking-widest w-16 text-center">#</th>
                                    <th class="px-6 py-4 text-xs font-black text-slate-400 uppercase tracking-widest">Player</th>
                                    <th class="px-6 py-4 text-xs font-black text-slate-400 uppercase tracking-widest text-right">XP</th>
                                    <th class="px-6 py-4 text-xs font-black text-slate-400 uppercase tracking-widest text-right">Skor</th>
                                    <th class="px-6 py-4 text-xs font-black text-slate-400 uppercase tracking-widest text-right">Waktu Mulai</th>
                                    <th class="px-6 py-4 text-xs font-black text-slate-400 uppercase tracking-widest text-right">Durasi</th>
                                </tr>
                            </thead>
                            <tbody id="leaderboard" class="divide-y divide-slate-50">
                                </tbody>
                        </table>
                    </div>
                </div>

                <div class="mt-8 relative">
                    <div class="absolute -top-3 left-6 z-10">
                        <span class="bg-violet-600 text-white text-[10px] font-black px-2 py-0.5 rounded-full uppercase tracking-tighter shadow-sm">Peringkat Kamu</span>
                    </div>
                    <div class="flex items-center justify-between p-5 bg-violet-50 rounded-2xl border-2 border-violet-100 soft-shadow">
                        <div class="flex items-center gap-4">
                            <span class="font-black text-violet-400 w-6 text-center">-</span>
                            <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=<?= $nama_display ?>" class="w-10 h-10 rounded-full border-2 border-white bg-white shadow-sm">
                            <div>
                                <h4 class="font-extrabold text-violet-900 leading-tight"><?= $nama_display ?></h4>
                                <p class="text-[11px] text-violet-500 font-bold uppercase tracking-wider">Pemula Lv. 1</p>
                            </div>
                        </div>
                        <div class="flex gap-8 items-center">
                            <div class="text-right">
                                <p class="text-[10px] text-slate-400 font-bold uppercase">Skor</p>
                                <p class="font-bold text-violet-700">0</p>
                            </div>
                            <div class="text-right">
                                <p class="text-[10px] text-slate-400 font-bold uppercase">Tercepat</p>
                                <p class="font-mono font-black text-violet-700">--:--</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <script>
        const data_dari_DB = <?php echo $jsonLeaderboard; ?>;
    </script>
    <script src="../js/leaderboard.js"></script>
</body>
</html>