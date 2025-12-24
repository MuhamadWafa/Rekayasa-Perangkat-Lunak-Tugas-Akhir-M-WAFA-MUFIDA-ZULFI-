<?php
include 'config/koneksi.php'; 
session_start();
if (!isset($_SESSION['user'])) { header("Location: index.php"); exit(); }

$id_ins = isset($_GET['id']) ? $_GET['id'] : 1;
$res_ins = mysqli_query($conn, "SELECT * FROM instrumen WHERE id_instrumen = '$id_ins'");
$ins = mysqli_fetch_assoc($res_ins);

include 'includes/header.php'; 
?>

<style>
    /* Tuner Area Styling */
    .tuner-card {
        background: radial-gradient(circle, #2c2c2c 0%, #121212 100%);
        border-radius: 30px;
        padding: 40px;
        box-shadow: 0 20px 50px rgba(0,0,0,0.5);
        border: 1px solid #333;
        margin-top: 20px;
    }

    /* Scale & Needle */
    .scale-container {
        position: relative;
        width: 100%;
        height: 150px;
        overflow: hidden;
        border-bottom: 2px solid #333;
    }

    .scale-line {
        position: absolute;
        bottom: 0;
        left: 50%;
        width: 2px;
        height: 20px;
        background: #555;
        transform: translateX(-50%);
    }

    #needle {
        position: absolute;
        bottom: 0;
        left: 50%;
        width: 4px;
        height: 100px;
        background: #ff4444;
        transform-origin: bottom center;
        transform: translateX(-50%) rotate(0deg);
        transition: transform 0.1s ease-out, background 0.3s;
        z-index: 10;
        box-shadow: 0 0 10px rgba(255, 68, 68, 0.5);
    }

    .center-mark {
        position: absolute;
        bottom: 0;
        left: 50%;
        width: 4px;
        height: 40px;
        background: #00ff00;
        transform: translateX(-50%);
        z-index: 5;
        box-shadow: 0 0 15px rgba(0, 255, 0, 0.6);
    }

    /* Note Display */
    .note-circle {
        width: 120px;
        height: 120px;
        border: 5px solid #00ff00;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 30px auto;
        background: rgba(0, 255, 0, 0.05);
        transition: all 0.3s;
    }

    #note-name {
        font-size: 4rem;
        font-weight: 800;
        color: #00ff00;
        text-shadow: 0 0 20px rgba(0, 255, 0, 0.4);
    }

    .status-text {
        font-weight: bold;
        letter-spacing: 2px;
        text-transform: uppercase;
    }
</style>

<div class="container text-center py-4">
    <h4 class="text-muted mb-3">Tuning <?php echo $ins['nama_instrumen']; ?></h4>
    
    <div id="step-izin" class="py-5">
        <div class="note-circle" style="border-color: #555;">
            <span id="note-name" style="color: #555;">?</span>
        </div>
        <button onclick="initTuner()" class="btn btn-success btn-lg rounded-pill px-5 shadow">
            MULAI TUNING
        </button>
        <p class="mt-3 text-muted small">Izinkan akses mikrofon untuk mendeteksi nada</p>
    </div>

    <div id="tuner-ui" style="display:none;">
        <div class="tuner-card">
            <div class="scale-container">
                <div class="center-mark"></div>
                <div id="needle"></div>
                <script>
                    for(let i = -10; i <= 10; i++) {
                        if(i === 0) continue;
                        document.write(`<div class="scale-line" style="margin-left: ${i * 4}%; height: ${Math.abs(i)%5===0 ? '30px' : '15px'}"></div>`);
                    }
                </script>
            </div>

            <div class="note-circle" id="visual-note-circle">
                <span id="note-name-active">--</span>
            </div>

            <div id="status-message" class="status-text text-muted">Petik Senar...</div>
            <div id="freq-val" class="mt-2 small text-secondary">0.00 Hz</div>
        </div>

        <div class="mt-5 d-flex justify-content-center gap-3">
            <a href="dashboard.php" class="btn btn-outline-secondary rounded-pill px-4">Batal</a>
            <form method="POST" action="dashboard.php">
                <button type="submit" class="btn btn-primary rounded-pill px-4">Simpan Hasil</button>
            </form>
        </div>
    </div>
</div>

<script>
// Logika Audio tetap menggunakan algoritma Pitch Detection dari sebelumnya
// Namun dengan penyesuaian UI yang lebih responsif
let audioContext;
let analyser;
let buffer;

async function initTuner() {
    try {
        const stream = await navigator.mediaDevices.getUserMedia({ audio: true });
        document.getElementById('step-izin').style.display = 'none';
        document.getElementById('tuner-ui').style.display = 'block';
        
        audioContext = new (window.AudioContext || window.webkitAudioContext)();
        const source = audioContext.createMediaStreamSource(stream);
        analyser = audioContext.createAnalyser();
        analyser.fftSize = 2048;
        source.connect(analyser);
        
        buffer = new Float32Array(analyser.fftSize);
        updatePitch();
    } catch (err) {
        alert("Microphone tidak diizinkan.");
    }
}

function updatePitch() {
    analyser.getFloatTimeDomainData(buffer);
    const pitch = autoCorrelate(buffer, audioContext.sampleRate);
    
    const needle = document.getElementById('needle');
    const noteDisplay = document.getElementById('note-name-active');
    const statusMsg = document.getElementById('status-message');
    const circle = document.getElementById('visual-note-circle');

    if (pitch !== -1) {
        const note = getNoteFromFrequency(pitch);
        noteDisplay.innerText = note.name;
        document.getElementById('freq-val').innerText = pitch.toFixed(2) + " Hz";
        
        // Hitung pergerakan jarum (maksimal miring 45 derajat)
        let diff = note.diff * 5;
        if(diff > 45) diff = 45;
        if(diff < -45) diff = -45;
        
        needle.style.transform = `translateX(-50%) rotate(${diff}deg)`;
        
        // Logika "Tuning Berhasil"
        if (Math.abs(note.diff) < 1.5) {
            statusMsg.innerText = "PAS!";
            statusMsg.className = "status-text text-success";
            needle.style.background = "#00ff00";
            circle.style.borderColor = "#00ff00";
            noteDisplay.style.color = "#00ff00";
        } else {
            statusMsg.innerText = note.diff > 0 ? "TERLALU TINGGI (Sharp)" : "TERLALU RENDAH (Flat)";
            statusMsg.className = "status-text text-danger";
            needle.style.background = "#ff4444";
            circle.style.borderColor = "#ff4444";
            noteDisplay.style.color = "#ff4444";
        }
    }
    
    requestAnimationFrame(updatePitch);
}

// (Gunakan fungsi autoCorrelate dan getNoteFromFrequency dari kode sebelumnya)
function autoCorrelate(buf, sampleRate) {
    let size = buf.length;
    let rms = 0;
    for (let i = 0; i < size; i++) {
        const val = buf[i];
        rms += val * val;
    }
    if (Math.sqrt(rms / size) < 0.01) return -1;

    let r1 = 0, r2 = size - 1, thres = 0.2;
    for (let i = 0; i < size / 2; i++) {
        if (Math.abs(buf[i]) < thres) { r1 = i; break; }
    }
    for (let i = 1; i < size / 2; i++) {
        if (Math.abs(buf[size - i]) < thres) { r2 = size - i; break; }
    }

    buf = buf.slice(r1, r2);
    size = buf.length;

    let c = new Array(size).fill(0);
    for (let i = 0; i < size; i++) {
        for (let j = 0; j < size - i; j++) {
            c[i] = c[i] + buf[j] * buf[j + i];
        }
    }

    let d = 0; while (c[d] > c[d + 1]) d++;
    let maxval = -1, maxpos = -1;
    for (let i = d; i < size; i++) {
        if (c[i] > maxval) { maxval = c[i]; maxpos = i; }
    }

    return sampleRate / maxpos;
}

function getNoteFromFrequency(freq) {
    const notes = ["C", "C#", "D", "D#", "E", "F", "F#", "G", "G#", "A", "A#", "B"];
    const j = Math.round(12 * (Math.log(freq / 440) / Math.log(2)));
    const noteIndex = (j + 69) % 12;
    const standardFreq = 440 * Math.pow(2, j / 12);
    return {
        name: notes[noteIndex],
        diff: freq - standardFreq
    };
}
</script>

<?php include 'includes/footer.php'; ?>