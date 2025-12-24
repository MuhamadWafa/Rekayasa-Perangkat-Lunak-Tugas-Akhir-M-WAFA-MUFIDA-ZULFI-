<?php
include 'config/koneksi.php'; 
session_start();

// Proteksi: Hanya user yang sudah login bisa melihat riwayat
if (!isset($_SESSION['user'])) { 
    header("Location: index.php"); 
    exit(); 
}

$username = $_SESSION['user'];

// Query untuk mengambil data riwayat tuning digabung dengan nama instrumen
$query = mysqli_query($conn, "SELECT r.*, i.nama_instrumen 
                              FROM riwayat_tuning r
                              JOIN instrumen i ON r.id_instrumen = i.id_instrumen
                              JOIN users u ON r.id_user = u.id_user
                              WHERE u.username = '$username'
                              ORDER BY r.waktu_tuning DESC");

include 'includes/header.php'; 
?>

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Riwayat Tuning Anda</h2>
        <a href="dashboard.php" class="btn btn-outline-light btn-sm">Kembali</a>
    </div>

    <div class="card bg-dark border-secondary shadow">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-dark table-hover mb-0">
                    <thead>
                        <tr class="border-secondary">
                            <th>Tanggal & Waktu</th>
                            <th>Alat Musik</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        if (mysqli_num_rows($query) > 0) {
                            while($row = mysqli_fetch_assoc($query)): 
                                $status = $row['status_tuning'];
                                $badgeColor = ($status == 'Berhasil') ? 'success' : 'danger';
                        ?>
                        <tr class="border-secondary">
                            <td><?php echo date('d M Y, H:i', strtotime($row['waktu_tuning'])); ?></td>
                            <td><?php echo $row['nama_instrumen']; ?></td>
                            <td>
                                <span class="badge bg-<?php echo $badgeColor; ?>">
                                    <?php echo $status; ?>
                                </span>
                            </td>
                        </tr>
                        <?php 
                            endwhile; 
                        } else {
                            echo "<tr><td colspan='3' class='text-center py-4 text-muted'>Belum ada riwayat tuning.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>