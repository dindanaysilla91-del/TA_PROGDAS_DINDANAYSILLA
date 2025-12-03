<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>PHydroponic Tracker</title>

  <style>
    :root{
      --bg:#eaf9ea;
      --card:#ffffffcc;
      --green-700:#1f6f3f;
      --green-500:#34a853;
      --green-400:#72d197;
      --muted:#7b8b7b;
      --danger:#e06b6b;
      --radius:14px;
    }
    html,body{height:100%}
    body{
      margin:0; font-family:Inter, "League Spartan", Roboto, Arial; background:linear-gradient(180deg,var(--bg), #dff1df);
      color:var(--green-700);
    }

    .container{
      max-width:1200px; margin:36px auto; padding:28px;
    }

    h1{
      text-align:center; font-size:32px; margin:4px 0 22px; font-weight:700;
    }

    .grid{
      display:grid; grid-template-columns: 1fr 360px; gap:22px;
      align-items:start;
    }

    .card{
      background:var(--card);
      border-radius:var(--radius);
      padding:20px;
      box-shadow: 0 10px 30px rgba(31,111,63,0.08);
    }

    /* Form */
    .form-row{display:flex; gap:12px; margin-bottom:12px; align-items:center;}
    .form-col{flex:1}
    label{display:block; font-weight:600; margin-bottom:6px; color:var(--green-700)}
    input[type="text"], input[type="number"], select{
      width:100%; padding:10px 12px; border-radius:10px; border:1px solid rgba(0,0,0,0.06);
      background:white; font-size:14px;
    }

    .btn{
      padding:12px 14px; border-radius:10px; border:0; cursor:pointer; font-weight:700; color:white;
      box-shadow:0 8px 18px rgba(52,168,83,0.12);
    }
    .btn-add{ background:var(--green-500); }
    .btn-reset{ background:var(--danger); box-shadow:none; margin-left:8px; }

    /* health card */
    .health{
      text-align:center; padding:18px; border-radius:12px; background:linear-gradient(180deg,#f6fff6,#e8f9e8);
    }
    .health-score{ font-size:56px; font-weight:800; color:var(--green-700); line-height:1; }
    .health-status{ font-size:18px; font-weight:700; margin-top:6px; color:var(--green-700) }
    .recommend{ margin-top:10px; color:var(--muted); font-size:14px }

    /* table */
    .table-wrap{ margin-top:18px; overflow:auto; }
    table{ width:100%; border-collapse:collapse; font-size:14px; }
    th,td{ padding:12px 10px; text-align:left; border-bottom:1px solid #eee }
    thead th{ background:var(--green-500); color:white; font-weight:700; border-radius:0; }
    .badge{ display:inline-block; padding:6px 10px; border-radius:10px; font-weight:700; color:#083214; }
    .badge-normal{ background:#d9f0d9; }
    .badge-low{ background:#fff0c2; }
    .badge-high{ background:#cfead4; }

    /* right column boxes */
    .small-card{ padding:14px; margin-bottom:14px; border-radius:10px; background: #ffffff; box-shadow:0 4px 18px rgba(31,111,63,0.04) }
    .queue li{ margin:8px 0; list-style: none; display:flex; gap:8px; align-items:center; color:var(--green-700)}

    /* responsive */
    @media(max-width:980px){
      .grid{ grid-template-columns: 1fr; }
    }
  </style>
  
</head>
<body>
<div class="container">

  <h1>🌱 PHydroponic Tracker 🌱</h1>

  <div class="grid">
    <!-- LEFT -->
    <div>
      <div class="card">
        <h2>Input Monitoring</h2>

        <div style="display:flex; gap:12px; margin-bottom:12px;">
          <div style="flex:1">
            <label>Jenis Tanaman</label>
                <select id="plantType" name="jenis_tanaman" style="padding:10px; width:250px; border-radius:8px; border:2px solid #B7E4C7;">
                <option value="" disabled selected hidden>Pilih Jenis Tanaman</option>
                <option value="Buah">Buah</option>
                <option value="Sayuran">Sayuran</option>
            </select>
          </div>

          <div style="width: 140px; padding: 0 24px; margin-bottom: 12px; ">
            <label>Usia (hari)</label>
            <input id="age" type="number" value="7" style="border:2px solid #B7E4C7;" />
          </div>
        </div>
       
         <div style="display:flex; gap:12px; margin-bottom:20px;">
            <div style="width: 755px;">
                <label>Nama Tanaman</label>
                <input id="plantName" type="text" placeholder="Masukkan Nama Tanaman" style="border:2px solid #B7E4C7;"/>
            </div>
        </div>

        <style>
        .form-row {
            display: flex;
            gap: 30px; 
            margin-top: 12px;
            align-items: flex-start;
        }

        .form-row label {
            font-weight: 600;
            margin-bottom: 4px;
            display: block;
        }

        .form-row input,
        .form-row select {
            width: 100%;
            padding: 8px 10px;
            border: 1px solid #bcecb0ff;
            border-radius: 6px;
        }
        </style>

        <div class="form-row">
        <div style="width:140px;">
            <label>pH Air</label>
            <input id="ph" type="number" step="0.1" value="6.0" />
        </div>

        <div style="width:140px;">
            <label>Suhu (°C)</label>
            <input id="temp" type="number" step="0.1" value="23" />
        </div>

        <div style="width:160px;">
            <label>Nutrisi</label>
            <select id="nutr">
            <option value="Normal">Normal</option>
            <option value="Low">Rendah</option>
            <option value="High">Tinggi</option>
            </select>
        </div>
        </div>

          <div style="margin-top:14px; display:flex; align-items:center;">
          <button class="btn btn-add" id="addBtn">Tambah Data</button>
          <button class="btn btn-reset" id="resetBtn">Reset</button>
        </div>
      </div>

        <!-- history -->
        <div class="card table-wrap" style="margin-top:18px;">
          <h2 style="margin-top:0">Riwayat Pemantauan</h2>
          <table aria-live="polite">
            <thead>
              <tr>
                <th>No.</th>
                <th>Tanaman</th>
                <th>pH</th>
                <th>Suhu (°C)</th>
                <th>Nutrisi</th>
                <th>Kondisi</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody id="historyBody"></tbody>
          </table>
        </div>
      </div>

      <!-- RIGHT -->
      <aside>
        <div class="small-card health">
          <div>
            <div style="font-size:13px; color:var(--muted)">Kesehatan Saat Ini</div>
            <div class="health-score" id="score">—</div>
            <div class="health-status" id="statusText">—</div>
            <div class="recommend" id="recommend">Masukkan data untuk melihat saran</div>
          </div>
        </div>

        <div class="small-card">
          <h3 style="margin-top:0">Antrian Pemeliharaan</h3>
          <ul class="queue" id="queueList"></ul>
          <button id="processBtn" class="btn btn-add" style="width:100%; margin-top:10px;">Process Next</button>
        </div>
      </aside>
    </div>
  </div>

<script>
/* ==== STORAGE ==== */
const STORAGE_KEY = 'hydro_demo_v1';
function loadData(){ try{ return JSON.parse(localStorage.getItem(STORAGE_KEY) || '[]') }catch(e){ return [] } }
function saveData(d){ localStorage.setItem(STORAGE_KEY, JSON.stringify(d)) }

let data = loadData();

/* ==== DOM ==== */
const plantType = document.getElementById('plantType');
const plantName = document.getElementById('plantName');
const ageInput = document.getElementById('age');
const phInput = document.getElementById('ph');
const tempInput = document.getElementById('temp');
const nutrInput = document.getElementById('nutr');
const addBtn = document.getElementById('addBtn');
const resetBtn = document.getElementById('resetBtn');
const historyBody = document.getElementById('historyBody');
const scoreEl = document.getElementById('score');
const statusText = document.getElementById('statusText');
const recommend = document.getElementById('recommend');
const queueList = document.getElementById('queueList');
const processBtn = document.getElementById('processBtn');

/* ==== HEALTH LOGIC ==== */
function evaluateReading(r){
  let score = 0;

  // pH — 40 poin
  const ph = parseFloat(r.ph);
  if(ph >= 5.5 && ph <= 6.5) score += 40;
  else if((ph >= 5.0 && ph < 5.5) || (ph > 6.5 && ph <= 7.0)) score += 25;
  else score += 5;

  // suhu — 40 poin
  let idealLow = 20, idealHigh = 26;
  if(r.plantType === 'Lettuce'){ idealLow = 18; idealHigh = 24; }
  const t = parseFloat(r.temp);
  if(t >= idealLow && t <= idealHigh) score += 40;
  else if(t >= idealLow-3 && t <= idealHigh+3) score += 25;
  else score += 5;

  // nutrisi — 20 poin
  if(r.nutr === 'Normal') score += 20;
  else score += 8;

  return Math.min(100, Math.round(score));
}

function statusFromScore(s){
  if(s >= 80) return {text:'Sehat', color:'#1f6f3f', rec:'Kondisi baik. Pertahankan jadwal nutrisi.'};
  if(s >= 60) return {text:'Cukup', color:'#e0a800', rec:'Perlu sedikit penyesuaian pH/nutrisi.'};
  return {text:'Perlu Tindakan', color:'#c23616', rec:'Periksa pH, nutrisi & aerasi segera.'};
}

/* ==== ANALISIS MASALAH ==== */
function getIssueReason(r) {
  let issues = [];

  // pH
  const ph = parseFloat(r.ph);
  if (ph < 5.5) issues.push("pH terlalu rendah");
  else if (ph > 6.5) issues.push("pH terlalu tinggi");

  // suhu
  const temp = parseFloat(r.temp);
  let idealLow = 20, idealHigh = 26;
  if(r.plantType === 'Lettuce'){ idealLow = 18; idealHigh = 24; }

  if (temp < idealLow) issues.push("Suhu terlalu rendah");
  else if (temp > idealHigh) issues.push("Suhu terlalu tinggi");

  // nutrisi
  if (r.nutr === "Low") issues.push("Nutrisi rendah");
  if (r.nutr === "High") issues.push("Nutrisi terlalu tinggi");

  if (issues.length === 0) issues.push("Butuh pemeriksaan umum");

  return issues.join(", ");
}

/* ==== RENDER TABLE ==== */
function renderTable(){
  historyBody.innerHTML = '';
  data.forEach((r,i)=>{
    historyBody.innerHTML += `
      <tr>
        <td>${i+1}</td>
        <td>${r.plantName || r.plantType}</td>
        <td>${r.ph}</td>
        <td>${r.temp}</td>
        <td>
          <span class="badge ${r.nutr==='Normal'?'badge-normal':(r.nutr==='Low'?'badge-low':'badge-high')}">
            ${r.nutr}
          </span>
        </td>
        <td>${statusFromScore(r.score).text}</td>

        <td>
          <button onclick="hapusData(${i})" 
            style="background:var(--danger); color:white; padding:6px 12px; border:0; border-radius:8px; cursor:pointer;">
            Hapus
          </button>
        </td>
      </tr>
    `;
  });

  updateQueue();
  updateHealthCard();
}

/* ==== FUNGSI HAPUS ==== */
function hapusData(index){
  if(confirm("Hapus data ini?")){
    data.splice(index, 1);
    saveData(data);
    renderTable();
  }
}

/* ==== HEALTH CARD ==== */
function updateHealthCard(){
  if(data.length === 0){
    scoreEl.textContent = '—';
    statusText.textContent = 'Belum ada data';
    recommend.textContent = 'Masukkan data untuk melihat saran.';
    return;
  }
  const last = data[data.length-1];
  scoreEl.textContent = last.score;
  const s = statusFromScore(last.score);
  statusText.textContent = s.text;
  recommend.textContent = s.rec;
  scoreEl.style.color = s.color;
}

/* ==== QUEUE DENGAN ANALISIS MASALAH ==== */
function updateQueue(){
  queueList.innerHTML = '';
  const pending = data.filter(d => d.score < 60);

  if(pending.length === 0){
    queueList.innerHTML = '<li style="color:var(--muted)">Tidak ada tugas mendesak</li>';
    return;
  }

  pending.forEach(p=>{
    const li = document.createElement('li');
    const reason = getIssueReason(p);

    li.innerHTML = `
      <span style="width:10px;height:10px;border-radius:50%;background:var(--green-500);display:inline-block"></span>
      <strong>${p.plantName || p.plantType}</strong> — ${reason}
    `;
    queueList.appendChild(li);
  });
}

/* ==== BUTTON ACTIONS ==== */
addBtn.addEventListener('click', ()=>{
  const r = {
    plantType: plantType.value,
    plantName: plantName.value.trim(),
    age: parseInt(ageInput.value||0),
    ph: parseFloat(phInput.value),
    temp: parseFloat(tempInput.value),
    nutr: nutrInput.value,
    ts: new Date().toISOString()
  };

  r.score = evaluateReading(r);
  data.push(r);
  saveData(data);

  plantName.value = '';
  renderTable();
});

resetBtn.addEventListener('click', ()=>{
  if(confirm('Reset semua data riwayat?')){
    data = [];
    saveData(data);
    renderTable();
  }
});

processBtn.addEventListener('click', ()=>{
  const idx = data.findIndex(d => d.score < 60);
  if(idx === -1){
    alert('Tidak ada tugas mendesak');
    return;
  }
  const done = data.splice(idx,1)[0];
  saveData(data);
  renderTable();
  alert(`Task processed: ${done.plantName || done.plantType}`);
});

/* INIT */
renderTable();
</script>