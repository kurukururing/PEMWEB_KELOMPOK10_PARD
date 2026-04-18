// SEARCH
function funSearch() {
    var input = document.getElementById("pencarian").value.toUpperCase();
    var table = document.getElementById("leaderboard");
    var rows = table.getElementsByTagName("tr");
    
    for (var i = 0; i < rows.length; i++) {
        var txt = rows[i].innerText || rows[i].textContent;
        if (txt.toUpperCase().indexOf(input) > -1) {
            rows[i].style.display = "";
        } else {
            rows[i].style.display = "none";
        }
    }
}

// Format waktu dari int(detik) ke mm:ss
function formatWaktu(detik) {
    if (!detik || detik == 0) return "--:--";
    var m = Math.floor(detik / 60);
    var s = detik % 60;
    var detikString = (s < 10) ? "0" + s : s;
    return m + ":" + detikString;
}

// Sorting
function ubahLeaderboard(sortBy) {
    if (typeof data_dari_DB === 'undefined') return;

    var sortedData = [...data_dari_DB];

    sortedData.sort(function(a, b) {
        if (sortBy === 'durasi') {
            var aDurasi = a.durasi ? parseInt(a.durasi) : 999999;
            var bDurasi = b.durasi ? parseInt(b.durasi) : 999999;
            return aDurasi - bDurasi;
        } else if (sortBy === 'waktu_main') {
            var wA = a.waktu_main || "";
            var wB = b.waktu_main || "";
            return wB.localeCompare(wA);
        } else {
            var sA = a.skor || 0;
            var sB = b.skor || 0;
            return sB - sA;
        }
    });

    renderTable(sortedData);
    ubahTombol(sortBy);
}

// Tampilkan tabel
function renderTable(data) {
    const tbody = document.getElementById('leaderboard');
    if (!tbody) return;
    
    tbody.innerHTML = '';

    data.forEach((item, index) => {
        const nama = item.username || "Guest";
        const durasiTampil = formatWaktu(item.durasi);

        const row = `
            <tr class="group hover:bg-violet-50/30 transition-colors">
                <td class="px-6 py-5 text-center font-black ${index === 0 ? 'text-yellow-500' : 'text-slate-400'}">${index + 1}</td>
                <td class="px-6 py-5 flex items-center gap-3 font-bold text-slate-800">
                    <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=${encodeURIComponent(nama)}" class="w-9 h-9 rounded-full bg-slate-100 border">
                    ${nama}
                </td>
                <td class="px-6 py-5 text-right font-bold text-slate-600">${item.xp || 0}</td>
                <td class="px-6 py-5 text-right font-bold text-slate-600">${item.skor || 0}</td>
                <td class="px-6 py-5 text-right text-sm text-slate-400">${item.waktu_main || "-"}</td>
                <td class="px-6 py-5 text-right">
                    <span class="font-mono text-violet-600 font-bold bg-violet-50 px-3 py-1.5 rounded-lg">
                        ${durasiTampil}
                    </span>
                </td>
            </tr>`;
        tbody.innerHTML += row;
    });
}

// Ganti respon tombol
function ubahTombol(activeSort) {
    const btnCepat = document.getElementById('btncepat');
    const btnMulai = document.getElementById('btnmulai');

    // Reset Style
    [btnCepat, btnMulai].forEach(btn => {
        if (btn) btn.className = "px-5 py-2.5 bg-white border border-slate-200 text-slate-600 font-bold rounded-xl transition-all hover:bg-slate-50";
    });

    // Set respon tombol aktif
    if (activeSort === 'durasi' && btnCepat) {
        btnCepat.className = "px-5 py-2.5 bg-violet-600 text-white font-bold rounded-xl shadow-lg shadow-violet-200 scale-105";
    } else if (activeSort === 'waktu_main' && btnMulai) {
        btnMulai.className = "px-5 py-2.5 bg-violet-600 text-white font-bold rounded-xl shadow-lg shadow-violet-200 scale-105";
    }
}

document.addEventListener('DOMContentLoaded', () => {
    ubahLeaderboard('waktu_main'); 
});