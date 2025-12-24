<?php
// Perbaikan path koneksi sesuai struktur folder config
include 'config/koneksi.php'; 

session_start();
// Proteksi halaman: User harus login untuk melihat daftar lagu
if (!isset($_SESSION['user'])) { 
    header("Location: index.php"); 
    exit(); 
}

// Ambil data lagu dari database
$songs = mysqli_query($conn, "SELECT * FROM lagu ORDER BY judul_lagu ASC");

include 'includes/header.php'; 
?>

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Daftar Chord Lagu Indonesia</h2>
        <span class="badge bg-primary"><?php echo mysqli_num_rows($songs); ?> Lagu Tersedia</span>
    </div>

    <div class="table-responsive card shadow-sm p-3">
        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Judul Lagu</th>
                    <th>Penyanyi</th>
                    <th>Tingkat</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if (mysqli_num_rows($songs) > 0) {
                    while($s = mysqli_fetch_assoc($songs)): 
                ?>
                <tr>
                    <td class="fw-bold"><?php echo $s['judul_lagu']; ?></td>
                    <td><?php echo $s['penyanyi']; ?></td>
                    <td>
                        <?php 
                        $warna = ($s['tingkat_kesulitan'] == 'Pemula') ? 'success' : (($s['tingkat_kesulitan'] == 'Menengah') ? 'warning text-dark' : 'danger');
                        ?>
                        <span class="badge bg-<?php echo $warna; ?>"><?php echo $s['tingkat_kesulitan']; ?></span>
                    </td>
                    <td class="text-center">
    <a href="view_chord.php?id=<?php echo $s['id_lagu']; ?>" class="btn btn-sm btn-outline-primary px-3">
        Lihat Chord
    </a>
</td>
                </tr>
                <?php 
                    endwhile; 
                } else {
                    echo "<tr><td colspan='4' class='text-center'>Belum ada lagu. Silakan masukkan data SQL di bawah.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="mt-3">
        <a href="dashboard.php" class="btn btn-secondary">Kembali ke Menu Utama</a>
    </div>
</div>

<?php include 'includes/footer.php'; ?>