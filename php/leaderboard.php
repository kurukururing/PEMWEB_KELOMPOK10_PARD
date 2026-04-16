<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaderboard | THINKARA</title>
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

            <div class="flex items-center gap-4 md:gap-6">
                <button class="relative p-2 text-slate-400 hover:text-violet-600 transition-colors">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                </button>
                <div class="flex items-center gap-3 cursor-pointer p-1.5 pr-4 bg-slate-50 hover:bg-slate-100 rounded-full border border-slate-200 transition-colors">
                    <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=PelajarBaru&backgroundColor=c0aede" alt="Profile" class="w-9 h-9 rounded-full shadow-sm bg-white">
                    <span class="font-bold text-sm hidden md:block">Pelajar Baru</span>
                </div>
            </div>
        </header>

        <div class="flex-1 overflow-y-auto p-6 md:p-10 pb-24">
            <div class="max-w-4xl mx-auto">
                
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-12">
                    <div>
                        <h2 class="text-3xl font-extrabold text-slate-800">Top Thinkers 🏆</h2>
                        <p class="text-slate-500 font-medium">Berkompetisi dan raih peringkat teratas!</p>
                    </div>
                    
                    <div class="flex overflow-x-auto pb-2 md:pb-0 gap-2 hide-scrollbar">
                        <button class="px-5 py-2.5 bg-violet-600 text-white font-bold rounded-full whitespace-nowrap shadow-md shadow-violet-200">Semua Waktu</button>
                        <button class="px-5 py-2.5 bg-white border border-slate-200 text-slate-600 hover:bg-slate-50 font-bold rounded-full whitespace-nowrap transition-colors">Minggu Ini</button>
                        <button class="px-5 py-2.5 bg-white border border-slate-200 text-slate-600 hover:bg-slate-50 font-bold rounded-full whitespace-nowrap transition-colors">Fallacy Finder</button>
                        <button class="px-5 py-2.5 bg-white border border-slate-200 text-slate-600 hover:bg-slate-50 font-bold rounded-full whitespace-nowrap transition-colors">Argument Builder</button>
                    </div>
                </div>

                <div class="flex items-end justify-center gap-2 md:gap-6 mb-12 pt-10">
                    
                    <div class="flex flex-col items-center w-1/3 max-w-[140px] relative">
                        <div class="absolute -top-12 z-10">
                            <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Siska&backgroundColor=cbd5e1" alt="Rank 2" class="w-20 h-20 md:w-24 md:h-24 rounded-full border-4 border-white shadow-lg bg-white">
                            <div class="absolute -bottom-3 left-1/2 transform -translate-x-1/2 w-8 h-8 bg-slate-300 text-slate-700 rounded-full flex items-center justify-center font-bold text-sm border-2 border-white shadow-sm">2</div>
                        </div>
                        <div class="w-full bg-gradient-to-b from-slate-100 to-white h-32 md:h-40 rounded-t-2xl border-t border-x border-slate-200 flex flex-col items-center justify-end pb-4 pt-14 px-2 text-center soft-shadow">
                            <p class="font-extrabold text-slate-800 text-sm md:text-base truncate w-full">Siska Ayu</p>
                            <p class="text-fuchsia-600 font-bold text-sm">12.4k XP</p>
                        </div>
                    </div>

                    <div class="flex flex-col items-center w-1/3 max-w-[160px] relative z-20">
                        <div class="absolute -top-16 z-10 flex flex-col items-center">
                            <span class="text-3xl mb-[-10px] z-20">👑</span>
                            <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Bintang&backgroundColor=fef08a" alt="Rank 1" class="w-24 h-24 md:w-28 md:h-28 rounded-full border-4 border-yellow-400 shadow-xl bg-white relative z-10">
                            <div class="absolute -bottom-3 left-1/2 transform -translate-x-1/2 w-9 h-9 bg-yellow-400 text-yellow-900 rounded-full flex items-center justify-center font-extrabold text-sm border-2 border-white shadow-sm z-20">1</div>
                        </div>
                        <div class="w-full bg-gradient-to-b from-yellow-50 to-white h-40 md:h-48 rounded-t-3xl border-t-2 border-x-2 border-yellow-200 flex flex-col items-center justify-end pb-4 pt-16 px-2 text-center shadow-xl shadow-yellow-100">
                            <p class="font-extrabold text-slate-800 text-base md:text-lg truncate w-full">Bintang P.</p>
                            <p class="text-fuchsia-600 font-extrabold">15.2k XP</p>
                        </div>
                    </div>

                    <div class="flex flex-col items-center w-1/3 max-w-[140px] relative">
                        <div class="absolute -top-12 z-10">
                            <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Riko&backgroundColor=fed7aa" alt="Rank 3" class="w-20 h-20 md:w-24 md:h-24 rounded-full border-4 border-white shadow-lg bg-white">
                            <div class="absolute -bottom-3 left-1/2 transform -translate-x-1/2 w-8 h-8 bg-orange-300 text-orange-900 rounded-full flex items-center justify-center font-bold text-sm border-2 border-white shadow-sm">3</div>
                        </div>
                        <div class="w-full bg-gradient-to-b from-orange-50 to-white h-28 md:h-32 rounded-t-2xl border-t border-x border-orange-200 flex flex-col items-center justify-end pb-4 pt-14 px-2 text-center soft-shadow">
                            <p class="font-extrabold text-slate-800 text-sm md:text-base truncate w-full">Riko Akbar</p>
                            <p class="text-fuchsia-600 font-bold text-sm">11.8k XP</p>
                        </div>
                    </div>

                </div>

                <div class="space-y-3 mb-10">
                    
                    <div class="flex items-center justify-between p-4 bg-white rounded-2xl border border-slate-100 hover:border-violet-200 transition-colors soft-shadow">
                        <div class="flex items-center gap-4 md:gap-6">
                            <span class="font-extrabold text-slate-400 w-6 text-center text-lg">4</span>
                            <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Dimas" class="w-12 h-12 rounded-full bg-slate-50 border border-slate-200">
                            <div>
                                <h4 class="font-bold text-slate-800">Dimas Wahyu</h4>
                                <p class="text-xs text-slate-500 font-medium">Logician Lv. 12</p>
                            </div>
                        </div>
                        <div class="font-extrabold text-slate-700">9.5k <span class="text-xs text-slate-400 font-bold">XP</span></div>
                    </div>

                    <div class="flex items-center justify-between p-4 bg-white rounded-2xl border border-slate-100 hover:border-violet-200 transition-colors soft-shadow">
                        <div class="flex items-center gap-4 md:gap-6">
                            <span class="font-extrabold text-slate-400 w-6 text-center text-lg">5</span>
                            <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Nadia" class="w-12 h-12 rounded-full bg-slate-50 border border-slate-200">
                            <div>
                                <h4 class="font-bold text-slate-800">Nadia Safira</h4>
                                <p class="text-xs text-slate-500 font-medium">Debater Lv. 10</p>
                            </div>
                        </div>
                        <div class="font-extrabold text-slate-700">8.2k <span class="text-xs text-slate-400 font-bold">XP</span></div>
                    </div>

                    <div class="flex items-center justify-between p-4 bg-white rounded-2xl border border-slate-100 hover:border-violet-200 transition-colors soft-shadow">
                        <div class="flex items-center gap-4 md:gap-6">
                            <span class="font-extrabold text-slate-400 w-6 text-center text-lg">6</span>
                            <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Fajar" class="w-12 h-12 rounded-full bg-slate-50 border border-slate-200">
                            <div>
                                <h4 class="font-bold text-slate-800">Fajar Siddiq</h4>
                                <p class="text-xs text-slate-500 font-medium">Thinker Lv. 9</p>
                            </div>
                        </div>
                        <div class="font-extrabold text-slate-700">7.9k <span class="text-xs text-slate-400 font-bold">XP</span></div>
                    </div>

                </div>

                <div class="relative mt-8">
                    <div class="absolute inset-x-0 -top-6 flex justify-center">
                        <span class="bg-slate-200 text-slate-500 text-xs font-bold px-3 py-1 rounded-full">Peringkat Kamu</span>
                    </div>
                    <div class="flex items-center justify-between p-4 bg-violet-50 rounded-2xl border-2 border-violet-200 soft-shadow">
                        <div class="flex items-center gap-4 md:gap-6">
                            <span class="font-extrabold text-violet-600 w-6 text-center text-lg">-</span>
                            <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=PelajarBaru&backgroundColor=c0aede" class="w-12 h-12 rounded-full border-2 border-white shadow-sm bg-white">
                            <div>
                                <h4 class="font-extrabold text-violet-900">Pelajar Baru (Kamu)</h4>
                                <p class="text-xs text-violet-600 font-medium">Pemula Lv. 1</p>
                            </div>
                        </div>
                        <div class="font-extrabold text-violet-700">0 <span class="text-xs text-violet-500 font-bold">XP</span></div>
                    </div>
                </div>

            </div>
        </div>
    </main>

</body>
</html>