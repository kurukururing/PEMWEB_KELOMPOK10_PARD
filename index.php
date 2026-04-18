<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>THINKARA | Asah Kritis, Mandiri Tanpa AI</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
        
        <style>
            body { 
                font-family: 'Nunito', sans-serif; 
                background-color: #F8F9FE; 
            }
            html { 
                scroll-behavior: smooth; 
                scroll-padding-top: 6rem; 
            }
            .glass-nav { 
                background: rgba(255, 255, 255, 0.85); 
                backdrop-filter: blur(12px); 
                border-bottom: 1px solid rgba(0,0,0,0.05); 
            }
            .soft-shadow { 
                box-shadow: 0 10px 40px -10px rgba(124, 58, 237, 0.1); 
            }
            details > summary { 
                list-style: none; 
            }
            details > summary::-webkit-details-marker { 
                display: none; 
            }
            details[open] summary ~ * { 
                animation: sweep .3s ease-in-out; 
            }
            @keyframes sweep { 0% { 
                opacity: 0; transform: translateY(-10px); 
            } 100% { 
                opacity: 1; transform: translateY(0); 
                } 
            }
        </style>

    </head>

    <body class="text-slate-700">

        <nav class="fixed top-0 left-0 w-full glass-nav z-50 h-[5.5rem] flex items-center transition-all">
            <div class="max-w-7xl w-full mx-auto px-6 flex justify-between items-center">
                <span class="text-2xl font-extrabold text-violet-600 tracking-tight flex items-center gap-2">
                    <div class="w-8 h-8 bg-violet-600 rounded-xl flex items-center justify-center 
                        text-white text-lg">✨</div>
                    THINKARA
                </span>
                
                <div class="hidden md:flex items-center space-x-8 font-semibold text-slate-600">
                    <a href="#home" class="hover:text-violet-600 transition-colors">Beranda</a>
                    <a href="#about" class="hover:text-violet-600 transition-colors">Tentang</a>
                    <a href="#features" class="hover:text-violet-600 transition-colors">Fitur</a>
                    <a href="#team" class="hover:text-violet-600 transition-colors">Tim</a>
                    <a href="#faq" class="hover:text-violet-600 transition-colors">FAQ</a>
                </div>

                <div class="hidden md:flex items-center space-x-4">
                    <a href="./php/akun.php#signup" class="text-slate-500 hover:text-violet-600 font-semibold 
                        transition-colors">Daftar</a>
                    <a href="./php/akun.php#login" class="bg-primary-dark text-white px-6 py-2.5 rounded-full  
                        hover:bg-violet-700 transition-all font-bold shadow-lg shadow-violet-200">Masuk</a>
                </div>

                <button id="mobileMenuBtn" class="md:hidden text-violet-600 focus:outline-none">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </nav>

        <section id="home" class="relative overflow-hidden bg-gradient-to-b from-violet-50 via-[#F3F0FF] to-[#F8F9FE] 
            min-h-screen flex items-center pt-24 pb-12">
            
            <div class="absolute top-20 left-10 w-64 h-64 bg-fuchsia-200 rounded-full mix-blend-multiply filter blur-3xl opacity-40">
                </div>
            <div class="absolute top-40 right-20 w-72 h-72 bg-violet-300 rounded-full mix-blend-multiply filter blur-3xl opacity-40">
                </div>
            
            <div class="max-w-5xl mx-auto px-6 relative z-10 text-center w-full">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white border border-violet-100 
                    soft-shadow text-violet-600 font-bold text-sm mb-8">
                    <span class="relative flex h-3 w-3">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-violet-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-3 w-3 bg-violet-500"></span>
                    </span>
                    Asah Kritis, Mandiri Tanpa AI
                </div>
                
                <h1 class="text-5xl md:text-7xl font-extrabold text-slate-800 mb-6 leading-[1.1] tracking-tight">
                    Berhenti Menyalin,<br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-fuchsia-500">
                        Mulai Memahami. 🧠
                    </span>
                </h1>
                
                <p class="text-lg md:text-xl font-medium text-slate-500 mb-10 max-w-2xl mx-auto leading-relaxed">
                    Kembangkan kemampuan berpikir kritis. Otakmu lebih hebat dari algoritma manapun. Mari berlatih secara menyenangkan!
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                    <a href="#features" class="bg-violet-600 text-white font-bold py-4 px-8 rounded-full shadow-lg 
                        shadow-violet-200 hover:shadow-xl hover:-translate-y-1 transition transform w-full sm:w-auto text-center text-lg">
                        Mulai Bermain 🚀
                    </a>
                    <a href="#about" class="bg-white text-slate-700 border border-slate-200 py-4 px-8 rounded-full font-bold 
                        hover:bg-slate-50 transition w-full sm:w-auto text-center text-lg">
                        Pelajari Lebih Lanjut
                    </a>
                </div>
            </div>

        </section>

        <section id="about" class="py-24 bg-white relative z-20 overflow-hidden border-y border-slate-100">
            <div class="max-w-7xl mx-auto px-6 w-full flex flex-col lg:flex-row items-center gap-16">
                
                <div class="w-full lg:w-1/2 relative">
                    <div class="absolute -inset-4 bg-fuchsia-100 rounded-[3rem] transform -rotate-3 z-0"></div>
                    <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&q=80&w=800" 
                        alt="Students studying" class="relative z-10 rounded-[2rem] shadow-xl border-4 border-white object-cover 
                        aspect-video md:aspect-[4/3] w-full">
                    <div class="absolute -bottom-6 -right-6 bg-white p-4 rounded-2xl shadow-lg border border-slate-100 z-20 
                        hover:scale-110 transition-transform">
                        <span class="text-4xl">💡</span>
                    </div>
                </div>
                
                <div class="w-full lg:w-1/2 space-y-8 relative z-10">
                    <div>
                        <span class="text-fuchsia-500 font-bold tracking-wider uppercase text-sm mb-2 block">
                            Mengapa Berpikir Kritis?
                        </span>
                        <h2 class="text-3xl md:text-5xl font-extrabold text-slate-800 leading-tight mb-6">
                            Otakmu Lebih Hebat dari 
                            <span class="text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-fuchsia-500">
                                Algoritma.
                            </span>
                        </h2>
                        <p class="text-lg text-slate-500 leading-relaxed font-medium">
                            Di era di mana AI bisa menjawab hampir segalanya, kemampuan untuk menganalisis, mengevaluasi, dan 
                            memecahkan masalah secara mandiri menjadi sangat mahal. Ketergantungan berlebihan pada AI membuat 
                            insting analitismu tumpul.
                        </p>
                    </div>
                    
                    <div class="space-y-4">
                        <div class="flex items-center gap-4 bg-slate-50 hover:bg-white p-4 rounded-2xl border 
                            border-slate-100 soft-shadow transition-all">
                            <div class="w-14 h-14 bg-violet-100 text-violet-600 rounded-xl flex items-center justify-center 
                                font-extrabold text-xl shrink-0">1</div>
                            <p class="font-bold text-slate-700">Meningkatkan Logika Pemecahan Masalah</p>
                        </div>

                        <div class="flex items-center gap-4 bg-slate-50 hover:bg-white p-4 rounded-2xl border border-slate-100 
                            soft-shadow transition-all">
                            <div class="w-14 h-14 bg-fuchsia-100 text-fuchsia-600 rounded-xl flex items-center justify-center 
                                font-extrabold text-xl shrink-0">2</div>
                            <p class="font-bold text-slate-700">Mencegah Plagiarisme Otomatis</p>
                        </div>

                        <div class="flex items-center gap-4 bg-slate-50 hover:bg-white p-4 rounded-2xl border border-slate-100 
                            soft-shadow transition-all">
                            <div class="w-14 h-14 bg-orange-100 text-orange-600 rounded-xl flex items-center justify-center 
                                font-extrabold text-xl shrink-0">3</div>
                            <p class="font-bold text-slate-700">Membangun Karakter Akademik yang Jujur</p>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <section id="features" class="py-24 relative z-20">
            <div class="max-w-7xl mx-auto px-6 w-full">

                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-5xl font-extrabold text-slate-800 mb-4">Mode Latihan 
                        <span class="text-violet-600">Thinkara</span> 🎮
                    </h2>
                    <p class="text-lg text-slate-500 max-w-2xl mx-auto font-medium">
                        Asah kemampuan logikamu melalui simulasi interaktif yang menantang dan menyenangkan.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="bg-white p-8 rounded-[2rem] soft-shadow border border-slate-100 hover:-translate-y-2 
                        transition-all duration-300">
                        <div class="w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center text-3xl mb-6 border 
                            border-blue-100">🧩</div>

                        <h3 class="text-2xl font-bold text-slate-800 mb-3">Argument Builder</h3>
                        <p class="text-slate-500 leading-relaxed mb-6 font-medium">
                            Susun blok-blok premis dan kesimpulan yang acak menjadi satu kesatuan argumen yang valid.
                        </p>
                        <a href="#" class="inline-flex items-center justify-center w-full bg-slate-50 hover:bg-blue-50 
                            text-blue-600 font-bold py-3 rounded-xl transition">
                            Mulai Menyusun &rarr;
                        </a>
                    </div>

                    <div class="bg-white p-8 rounded-[2rem] soft-shadow border border-slate-100 hover:-translate-y-2 
                        transition-all duration-300">
                        <div class="w-16 h-16 bg-fuchsia-50 rounded-2xl flex items-center justify-center text-3xl mb-6 border 
                            border-fuchsia-100">🛠️</div>
                        <h3 class="text-2xl font-bold text-slate-800 mb-3">Fix The Argument</h3>
                        <p class="text-slate-500 leading-relaxed mb-6 font-medium">
                            Analisis titik kelemahan teks dan perbaiki struktur argumen agar menjadi lebih kokoh.
                        </p>
                        <a href="#" class="inline-flex items-center justify-center w-full bg-slate-50 hover:bg-fuchsia-50 
                            text-fuchsia-600 font-bold py-3 rounded-xl transition">
                            Perbaiki Sekarang &rarr;
                        </a>
                    </div>

                    <div class="bg-white p-8 rounded-[2rem] soft-shadow border border-slate-100 hover:-translate-y-2 transition-all 
                        duration-300">
                        <div class="w-16 h-16 bg-violet-50 rounded-2xl flex items-center justify-center text-3xl mb-6 border 
                            border-violet-100">⚡</div>
                        <h3 class="text-2xl font-bold text-slate-800 mb-3">QTE Typing Challenge</h3>
                        <p class="text-slate-500 leading-relaxed mb-6 font-medium">
                            Tingkatkan refleks dan kosakata dengan mengetik cepat di bawah tekanan waktu.
                        </p>
                        <a href="#" class="inline-flex items-center justify-center w-full bg-slate-50 hover:bg-violet-50 
                            text-violet-600 font-bold py-3 rounded-xl transition">
                            Mulai Mengetik &rarr;
                        </a>
                    </div>

                    <div class="bg-white p-8 rounded-[2rem] soft-shadow border border-slate-100 hover:-translate-y-2 
                        transition-all duration-300">
                        <div class="w-16 h-16 bg-orange-50 rounded-2xl flex items-center justify-center text-3xl mb-6 border 
                            border-orange-100">🕵️</div>
                        <h3 class="text-2xl font-bold text-slate-800 mb-3">Fallacy Finder</h3>
                        <p class="text-slate-500 leading-relaxed mb-6 font-medium">
                            Deteksi letak kecacatan logika (Logical Fallacy) yang tersembunyi pada sebuah studi kasus.
                        </p>
                        <a href="#" class="inline-flex items-center justify-center w-full bg-slate-50 hover:bg-orange-50 
                            text-orange-600 font-bold py-3 rounded-xl transition">
                            Cari Kesalahan &rarr;
                        </a>
                    </div>
                </div>

            </div>
        </section>

        <section id="testimonials" class="py-24 bg-white relative border-t border-slate-100">
            <div class="max-w-7xl mx-auto px-6 text-center">

                <span class="text-violet-500 font-bold tracking-wider uppercase text-sm mb-2 block">Kata Mereka</span>
                <h2 class="text-3xl md:text-5xl font-extrabold text-slate-800 mb-12">Disukai Mahasiswa & Pelajar 💬</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-left">
                    <div class="bg-[#F8F9FE] p-8 rounded-[2rem] soft-shadow border border-slate-50 hover:-translate-y-2 
                        transition-transform relative">

                        <div class="text-4xl absolute top-6 right-8 opacity-20">❝</div>
                        <p class="text-slate-600 mb-8 font-medium italic relative z-10">
                            "Sejak main Thinkara, aku jadi lebih gampang nyusun esai tanpa harus bolak-balik nanya AI. 
                            Fallacy Finder-nya seru banget, berasa jadi detektif!"
                        </p>

                        <div class="flex items-center gap-4">
                            <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Nisa" alt="Nisa" 
                                class="w-12 h-12 rounded-full bg-white border-2 border-violet-200">
                            <div>
                                <h4 class="font-bold text-slate-800">Anisa Putri</h4>
                                <p class="text-sm text-slate-500">Mahasiswa Ilmu Komunikasi</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-[#F8F9FE] p-8 rounded-[2rem] soft-shadow border border-slate-50 hover:-translate-y-2 
                        transition-transform relative">
                        <div class="text-4xl absolute top-6 right-8 opacity-20">❝</div>
                        <p class="text-slate-600 mb-8 font-medium italic relative z-10">
                            "Dulu suka bingung kalau debat argumennya mentok. Latihan di sini bikin mikir lebih struktural. 
                            UI-nya juga fresh banget, ga ngebosenin!"
                        </p>

                        <div class="flex items-center gap-4">
                            <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Riko" alt="Riko" 
                                class="w-12 h-12 rounded-full bg-white border-2 border-fuchsia-200">
                            <div>
                                <h4 class="font-bold text-slate-800">Riko Pratama</h4>
                                <p class="text-sm text-slate-500">Siswa SMA Plus</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-[#F8F9FE] p-8 rounded-[2rem] soft-shadow border border-slate-50 hover:-translate-y-2 
                    transition-transform relative">
                        <div class="text-4xl absolute top-6 right-8 opacity-20">❝</div>
                        <p class="text-slate-600 mb-8 font-medium italic relative z-10">
                            "Platform yang ngebantu banget buat stop kebiasaan copas tugas dari ChatGPT. 
                            Bikin otak beneran kerja dan mikir kritis."
                        </p>
                        
                        <div class="flex items-center gap-4">
                            <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Tari" alt="Tari" 
                                class="w-12 h-12 rounded-full bg-white border-2 border-orange-200">
                            <div>
                                <h4 class="font-bold text-slate-800">Lestari</h4>
                                <p class="text-sm text-slate-500">Mahasiswa Hukum</p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </section>

        <section id="faq" class="py-24 bg-[#F8F9FE] relative">
            <div class="max-w-3xl mx-auto px-6">

                <div class="text-center mb-12">
                    <span class="text-fuchsia-500 font-bold tracking-wider uppercase text-sm mb-2 block">Punya Pertanyaan?</span>
                    <h2 class="text-3xl md:text-5xl font-extrabold text-slate-800">FAQ 🤔</h2>
                </div>

                <div class="space-y-4">
                    <details class="group bg-white rounded-2xl shadow-sm border border-slate-100 hover:border-violet-200 
                        transition-colors cursor-pointer" open>
                        <summary class="flex justify-between items-center font-bold text-lg text-slate-800 p-6 outline-none">
                            Apakah Thinkara gratis digunakan?
                            <span class="transition duration-300 group-open:-rotate-180 text-violet-600">
                                <svg fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" 
                                stroke-width="2" viewBox="0 0 24 24" width="24"><path d="M6 9l6 6 6-6"></path></svg>
                            </span>
                        </summary>

                        <p class="text-slate-500 font-medium px-6 pb-6 mt-[-10px]">
                            Ya! Semua fitur dasar untuk melatih logika dan berpikir kritis bisa kamu akses secara gratis.
                        </p>
                    </details>

                    <details class="group bg-white rounded-2xl shadow-sm border border-slate-100 hover:border-violet-200 
                        transition-colors cursor-pointer">
                        <summary class="flex justify-between items-center font-bold text-lg text-slate-800 p-6 outline-none">
                            Apakah ini menggantikan ChatGPT atau AI lainnya?
                            <span class="transition duration-300 group-open:-rotate-180 text-violet-600">
                                <svg fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" 
                                    stroke-width="2" viewBox="0 0 24 24" width="24"><path d="M6 9l6 6 6-6"></path></svg>
                            </span>
                        </summary>

                        <p class="text-slate-500 font-medium px-6 pb-6 mt-[-10px]">
                            Tidak, Thinkara bukan AI penjawab soal. Ini adalah platform gamifikasi agar kamu bisa berpikir mandiri 
                            dan tidak selalu bergantung pada AI saat mengerjakan tugas.
                        </p>
                    </details>

                    <details class="group bg-white rounded-2xl shadow-sm border border-slate-100 hover:border-violet-200 
                    transition-colors cursor-pointer">
                        <summary class="flex justify-between items-center font-bold text-lg text-slate-800 p-6 outline-none">
                            Apakah ada aplikasi mobile-nya?
                            <span class="transition duration-300 group-open:-rotate-180 text-violet-600">
                                <svg fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" 
                                stroke-width="2" viewBox="0 0 24 24" width="24"><path d="M6 9l6 6 6-6"></path></svg>
                            </span>
                        </summary>

                        <p class="text-slate-500 font-medium px-6 pb-6 mt-[-10px]">
                            Saat ini Thinkara berbasis web yang sangat responsif, sehingga tetap nyaman diakses lewat browser di HP kamu. 
                            Versi aplikasi sedang dalam pengembangan.
                        </p>
                    </details>

                    <details class="group bg-white rounded-2xl shadow-sm border border-slate-100 hover:border-violet-200 
                        transition-colors cursor-pointer">
                        <summary class="flex justify-between items-center font-bold text-lg text-slate-800 p-6 outline-none">
                            Bagaimana cara melaporkan bug atau memberi saran?
                            <span class="transition duration-300 group-open:-rotate-180 text-violet-600">
                                <svg fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" 
                                stroke-width="2" viewBox="0 0 24 24" width="24"><path d="M6 9l6 6 6-6"></path></svg>
                            </span>
                        </summary>

                        <p class="text-slate-500 font-medium px-6 pb-6 mt-[-10px]">
                            Kamu bisa langsung mengirim email ke support@thinkara.id atau menghubungi kami melalui 
                            sosial media resmi kami.
                        </p>
                    </details>
                </div>

            </div>
        </section>

        <section id="team" class="py-24 bg-white relative">
            <div class="max-w-7xl mx-auto px-6 text-center">

                <h2 class="text-3xl md:text-5xl font-extrabold text-slate-800 mb-4">Inisiator Kami 👋</h2>
                <p class="text-lg text-slate-500 max-w-2xl mx-auto font-medium mb-16">
                    Tim di balik Thinkara yang berdedikasi membangun pendidikan masa depan.
                </p>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-[#F8F9FE] p-8 rounded-[2rem] text-center soft-shadow border border-slate-50 
                        hover:-translate-y-2 transition-transform">
                        <img src="gambar/fotoAxel.png" alt="Axel" 
                            class="w-24 h-24 mx-auto rounded-full mb-4 shadow-sm">                
                        
                        <h3 class="text-xl font-bold text-slate-800">AXEL</h3>
                        <p class="text-violet-600 font-bold text-sm">Lead Programmer</p>
                    </div>

                    <div class="bg-[#F8F9FE] p-8 rounded-[2rem] text-center soft-shadow border border-slate-50 
                        md:-translate-y-6 hover:-translate-y-8 transition-transform">
                        <img src="gambar/fotoJeff.png" alt="Jeff" 
                            class="w-24 h-24 mx-auto rounded-full mb-4 shadow-sm">
                        
                        <h3 class="text-xl font-bold text-slate-800">JEFF</h3>
                        <p class="text-orange-500 font-bold text-sm">UI/UX Designer</p>
                    </div>

                    <div class="bg-[#F8F9FE] p-8 rounded-[2rem] text-center soft-shadow border border-slate-50 
                        hover:-translate-y-2 transition-transform">
                        <img src="gambar/fotoNana.png" alt="Najwa" 
                            class="w-24 h-24 mx-auto rounded-full mb-4 shadow-sm">
                        
                        <h3 class="text-xl font-bold text-slate-800">NAJWA</h3>
                        <p class="text-fuchsia-500 font-bold text-sm">Content Researcher</p>
                    </div>
                </div>

            </div>
        </section>

        <footer class="bg-slate-900 pt-20 pb-10 relative overflow-hidden mt-10">
            <div class="absolute top-0 left-1/4 w-96 h-96 bg-violet-600/20 rounded-full blur-3xl -translate-y-1/2"></div>
            <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-fuchsia-600/20 rounded-full blur-3xl translate-y-1/2"></div>

            <div class="max-w-7xl mx-auto px-6 relative z-10">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-16 border-b border-slate-800 pb-12">
                    
                    <div class="md:col-span-2">
                        <span class="text-3xl font-extrabold text-white tracking-tight flex items-center gap-2 mb-6">
                            <div class="w-10 h-10 bg-violet-600 rounded-xl flex items-center justify-center text-white text-xl 
                                shadow-lg shadow-violet-500/30">✨</div>
                            THINKARA.
                        </span>

                        <p class="text-slate-400 max-w-sm leading-relaxed mb-8 font-medium">
                            Platform gamifikasi untuk mengasah logika dan mencegah ketergantungan pada AI. 
                            Kendalikan teknologi, jangan biarkan ia mengendalikanmu.
                        </p>
                        <a href="mailto:support@thinkara.id" class="inline-block bg-white text-slate-900 font-bold py-3 px-8 
                            rounded-full hover:scale-105 transition transform shadow-lg">
                            Hubungi Kami
                        </a>
                    </div>

                    <div>
                        <h4 class="text-white font-bold mb-6 text-lg">Tautan Cepat</h4>
                        <ul class="space-y-4 text-slate-400 font-medium">
                            <li><a href="#home" class="hover:text-violet-400 transition-colors">Beranda</a></li>
                            <li><a href="#about" class="hover:text-violet-400 transition-colors">Tentang Platform</a></li>
                            <li><a href="#testimonials" class="hover:text-violet-400 transition-colors">Testimoni</a></li>
                            <li><a href="#faq" class="hover:text-violet-400 transition-colors">FAQ</a></li>
                        </ul>
                    </div>

                    <div>
                        <h4 class="text-white font-bold mb-6 text-lg">Ikuti Kami</h4>
                        
                        <div class="flex gap-4 mb-8">
                            <a href="#" class="w-12 h-12 rounded-full bg-slate-800 flex items-center justify-center text-slate-400 
                                hover:bg-violet-600 hover:text-white transition-all shadow-md">IG</a>
                            <a href="#" class="w-12 h-12 rounded-full bg-slate-800 flex items-center justify-center text-slate-400 
                                hover:bg-violet-600 hover:text-white transition-all shadow-md">TW</a>
                            <a href="#" class="w-12 h-12 rounded-full bg-slate-800 flex items-center justify-center text-slate-400 
                                hover:bg-violet-600 hover:text-white transition-all shadow-md">IN</a>
                        </div>
                        
                        <p class="text-sm text-slate-500 font-medium">Dapatkan info *update* fitur dan tips belajar terbaru dari Thinkara.</p>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row justify-between items-center text-slate-500 text-sm font-semibold">
                    <p>&copy; 2026 Thinkara Project. Hak Cipta Dilindungi.</p>
                    
                    <div class="flex gap-6 mt-4 md:mt-0">
                        <a href="#" class="hover:text-white transition">Syarat & Ketentuan</a>
                        <a href="#" class="hover:text-white transition">Kebijakan Privasi</a>
                    </div>
                </div>

            </div>
        </footer>

    </body>
</html>