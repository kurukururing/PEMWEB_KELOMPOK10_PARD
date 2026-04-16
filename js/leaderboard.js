// coba leaderboard

// pencarian

function funSearch() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("pencarian");
  filter = input.value.toUpperCase().trim();
  table = document.getElementById("tabel");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 1; i < tr.length; i++) {

    const rowText = tr[i].innerText || tr[i].textContent;
    if (rowText) {
            if (rowText.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
    }
  }
}

const leaderboardData = data_dari_DB || [];
console.log("Data Leaderboard:", leaderboardData); // Cek ini di Console F12

function ubahLeaderboard(sortBy) {
    console.log("Mengurutkan berdasarkan:", sortBy);

    let sortedData = [...leaderboardData];

    sortedData.sort((a, b) => {
        if (sortBy === 'waktu_tercepat') {
            // Gunakan 99:99 jika waktu kosong agar berada di paling bawah
            let waktuA = a.waktu_tercepat || '99:99:99';
            let waktuB = b.waktu_tercepat || '99:99:99';
            return waktuA.localeCompare(waktuB);
        } else {
            // DESC: Terbaru ke terlama
            return (b.waktu_dimulai || '').localeCompare(a.waktu_dimulai || '');
        }
    });

    renderTable(sortedData);
    updateButtonStyles(sortBy);
}

function renderTable(data) {
    const tbody = document.getElementById('leaderboard');
    if (!tbody) return; // Keamanan jika elemen tidak ditemukan

    tbody.innerHTML = '';

    data.forEach((item, index) => {
        const row = `
            <tr class="group hover:bg-violet-50/30 transition-colors">
                <td class="px-6 py-5 text-center">
                    <span class="font-black ${index === 0 ? 'text-yellow-500' : 'text-slate-400'}">${index + 1}</span>
                </td>
                <td class="px-6 py-5">
                    <div class="flex items-center gap-3">
                        <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=${encodeURIComponent(item.nama_pengguna)}" class="w-9 h-9 rounded-full bg-slate-100 border border-slate-200">
                        <span class="font-bold text-slate-800">${item.nama_pengguna}</span>
                    </div>
                </td>
                <td class="px-6 py-5 text-right font-bold text-slate-600">${item.xp}</td>
                <td class="px-6 py-5 text-right font-bold text-slate-600">${item.skor}</td>
                <td class="px-6 py-5 text-right text-sm text-slate-400">${item.waktu_dimulai}</td>
                <td class="px-6 py-5 text-right">
                    <span class="font-mono text-violet-600 font-bold bg-violet-50 px-3 py-1.5 rounded-lg tracking-tight">
                        ${item.waktu_tercepat || '--:--'}
                    </span>
                </td>
            </tr>`;
        tbody.innerHTML += row;
    });
}

function updateButtonStyles(activeSort) {
    const btnTercepat = document.getElementById('btncepat');
    const btnMulai = document.getElementById('btnmulai');

    // Reset Style
    [btnTercepat, btnMulai].forEach(btn => {
        btn.className = "px-5 py-2.5 bg-white border border-slate-200 text-slate-600 font-bold rounded-xl transition-all hover:bg-slate-50";
    });

    // Set Active Style
    const activeBtn = (activeSort === 'waktu_tercepat') ? btnTercepat : btnMulai;
    activeBtn.className = "px-5 py-2.5 bg-violet-600 text-white font-bold rounded-xl shadow-lg shadow-violet-200 transition-all hover:scale-105";
}

// Jalankan pertama kali saat halaman dimuat
document.addEventListener('DOMContentLoaded', () => {
    // Default: Urutkan berdasarkan XP tertinggi atau Waktu Mulai
    ubahLeaderboard('waktu_dimulai');
});