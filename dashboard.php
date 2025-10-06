<?php
session_start();

// Cek login
if (!isset($_SESSION["username"])) {
    header("Location: login.php?status=unauthorized");
    exit;
}

$username = $_SESSION["username"];
$status = isset($_GET['status']) ? $_GET['status'] : '';

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | ElectroReuse</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- ===== HEADER ===== -->
<header>
    <nav>
        <div>
            <h1>ElectroReuse</h1>
            <p>Platform Jual Beli Elektronik Bekas</p>
        </div>
        <div>
            <a href="index.php" class="btn btn-primary">Home</a>
            <a href="logout.php" class="btn btn-primary">Logout</a>
            <button id="toggle-dark" class="btn btn-secondary">Dark Mode</button>
        </div>
    </nav>
</header>

<!-- ===== MAIN CONTENT ===== -->
<main class="dashboard-container">
    <?php if ($status === "already_logged_in"): ?>
        <div class="alert alert-warning">Anda sudah login sebagai <b><?= htmlspecialchars($username) ?></b>.</div>
    <?php elseif ($status === "login_success"): ?>
        <div class="alert alert-success">Anda berhasil login sebagai <b><?= htmlspecialchars($username) ?></b>!</div>
    <?php elseif ($status === "unauthorized"): ?>
        <div class="alert alert-danger">Silakan login terlebih dahulu.</div>
    <?php else: ?>
        <div class="alert alert-success">Selamat datang, <b><?= htmlspecialchars($username) ?></b>!</div>
    <?php endif; ?>


    <h2>Dashboard ElectroReuse</h2>
    
    <!-- Tentang Platform -->
    <section class="dashboard-info">
        <h3>Tentang ElectroReuse</h3>
        <p><b>ElectroReuse</b> adalah platform jual beli elektronik bekas yang menghubungkan penjual dan pembeli 
            secara aman dan terpercaya. Melalui dashboard ini, dapat memantau produk dan pesanan untuk menjaga kelancaran transaksi serta memastikan kualitas layanan.
        </p>
    </section>

    <!-- Statistik Ringkas -->
    <section class="dashboard-stats">
        <div class="stat-box">
            <h2 class="stat-number">128</h2>
            <p class="stat-label">Produk Terdaftar</p>
        </div>

        <div class="stat-box">
            <h2 class="stat-number">76</h2>
            <p class="stat-label">Pesanan Baru</p>
        </div>

        <div class="stat-box">
            <h2 class="stat-number">210</h2>
            <p class="stat-label">Pengguna Aktif</p>
        </div>
    </section>

    <!-- Menu Utama -->
    <section class="dashboard-features">
        <div class="dashboard-card" id="produk">
            <h3>Manajemen Produk</h3>
            <p>Kelola barang elektronik bekas yang dijual, tambah, ubah dan hapus produk.</p>
            <a href="#" class="btn btn-secondary btn-fitur">Kelola Produk</a>
        </div>

        <div class="dashboard-card" id="pesanan">
            <h3>Manajemen Pesanan</h3>
            <p>Pantau transaksi pelanggan, proses pesanan, dan kelola status pengiriman secara efisien.</p>
            <a href="#" class="btn btn-secondary btn-fitur">Kelola Pesanan</a>
        </div>

        <div class="dashboard-card" id="lainnya">
            <h3>Fitur Tambahan</h3>
            <p>Akses laporan penjualan, pengaturan akun, dan pusat bantuan.</p>
            <a href="#" class="btn btn-secondary btn-fitur">Buka Fitur</a>
        </div>
    </section>
</main>

<!-- ===== FOOTER ===== -->
<footer>
    <p>&copy; 2025 ElectroReuse | All Rights Reserved</p>
</footer>

<!-- Load External JavaScript -->
<script src="script.js"></script>
</body>
</html>
