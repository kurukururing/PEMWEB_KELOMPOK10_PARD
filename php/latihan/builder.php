<?php
    include("../connect.php");
    include("../akses.php");
    
    // Cek Akses
    if ($_SESSION['role'] != "mahasiswa") {
        echo "Kamu tidak punya akses";
        exit();
    }

    // 1. Ambil satu soal secara acak (Tabel: soal)
    // Kita ambil soal yang id_latihan-nya adalah 1 (Argument Builder)
    $sql1     = "SELECT * FROM soal WHERE id_latihan = 1 ORDER BY RAND() LIMIT 1";
    $q1       = mysqli_query($connection, $sql1);
    $d        = mysqli_fetch_assoc($q1);

    // 2. Ambil item pendukung soal tersebut (Tabel: soal_item_builder)
    $id_soal  = $d['id_soal'];
    $sql2     = "SELECT * FROM soal_item_builder WHERE id_soal = $id_soal ORDER BY RAND()";
    $q2       = mysqli_query($connection, $sql2);

    // Tambahan: Ambil nama user untuk header
    $id_akun  = $_SESSION['id_akun'];
    $q_user   = mysqli_query($connection, "SELECT nama_mahasiswa FROM mahasiswa WHERE id_akun = '$id_akun'");
    $d_user   = mysqli_fetch_assoc($q_user);
    $nama_user = $d_user['nama_mahasiswa'] ?? 'Pelajar Baru';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Argument Builder | THINKARA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Nunito', sans-serif; background-color: #F8F9FE; }
        .soft-shadow { box-shadow: 0 10px 40px -10px rgba(124, 58, 237, 0.08); }
        .dropzone { 
            transition: all 0.3s ease; 
            min-height: 80px; 
            border: 2px dashed #e2e8f0;
        }
        .dropzone.drag-over { border-color: #7c3aed; background-color: #f5f3ff; }
        .drag-item { transition: transform 0.2s ease, box-shadow 0.2s ease; }
        .drag-item:hover { transform: translateY(-2px); }
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
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
                Arena Latihan
            </a>            
        </nav>
        <div class="p-6 border-t border-slate-100">
            <a href="../dashboard.php" class="flex items-center gap-4 px-4 py-3 text-red-500 hover:bg-red-50 rounded-2xl font-bold transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                Kembali
            </a>
        </div>
    </aside>

    <main class="flex-1 flex flex-col h-full relative overflow-hidden">
        <header class="h-20 bg-white/80 backdrop-blur-md border-b border-slate-100 flex items-center justify-between px-6 md:px-10 z-10">
            <div class="hidden md:block">
                <h1 class="text-xl font-extrabold text-slate-800 tracking-tight">Argument Builder</h1>
            </div>
            <div class="flex items-center gap-3">
                <div class="flex items-center gap-3 p-1.5 pr-4 bg-slate-50 rounded-full border border-slate-200">
                    <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=<?= $nama_user ?>" alt="Profile" class="w-9 h-9 rounded-full shadow-sm bg-white">
                    <span class="font-bold text-sm hidden md:block"><?= $nama_user ?></span>
                </div>
            </div>
        </header>

        <div class="flex-1 overflow-y-auto p-6 md:p-10 pb-24">
            <div class="max-w-6xl mx-auto space-y-8">
                <div class="bg-gradient-to-r from-violet-600 to-indigo-600 rounded-[2rem] p-8 text-white shadow-xl mb-10">
                    <h3 class="text-3xl font-extrabold mb-2">Topik: <?= $d['topik'] ?></h3>
                    <p class="text-violet-100 opacity-90">Drag item ke kotak kiri. <b>Klik item di kotak kiri</b> untuk mengembalikannya.</p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                    <div class="lg:col-span-5 space-y-4">
                        <div class="bg-white p-6 rounded-[2rem] border border-slate-100 soft-shadow space-y-6">
                            <?php 
                            $zones = [
                                ['type' => 'claim', 'label' => 'Claim', 'color' => 'violet'],
                                ['type' => 'evidence', 'label' => 'Evidence', 'color' => 'blue'],
                                ['type' => 'reasoning', 'label' => 'Reasoning', 'color' => 'emerald'],
                                ['type' => 'reference', 'label' => 'Reference', 'color' => 'orange']
                            ];
                            foreach($zones as $z) { ?>
                                <div>
                                    <label class="text-xs font-black text-<?= $z['color'] ?>-600 uppercase mb-2 block ml-1"><?= $z['label'] ?></label>
                                    <div class="dropzone rounded-2xl bg-slate-50 p-4 flex items-center justify-center text-center cursor-default" data-type="<?= $z['type'] ?>">
                                        <span class="placeholder text-slate-300 font-bold text-sm">Kosong</span>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="lg:col-span-7 space-y-6">
                        <div class="bg-white p-8 rounded-[2rem] border border-slate-100 soft-shadow">
                            <h4 class="text-lg font-extrabold text-slate-800 mb-4 italic leading-relaxed border-l-4 border-fuchsia-200 pl-4">
                                "<?= $d['isi_soal'] ?>"
                            </h4>
                        </div>

                        <div id="source-pool" class="bg-white p-8 rounded-[2rem] border border-slate-100 soft-shadow min-h-[200px]">
                            <h4 class="text-lg font-extrabold text-slate-800 mb-6">Pilihan Potongan</h4>
                            <div class="flex flex-wrap gap-4 items-start" id="pool-container">
                                <?php while($item = mysqli_fetch_assoc($q2)) { ?>
                                    <div class="drag-item bg-white border-2 border-slate-100 p-4 rounded-2xl cursor-grab active:cursor-grabbing hover:border-violet-300 font-bold text-slate-700 text-sm shadow-sm" 
                                         draggable="true" 
                                         data-type="<?= $item['tipe'] ?>"
                                         data-correct="<?= $item['is_correct'] ?>"
                                         onclick="returnToPool(this)">
                                        <?= $item['isi_item'] ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="flex items-center gap-4 pt-4">
                            <form id="gameForm" method="POST" action="submit_score.php" class="flex-1">
                                <input type="hidden" name="id_soal" value="<?= $d['id_soal'] ?>">
                                <input type="hidden" name="waktu" id="waktuInput">
                                <input type="hidden" name="skor" id="skorInput">
                                <button type="button" onclick="submitGame()" class="w-full bg-violet-600 hover:bg-violet-700 text-white font-bold py-4 rounded-2xl shadow-lg transition-all">
                                    Submit Jawaban
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        let dragged = null;
        const poolContainer = document.getElementById('pool-container');

        function returnToPool(item) {
            if (item.parentElement.classList.contains('dropzone')) {
                const zone = item.parentElement;
                poolContainer.appendChild(item);
                checkPlaceholder(zone);
            }
        }

        function checkPlaceholder(zone) {
            const placeholder = zone.querySelector('.placeholder');
            if (zone.querySelectorAll('.drag-item').length === 0) {
                if (placeholder) placeholder.style.display = 'block';
            } else {
                if (placeholder) placeholder.style.display = 'none';
            }
        }

        document.querySelectorAll('.drag-item').forEach(item => {
            item.addEventListener('dragstart', () => {
                dragged = item;
                item.style.opacity = '0.5';
            });
            item.addEventListener('dragend', () => {
                item.style.opacity = '1';
                dragged = null;
            });
        });

        [...document.querySelectorAll('.dropzone'), poolContainer].forEach(zone => {
            zone.addEventListener('dragover', e => {
                e.preventDefault();
                if (zone.classList.contains('dropzone') && zone.querySelectorAll('.drag-item').length > 0) return;
                zone.classList.add('drag-over');
            });

            zone.addEventListener('dragleave', () => zone.classList.remove('drag-over'));

            zone.addEventListener('drop', function (e) {
                e.preventDefault();
                this.classList.remove('drag-over');
                if (!dragged) return;

                const oldParent = dragged.parentElement;

                if (this.classList.contains('dropzone')) {
                    if (this.querySelectorAll('.drag-item').length === 0) {
                        this.appendChild(dragged);
                    }
                } else {
                    this.appendChild(dragged);
                }

                if (oldParent.classList.contains('dropzone')) checkPlaceholder(oldParent);
                if (this.classList.contains('dropzone')) checkPlaceholder(this);
            });
        });

        let startTime = new Date();
        function submitGame() {
            let duration = Math.floor((new Date() - startTime) / 1000);
            document.getElementById("waktuInput").value = duration;
            let score = 0;
            document.querySelectorAll('.dropzone').forEach(zone => {
                const item = zone.querySelector('.drag-item');
                // Logika penilaian diperbaiki: cek tipe zona vs tipe item & is_correct
                if (item && item.dataset.type === zone.dataset.type && item.dataset.correct == "1") {
                    item.style.background = "#dcfce7";
                    score += 25; // 4 item benar = 100 skor
                } else if (item) {
                    item.style.background = "#fee2e2";
                }
            });
            document.getElementById("skorInput").value = score;
            document.getElementById("gameForm").submit();
        }
    </script>
</body>
</html>