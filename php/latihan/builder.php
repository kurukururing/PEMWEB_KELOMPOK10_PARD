<?php
    include("../connect.php");
    include("../akses.php");
    
    // Cek Akses
    if ($_SESSION['role'] != "mahasiswa") {
        echo "Kamu tidak punya akses";
        exit();
    }

    // Latihan
    $sql1     = "SELECT * FROM latihan ORDER BY RAND() LIMIT 1";
    $q1       = mysqli_query($connection, $sql1);
    $d        = mysqli_fetch_assoc($q1);

    // Soal
    $id       = $d['id_latihan'];
    $sql2     = "SELECT * FROM soal_item WHERE id_latihan = $id ORDER BY RAND()";
    $q2       = mysqli_query($connection, $sql2);
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
              
              <div class="flex items-center gap-4 md:hidden">
                  <button class="text-violet-600 p-2 bg-violet-50 rounded-xl">
                      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                  </button>
                  <span class="text-xl font-extrabold text-violet-600 tracking-tight">THINKARA</span>
              </div>

              <div class="hidden md:block">
                  <h1 class="text-xl font-extrabold text-slate-800">Argument Builder</h1>
              </div>

          </header>

          <div class="flex-1 overflow-y-auto p-6 md:p-10 pb-24">
              <div class="max-w-6xl mx-auto space-y-8">

                  <div>
                      <div class="flex justify-between items-end mb-6">
                          <div>
                              <h3 class="text-xl font-extrabold text-slate-800">
                                Topik: <?= $d['judul'] ?>
                              </h3>

                              <p class="text-slate-500 font-medium">
                                Pahami struktur dasar premis dan kesimpulan. Susun argumen yang valid dari blok-blok yang diacak.
                              </p>
                          </div>
                      </div>
                      
                      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                          <div class="bg-white p-1 rounded-3xl border border-slate-100 soft-shadow group hover:border-violet-200 transition-colors">
                              
                            <div class="bg-slate-50 rounded-[1.5rem] p-6 h-full flex flex-col justify-between">
                                  <div>
                                      <h4 class="text-lg font-extrabold text-slate-800 mb-2">Tentukan</h4>
                                      <p class="text-slate-500 text-sm font-medium leading-relaxed mb-6">
                                      
                                      <div class="grid grid-cols-2 gap-6 mt-6">
                                        <div class="space-y-3">
                                          <div class="dropzone border p-3" data-type="claim">Claim</div>
                                          <div class="dropzone border p-3" data-type="evidence">Evidence</div>
                                          <div class="dropzone border p-3" data-type="reasoning">Reasoning</div>
                                          <div class="dropzone border p-3" data-type="reference">Reference</div>
                                        </div>
                                      </div>

                                      </p>
                                  </div>

                              </div>
                          </div>

                          <div class="bg-white p-1 rounded-3xl border border-slate-100 soft-shadow group hover:border-fuchsia-200 transition-colors">
                              <div class="bg-slate-50 rounded-[1.5rem] p-6 h-full flex flex-col justify-between">
                                  
                                <div>
                                      <h4 class="text-lg font-extrabold text-slate-800 mb-2">Isi Bacaan</h4>
                                      <p class="text-slate-500 text-sm font-medium leading-relaxed mb-6">
                                        <?= $d['isi'] ?>
                                      </p>

                                      <h4 class="text-lg font-extrabold text-slate-800 mb-2">Drag Jawaban</h4>
                                      <div class="mt-6 flex flex-wrap gap-3">
                                        <?php while($item = mysqli_fetch_assoc($q2)) { ?>
                                              
                                          <div class="drag-item border px-3 py-2 cursor-move" draggable="true" data-type="<?= $item['tipe'] ?>"
                                            data-correct="<?= $item['is_correct'] ?>">
                                              <?= $item['teks'] ?>
                                          </div>

                                          <?php } ?>
                                      </div>
                                  </div>

                              </div>
                          </div>

                      </div>
                  </div>

                  <form id="gameForm" method="POST" action="submit_score.php">
                    <input type="hidden" name="waktu" id="waktuInput">

                    <input type="hidden" name="skor" id="skorInput">
                    <button type="button" onclick="submitGame()" 
                        class="mt-6 bg-violet-600 text-white px-6 py-2 rounded-lg">
                        Submit Jawaban
                    </button>

                    <button type="button" onclick="location.reload()" 
                        class="mt-2 bg-gray-400 text-white px-6 py-2 rounded-lg">
                        Tantangan Baru
                    </button>
                  </form>

              </div>
          </div>
      </main>
      
      <script>
        let dragged = null;

        document.querySelectorAll('.drag-item').forEach(item => {
            item.addEventListener('dragstart', () => {
                dragged = item;
            });
        });

        document.querySelectorAll('.dropzone').forEach(zone => {
            zone.addEventListener('dragover', e => e.preventDefault());
            zone.addEventListener('drop', function () {

                if (!dragged) return;

                this.appendChild(dragged);
                dragged = null;
            });

        });

        let startTime = new Date();

        // submit skor
        function submitGame() {
            let endTime = new Date();
            let duration = Math.floor((endTime - startTime) / 1000);

            document.getElementById("waktuInput").value = duration;

            let score = 0;

            document.querySelectorAll('.drag-item').forEach(item => {
                let parent = item.parentElement;

                if (!parent.classList.contains('dropzone')) return;

                let correctType = item.dataset.type;
                let zoneType = parent.dataset.type;
                let isCorrect = item.dataset.correct;

                // cek benar
                if (correctType === zoneType && isCorrect == "1") {
                    item.style.background = "lightgreen";
                    score += 10;
                } else {
                    item.style.background = "salmon";
                }
            });
            
            document.getElementById("skorInput").value = score;
            document.getElementById("gameForm").submit();
        }
        </script>

  </body>
</html>