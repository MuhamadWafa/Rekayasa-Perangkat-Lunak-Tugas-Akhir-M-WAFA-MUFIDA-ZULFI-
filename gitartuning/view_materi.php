<?php
include 'config/koneksi.php'; 
session_start();

// Cek login sesuai alur Flowchart
if (!isset($_SESSION['user'])) { 
    header("Location: index.php"); 
    exit(); 
}

// Ambil ID materi dari URL
$id_materi = isset($_GET['id']) ? $_GET['id'] : 0;

// Query gabungan untuk mengambil materi dan nama instrumennya
$query = mysqli_query($conn, "SELECT materi.*, instrumen.nama_instrumen 
                              FROM materi 
                              JOIN instrumen ON materi.id_instrumen = instrumen.id_instrumen 
                              WHERE materi.id_materi = '$id_materi'");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    echo "<script>alert('Materi tidak ditemukan!'); window.location='materi.php';</script>";
    exit();
}

include 'includes/header.php'; 
?>

<style>
    body { background-color: #ffffff !important; color: #333; }
    .content-box {
        background: #fff;
        border-radius: 15px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        padding: 40px;
        margin-top: 30px;
    }
    .materi-text {
        font-size: 1.1rem;
        line-height: 1.8;
        white-space: pre-wrap; /* Agar format teks tetap rapi */
    }
    .badge-tingkat {
        padding: 8px 16px;
        border-radius: 20px;
        font-weight: 600;
    }
</style>

<div class="container py-5">
    <div class="row">
        <div class="col-lg-9 mx-auto">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="materi.php">Materi</a></li>
                    <li class="breadcrumb-item active"><?php echo $data['nama_instrumen']; ?></li>
                </ol>
            </nav>

            <div class="content-box">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <?php 
                        $color = ($data['tingkat'] == 'Pemula') ? 'success' : (($data['tingkat'] == 'Menengah') ? 'warning' : 'danger');
                    ?>
                    <span class="badge bg-<?php echo $color; ?> badge-tingkat"><?php echo $data['tingkat']; ?></span>
                    <small class="text-muted">Instrumen: <strong><?php echo $data['nama_instrumen']; ?></strong></small>
                </div>

                <h1 class="display-5 fw-bold mb-4"><?php echo $data['judul_materi']; ?></h1>
                <hr class="mb-5">

                <div class="materi-text">
                    <?php echo $data['isi_materi']; ?>
                </div>

                <div class="mt-5 pt-4 border-top">
                    <a href="materi.php" class="btn btn-outline-primary rounded-pill px-4">Kembali ke Daftar Materi</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>