<?php
include 'config/koneksi.php'; 
session_start();

if (!isset($_SESSION['user'])) { header("Location: index.php"); exit(); }

// Ambil ID lagu dari URL
$id_lagu = isset($_GET['id']) ? $_GET['id'] : 0;
$query = mysqli_query($conn, "SELECT * FROM lagu WHERE id_lagu = '$id_lagu'");
$data = mysqli_fetch_assoc($query);

if (!$data) { echo "Lagu tidak ditemukan!"; exit(); }

include 'includes/header.php'; 
?>

<style>
    .chord-box {
        background: #fdfdfd;
        border-left: 5px solid #0d6efd;
        font-family: 'Courier New', Courier, monospace;
        white-space: pre-wrap;
        font-size: 1.2rem;
        line-height: 1.6;
        padding: 25px;
        color: #333;
    }
</style>

<div class="container py-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="mb-4">
                <h1 class="fw-bold"><?php echo $data['judul_lagu']; ?></h1>
                <p class="text-muted">Penyanyi: <strong><?php echo $data['penyanyi']; ?></strong> | Tingkat: <?php echo $data['tingkat_kesulitan']; ?></p>
                <hr>
            </div>

            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="chord-box">
                        <?php echo htmlspecialchars($data['chord_content']); ?>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <a href="lagu.php" class="btn btn-secondary">Kembali ke Daftar Lagu</a>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>