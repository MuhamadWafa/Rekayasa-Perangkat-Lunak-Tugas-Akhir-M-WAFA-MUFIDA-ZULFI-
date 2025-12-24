<!DOCTYPE html>
<html lang="id">
<head>
    ...
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="assets/css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPIT - Gitar Tuning</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .navbar-brand { font-weight: bold; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="dashboard.php">🎸 UPIT TUNING</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="dashboard.php">Pilih Alat</a></li>
                    <li class="nav-item"><a class="nav-link" href="materi.php">Materi</a></li>
                    <li class="nav-item"><a class="nav-link" href="lagu.php">Daftar Lagu</a></li>
                    <li class="nav-item"><a class="btn btn-danger btn-sm ms-lg-3" href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container py-4">
        <li class="nav-item">
    <a class="nav-link" href="riwayat.php">Riwayat</a>
</li>