<?php
    include("./connect.php");
    include("./akses.php");
    
    // Cek Akses
    if ($_SESSION['role'] != "mahasiswa") {
        echo "Kamu tidak punya akses";
        exit();
    }
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | THINKARA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Nunito', sans-serif; background-color: #F8F9FE; }
        .soft-shadow { box-shadow: 0 10px 40px -10px rgba(124, 58, 237, 0.08); }
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
    </style>
</head>
<body class="text-slate-700 h-screen flex overflow-hidden">

    <aside class="hidden md:flex flex-col w-72 bg-white border-r border-slate-100 h-full">
        <div class="p-8 pb-6 flex items-center gap-3">
            <div class="w-10 h-10 bg-violet-600 rounded-xl flex items-center justify-center text-white text-xl shadow-lg shadow-violet-200">✨</div>
            <span class="text-2xl font-extrabold text-violet-600 tracking-tight">THINKARA</span>
        </div>

        <nav class="flex-1 px-6 space-y-2 mt-4 overflow-y-auto">
            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-4 px-4">Menu Utama</p>
            
            <a href="#" class="flex items-center gap-4 px-4 py-3 bg-violet-50 text-violet-700 rounded-2xl font-bold transition-colors">
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
            <a href="#" class="flex items-center gap-4 px-4 py-3 text-slate-500 hover:bg-slate-50 hover:text-violet-600 rounded-2xl font-bold transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                Statistikku
            </a>
        </nav>

        <div class="p-6 border-t border-slate-100">
            <a href="../index.php" class="flex items-center gap-4 px-4 py-3 text-red-500 hover:bg-red-50 rounded-2xl font-bold transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                Keluar
            </a>
        </div>
    </aside>

    <main class="flex-1 flex flex-col h-full relative overflow-hidden">
        
        <header class="h-20 bg-white/80 backdrop-blur-md border-b border-slate-100 flex items-center justify-between px-6 md:px-10 z-10">
            
            <div class="flex items-center gap-4 md:hidden">
                <button class="text-violet-600 p-2 bg-violet-50 rounded-xl">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
                <span class="text-xl font-extrabold text-violet-600 tracking-tight">THINKARA</span>
            </div>

            <div class="hidden md:block">
                <h1 class="text-xl font-extrabold text-slate-800">Ringkasan Belajar</h1>
            </div>

            <div class="flex items-center gap-4 md:gap-6">
                <button class="relative p-2 text-slate-400 hover:text-violet-600 transition-colors">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                    <span class="absolute top-1 right-2 w-2.5 h-2.5 bg-pink-500 rounded-full border-2 border-white"></span>
                </button>
                <a href="./profil.php">
                    <div class="flex items-center gap-3 cursor-pointer p-1.5 pr-4 bg-slate-50 hover:bg-slate-100 rounded-full border border-slate-200 transition-colors">
                        <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=PelajarBaru&backgroundColor=c0aede" alt="Profile" class="w-9 h-9 rounded-full shadow-sm bg-white">
                        <span class="font-bold text-sm hidden md:block">Pelajar Baru</span>
                    </div>
                </a>
                </a>
            </div>
        </header>

        <div class="flex-1 overflow-y-auto p-6 md:p-10 pb-24">
            <div class="max-w-6xl mx-auto space-y-8">

                <div class="relative bg-gradient-to-r from-violet-600 to-fuchsia-500 rounded-[2rem] p-8 md:p-12 text-white soft-shadow overflow-hidden">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-2xl transform translate-x-1/2 -translate-y-1/2"></div>
                    <div class="absolute bottom-0 right-32 w-48 h-48 bg-pink-500/20 rounded-full blur-2xl transform translate-y-1/4"></div>
                    
                    <div class="relative z-10 max-w-2xl">
                        <span class="inline-block px-3 py-1 bg-white/20 backdrop-blur-md rounded-lg text-sm font-bold tracking-wide mb-4">LANGKAH PERTAMA 🚀</span>
                        <h2 class="text-3xl md:text-4xl font-extrabold mb-4 leading-tight">Halo, Pelajar Baru! Siap mengasah logikamu hari ini?</h2>
                        <p class="text-white/80 font-medium text-lg leading-relaxed mb-8">Perjalananmu menjadi pemikir kritis yang mandiri dimulai di sini. Selesaikan misi pertamamu untuk mendapatkan XP dan naik level.</p>
                        <button class="bg-white text-violet-600 font-extrabold py-3.5 px-8 rounded-full shadow-lg hover:shadow-xl hover:scale-105 transition transform flex items-center gap-2">
                            Mulai Latihan Dasar
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </button>
                    </div>
                    <div class="hidden lg:block absolute bottom-0 right-10 text-9xl opacity-90 transform translate-y-4">
                        🧠
                    </div>
                </div>

                <div>
                    <h3 class="text-xl font-extrabold text-slate-800 mb-4">Statistik Kamu</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="bg-white p-6 rounded-3xl border border-slate-100 soft-shadow flex items-center gap-5">
                            <div class="w-14 h-14 rounded-2xl bg-orange-100 text-orange-500 flex items-center justify-center text-2xl font-bold">🏆</div>
                            <div>
                                <p class="text-slate-400 text-sm font-bold uppercase tracking-wide">Level Saat Ini</p>
                                <h4 class="text-2xl font-extrabold text-slate-800">Pemula <span class="text-lg text-slate-500 font-medium">(Lv. 1)</span></h4>
                            </div>
                        </div>
                        <div class="bg-white p-6 rounded-3xl border border-slate-100 soft-shadow flex items-center gap-5">
                            <div class="w-14 h-14 rounded-2xl bg-fuchsia-100 text-fuchsia-500 flex items-center justify-center text-2xl font-bold">⭐</div>
                            <div>
                                <p class="text-slate-400 text-sm font-bold uppercase tracking-wide">Total XP</p>
                                <h4 class="text-2xl font-extrabold text-slate-800">0 <span class="text-sm font-semibold text-fuchsia-500 bg-fuchsia-50 px-2 py-0.5 rounded-lg ml-1">Mulai kumpulkan!</span></h4>
                            </div>
                        </div>
                        <div class="bg-white p-6 rounded-3xl border border-slate-100 soft-shadow flex items-center gap-5">
                            <div class="w-14 h-14 rounded-2xl bg-blue-100 text-blue-500 flex items-center justify-center text-2xl font-bold">🔥</div>
                            <div>
                                <p class="text-slate-400 text-sm font-bold uppercase tracking-wide">Streak Belajar</p>
                                <h4 class="text-2xl font-extrabold text-slate-800">0 Hari</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="flex justify-between items-end mb-6">
                        <div>
                            <h3 class="text-xl font-extrabold text-slate-800">Rekomendasi Latihan Pertamamu</h3>
                            <p class="text-slate-500 font-medium">Buka kunci kemampuan analisismu dengan modul dasar ini.</p>
                        </div>
                        <a href="#" class="hidden md:inline-block text-violet-600 font-bold hover:underline">Lihat Semua</a>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-white p-1 rounded-3xl border border-slate-100 soft-shadow group hover:border-violet-200 transition-colors">
                            <div class="bg-slate-50 rounded-[1.5rem] p-6 h-full flex flex-col justify-between">
                                <div>
                                    <div class="flex justify-between items-start mb-4">
                                        <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center text-2xl">🧩</div>
                                        <span class="bg-white text-xs font-bold text-slate-500 px-3 py-1 rounded-full border border-slate-200">Dasar</span>
                                    </div>
                                    <h4 class="text-lg font-extrabold text-slate-800 mb-2">Argument Builder 101</h4>
                                    <p class="text-slate-500 text-sm font-medium leading-relaxed mb-6">Pahami struktur dasar premis dan kesimpulan. Susun argumen yang valid dari blok-blok yang diacak.</p>
                                </div>
                                <button class="w-full bg-white border-2 border-slate-200 text-slate-700 font-bold py-3 rounded-xl group-hover:bg-violet-600 group-hover:border-violet-600 group-hover:text-white transition-all">
                                    Mulai Tantangan
                                </button>
                            </div>
                        </div>

                        <div class="bg-white p-1 rounded-3xl border border-slate-100 soft-shadow group hover:border-fuchsia-200 transition-colors">
                            <div class="bg-slate-50 rounded-[1.5rem] p-6 h-full flex flex-col justify-between">
                                <div>
                                    <div class="flex justify-between items-start mb-4">
                                        <div class="w-12 h-12 bg-fuchsia-100 text-fuchsia-600 rounded-xl flex items-center justify-center text-2xl">🕵️</div>
                                        <span class="bg-white text-xs font-bold text-slate-500 px-3 py-1 rounded-full border border-slate-200">Dasar</span>
                                    </div>
                                    <h4 class="text-lg font-extrabold text-slate-800 mb-2">Detektif Fallacy</h4>
                                    <p class="text-slate-500 text-sm font-medium leading-relaxed mb-6">Belajar mengenali kecacatan logika (Logical Fallacy) paling umum seperti Ad Hominem di kehidupan sehari-hari.</p>
                                </div>
                                <button class="w-full bg-white border-2 border-slate-200 text-slate-700 font-bold py-3 rounded-xl group-hover:bg-fuchsia-500 group-hover:border-fuchsia-500 group-hover:text-white transition-all">
                                    Mulai Tantangan
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

</body>
</html>