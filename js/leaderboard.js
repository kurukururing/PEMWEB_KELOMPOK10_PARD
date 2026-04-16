// ========================
// SEARCH
// ========================
function funSearch() {
  var input = document.getElementById("pencarian");
  var filter = input.value.toUpperCase().trim();
  var table = document.getElementById("tabel");
  var tr = table.getElementsByTagName("tr");

  for (let i = 1; i < tr.length; i++) {
    const rowText = tr[i].innerText || tr[i].textContent;

    if (rowText.toUpperCase().indexOf(filter) > -1) {
      tr[i].style.display = "";
    } else {
      tr[i].style.display = "none";
    }
  }
}

// ========================
// DATA
// ========================
const leaderboardData = data_dari_DB || [];

// ========================
// SORTING
// ========================
function ubahLeaderboard(sortBy) {
  let sortedData = [...leaderboardData];

  sortedData.sort((a, b) => {
    if (sortBy === 'waktu_tercepat') {
      let waktuA = a.waktu_tercepat || '99:99:99';
      let waktuB = b.waktu_tercepat || '99:99:99';
      return waktuA.localeCompare(waktuB);
    } else {
      // pakai waktu_main (bukan waktu_dimulai!)
      let waktuA = a.waktu_main || '';
      let waktuB = b.waktu_main || '';
      return waktuB.localeCompare(waktuA);
    }
  });

  renderTable(sortedData);
  updateButtonStyles(sortBy);
}

// ========================
// RENDER TABLE
// ========================
function renderTable(data) {
  const tbody = document.getElementById('leaderboard');
  tbody.innerHTML = '';

  data.forEach((item, index) => {

    // FIX FIELD DI SINI
    let nama = item.username ? item.username : "Guest";
    let xp = item.xp ?? 0;
    let skor = item.skor ?? 0;
    let waktuMulai = item.waktu_main ?? "-";
    let waktuTercepat = item.waktu_tercepat ?? "--:--:--";

    const row = `
      <tr class="group hover:bg-violet-50/30 transition-colors">
        <td class="px-6 py-5 text-center">
          <span class="font-black ${index === 0 ? 'text-yellow-500' : 'text-slate-400'}">
            ${index + 1}
          </span>
        </td>

        <td class="px-6 py-5">
          <div class="flex items-center gap-3">
            <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=${encodeURIComponent(nama)}"
                 class="w-9 h-9 rounded-full bg-slate-100 border">
            <span class="font-bold text-slate-800">${nama}</span>
          </div>
        </td>

        <td class="px-6 py-5 text-right font-bold text-slate-600">${xp}</td>
        <td class="px-6 py-5 text-right font-bold text-slate-600">${skor}</td>

        <td class="px-6 py-5 text-right text-sm text-slate-400">
          ${waktuMulai}
        </td>

        <td class="px-6 py-5 text-right">
          <span class="font-mono text-violet-600 font-bold bg-violet-50 px-3 py-1.5 rounded-lg">
            ${waktuTercepat}
          </span>
        </td>
      </tr>
    `;

    tbody.innerHTML += row;
  });
}

// ========================
// BUTTON STYLE
// ========================
function updateButtonStyles(activeSort) {
  const btnTercepat = document.getElementById('btncepat');
  const btnMulai = document.getElementById('btnmulai');

  [btnTercepat, btnMulai].forEach(btn => {
    btn.className = "px-5 py-2.5 bg-white border border-slate-200 text-slate-600 font-bold rounded-xl hover:bg-slate-50";
  });

  const activeBtn = (activeSort === 'waktu_tercepat') ? btnTercepat : btnMulai;
  activeBtn.className = "px-5 py-2.5 bg-violet-600 text-white font-bold rounded-xl shadow-lg";
}

// ========================
// INIT
// ========================
document.addEventListener('DOMContentLoaded', () => {
  ubahLeaderboard('waktu_dimulai');
});
