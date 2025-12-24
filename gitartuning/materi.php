<?php
// Perbaikan path koneksi
include 'config/koneksi.php'; 

session_start();
// Proteksi halaman
if (!isset($_SESSION['user'])) { 
    header("Location: index.php"); 
    exit(); 
}

// Ambil filter tingkat jika ada (Pemula/Menengah/Mahir)
$filter = isset($_GET['tingkat']) ? $_GET['tingkat'] : '';
$where = $filter ? "WHERE tingkat = '$filter'" : "";

// Query ambil data materi gabung dengan nama instrumen
$query = mysqli_query($conn, "SELECT materi.*, instrumen.nama_instrumen 
                              FROM materi 
                              JOIN instrumen ON materi.id_instrumen = instrumen.id_instrumen 
                              $where 
                              ORDER BY tingkat ASC");

include 'includes/header.php'; 
?>

<div class="container">
    <div class="row mb-4">
        <div class="col-md-8">
            <h2>Materi Pembelajaran</h2>
            <p class="text-muted">Tingkatkan keahlian bermusik Anda dari dasar hingga mahir.</p>
        </div>
        <div class="col-md-4 text-md-end">
            <div class="btn-group" role="group">
                <a href="materi.php" class="btn btn-outline-dark btn-sm <?php echo !$filter ? 'active' : ''; ?>">Semua</a>
                <a href="materi.php?tingkat=Pemula" class="btn btn-outline-success btn-sm <?php echo $filter == 'Pemula' ? 'active' : ''; ?>">Pemula</a>
                <a href="materi.php?tingkat=Menengah" class="btn btn-outline-warning btn-sm <?php echo $filter == 'Menengah' ? 'active' : ''; ?>">Menengah</a>
                <a href="materi.php?tingkat=Mahir" class="btn btn-outline-danger btn-sm <?php echo $filter == 'Mahir' ? 'active' : ''; ?>">Mahir</a>
            </div>
        </div>
    </div>

    <div class="row">
        <?php 
        if (mysqli_num_rows($query) > 0) {
            while($m = mysqli_fetch_assoc($query)): 
                // Tentukan warna badge berdasarkan tingkat
                $badgeColor = ($m['tingkat'] == 'Pemula') ? 'success' : (($m['tingkat'] == 'Menengah') ? 'warning text-dark' : 'danger');
        ?>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <span class="badge bg-<?php echo $badgeColor; ?>"><?php echo $m['tingkat']; ?></span>
                            <small class="text-primary fw-bold"><?php echo $m['nama_instrumen']; ?></small>
                        </div>
                        <h5 class="card-title fw-bold"><?php echo $m['judul_materi']; ?></h5>
                        <p class="card-text text-muted small">
                            <?php echo substr($m['isi_materi'], 0, 120); ?>...
                        </p>
                    </div>
                    <div class="card-footer bg-transparent border-0 pb-3">
                        <button class="btn btn-sm btn-primary w-100">Pelajari Sekarang</button>
                    </div>
                </div>
            </div>
        <?php 
            endwhile; 
        } else {
            echo "<div class='col-12'><div class='alert alert-info text-center'>Belum ada materi untuk kategori ini.</div></div>";
        }
        ?>
    </div>
    
   <div class="card-footer bg-transparent border-0 pb-3">
    <a href="view_materi.php?id=<?php echo $m['id_materi']; ?>" class="btn btn-sm btn-primary w-100">
        Pelajari Sekarang
    </a>
</div>

<?php include 'includes/footer.php'; ?>