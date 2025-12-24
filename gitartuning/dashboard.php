<?php
include 'config/koneksi.php'; 
session_start();

if (!isset($_SESSION['user'])) { 
    header("Location: index.php"); 
    exit(); 
}

$query_instrumen = mysqli_query($conn, "SELECT * FROM instrumen");
include 'includes/header.php'; 
?>

<style>
    body { background-color: #ffffff !important; color: #333 !important; }
    .navbar { background-color: #f8f9fa !important; border-bottom: 1px solid #dee2e6; }
    .navbar-brand, .nav-link { color: #333 !important; }
    .card-instrumen {
        border: 1px solid #e0e0e0;
        border-radius: 15px;
        transition: all 0.3s ease;
        background: #ffffff;
    }
    .card-instrumen:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        border-color: #0d6efd;
    }
    .icon-box {
        font-size: 3rem;
        margin-bottom: 15px;
        color: #0d6efd;
    }
</style>

<div class="container py-5">
    <div class="row mb-5 text-center">
        <div class="col-lg-8 mx-auto">
            <h1 class="fw-bold">Halo, <?php echo $_SESSION['user']; ?>! 👋</h1>
            <p class="text-muted">Selamat datang di UPIT Tuning. Pilih alat musik yang ingin Anda gunakan hari ini sesuai dengan instruksi aplikasi.</p>
        </div>
    </div>

    <div class="row justify-content-center g-4">
        <?php while($row = mysqli_fetch_assoc($query_instrumen)): ?>
        <div class="col-md-4">
            <div class="card card-instrumen h-100 p-4 text-center">
                <div class="card-body">
                    <div class="icon-box">
                        <?php 
                        // Ikon dinamis berdasarkan nama instrumen di database
                        if($row['nama_instrumen'] == 'Gitar') echo "🎸";
                        elseif($row['nama_instrumen'] == 'Bass') echo "🎻";
                        else echo "🪕";
                        ?>
                    </div>
                    <h3 class="fw-bold mb-2"><?php echo $row['nama_instrumen']; ?></h3>
                    <p class="text-muted small mb-4">Mendukung tuning standar <?php echo $row['jumlah_senar']; ?> senar.</p>
                    
                    <div class="d-grid gap-2">
                        <a href="tuning.php?id=<?php echo $row['id_instrumen']; ?>" class="btn btn-primary rounded-pill fw-bold">
                            Mulai Tuning
                        </a>
                        <a href="materi.php?tingkat=Pemula" class="btn btn-outline-secondary rounded-pill btn-sm">
                            Materi Pembelajaran
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>

    <div class="row mt-5 pt-5 border-top">
        <div class="col-md-4 text-center">
            <a href="lagu.php" class="text-decoration-none text-dark">
                <h5>🎵 Chord Lagu</h5>
                <small class="text-muted">Kumpulan lagu Indonesia</small>
            </a>
        </div>
        <div class="col-md-4 text-center border-start border-end">
            <a href="riwayat.php" class="text-decoration-none text-dark">
                <h5>history Riwayat</h5>
                <small class="text-muted">Lihat hasil tuning sebelumnya</small>
            </a>
        </div>
        <div class="col-md-4 text-center">
            <a href="#" class="text-decoration-none text-dark">
                <h5>💡 Tips & Trik</h5>
                <small class="text-muted">Cara merawat instrumen</small>
            </a>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>