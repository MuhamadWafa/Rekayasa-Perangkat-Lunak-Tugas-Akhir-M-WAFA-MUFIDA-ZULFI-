<?php
session_start();
// Menghapus semua session
session_unset();
session_destroy();

// Alihkan ke halaman login
header("Location: index.php");
exit();
?>