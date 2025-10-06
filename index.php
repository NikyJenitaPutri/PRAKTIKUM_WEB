<?php
session_start();

// Cek apakah user sudah login
$user = isset($_SESSION['username']) ? $_SESSION['username'] : null;
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ElectroReuse - Platform Jual Beli Elektronik Bekas</title>
  <meta name="description" content="Tempat terbaik untuk jual beli elektronik bekas berkualitas dengan harga terjangkau, garansi 30 hari, dan quality check">
  <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- HEADER -->
    <header>
        <nav>
            <div>
                <h1>ElectroReuse</h1>
                <p>Platform Jual Beli Elektronik Bekas</p>
            </div>
            <ul>
                <li><a href="#beranda">Beranda</a></li>
                <li><a href="#kategori">Kategori</a></li>
                <li><a href="#testimoni">Testimoni</a></li>
                <li><a href="#kontak">Kontak</a></li>
            </ul>
            <div class="button-area"> 
                <?php if ($user): ?> 
                    <a href="login.php" class="btn btn-primary">Login</a> 
                    <a href="logout.php" class="btn btn-primary">Logout</a> 
                    <a href="dashboard.php" class="btn btn-primary">Dashboard</a> 
                    <button id="toggle-dark" class="btn btn-secondary">Dark Mode</button>
                <?php else: ?> 
                    <a href="login.php" class="btn btn-primary">Login</a> 
                    <a href="dashboard.php" class="btn btn-primary">Dashboard</a> 
                    <button id="toggle-dark" class="btn btn-secondary">Dark Mode</button>
                <?php endif; ?> 
            </div>
        </nav>
    </header>

    <!-- MAIN CONTENT -->
    <main>
        <!-- BERANDA -->
        <section id="beranda">
            <h2>Temukan Elektronik Bekas Berkualitas</h2>
            <p>Dapatkan smartphone, laptop, kamera, dan gadget bekas hingga 60% lebih murah!</p>
            <form role="search">
                <input type="search" placeholder="Cari produk elektronik..." aria-label="Cari produk elektronik">
                <select aria-label="Pilih kategori">
                    <option value="">Semua Kategori</option>
                    <option value="Elektronik Rumah Tangga">Elektronik Rumah Tangga</option>
                    <option value="Gadget & Komunikasi">Gadget & Komunikasi</option>
                    <option value="Hiburan & Audio">Hiburan & Audio</option>
                    <option value="Elektronik Dapur">Elektronik Dapur</option>
                </select>
                <button class="btn btn-secondary">Cari</button>
            </form>
        </section>

        <div class="container">
            <!-- KATEGORI -->
            <section id="kategori">
                <h2>Kategori</h2>
                <p>Pilih kategori sesuai kebutuhan</p>
                <div class="kategori-list">
                    <article class="card kategori-utama" 
                    data-sub="Televisi, Kulkas, Mesin Cuci, AC, Kipas Angin">
                    <h3>📺 Elektronik Rumah Tangga</h3>
                    </article>

                    <article class="card kategori-utama" 
                    data-sub="Smartphone, Tablet, Laptop, Smartwatch, Aksesoris">
                    <h3>📱 Gadget & Komunikasi</h3>
                    </article>

                    <article class="card kategori-utama" 
                    data-sub="Speaker, Headset, Home Theater, Microphone, Radio">
                    <h3>🎧 Hiburan & Audio</h3>
                    </article>

                    <article class="card kategori-utama" 
                    data-sub="Monitor, Keyboard, Mouse, Printer, Harddisk / SSD eksternal">
                    <h3>🖥️ Komputer & Periferal</h3>
                    </article>

                    <article class="card kategori-utama" 
                    data-sub="Blender, Rice Cooker, Microwave, Oven Listrik, Dispenser">
                    <h3>🍳 Elektronik Dapur</h3>
                    </article>
                </div>
            </section>


            <!-- PRODUK TERBARU -->
            <section id="produk-terbaru">
                <h2>Produk</h2>
                <div>
                    <!-- Produk 3 -->
                    <article class="card" data-category="Elektronik Rumah Tangga">
                        <img src="img/Samsung_Smart.jpeg" alt="Samsung Smart TV 55 inch">
                        <h3>Samsung Smart TV 55" 4K</h3>
                        <p class="detail" style="display:none;">Kondisi: 85% • Gratis Ongkir | Rp 4.800.000 | Surabaya</p>
                    </article>

                    <!-- Produk 3 -->
                    <article class="card" data-category="Elektronik Rumah Tangga">
                        <img src="img/Kulkas.jpeg" alt="Kulkas POLYTRON Side by Side 2">
                        <h3>Kulkas POLYTRON Side by Side 2</h3>
                        <p class="detail" style="display:none;">Kondisi: 80% • Quality Checked ✓ | Rp 8.600.000 | Samarinda</p>
                    </article>

                    <!-- Produk 3 -->
                    <article class="card" data-category="Elektronik Rumah Tangga">
                        <img src="img/AC.jpeg" alt="AC LG Standart New Hercules [1 PK]">
                        <h3>AC LG Standart New Hercules [1 PK]</h3>
                        <p class="detail" style="display:none;">Kondisi: 87% • Gratis Ongkir | Rp 1.800.000 | Yogyakarta</p>
                    </article>

                    <article class="card" data-category="Gadget & Komunikasi">
                        <img src="img/iPhone_12_ProMax.jpeg" alt="iPhone 12 Pro Max">
                        <h3>iPhone 12 Pro Max 128GB</h3>
                        <p class="detail" style="display:none;">Kondisi: 95% • Garansi 30 hari | Rp 8.500.000 | Jakarta Selatan</p>
                    </article>

                    <article class="card" data-category="Gadget & Komunikasi">
                        <img src="img/Laptop_Dell_XPS.jpeg" alt="Laptop Dell XPS 13">
                        <h3>Laptop Dell XPS 13 2020 - i7</h3>
                        <p class="detail" style="display:none;">Kondisi: 90% • Quality Checked ✓ | Rp 7.200.000 | Bandung</p>
                    </article>

                    <article class="card" data-category="Gadget & Komunikasi">
                        <img src="img/Smartwatch.jpeg" alt="Smartwatch Bluetooth">
                        <h3>Smartwatch Bluetooth</h3>
                        <p class="detail" style="display:none;">Kondisi: 90% • Gratis Ongkir | Rp 200.000 | Sukabumi</p>
                    </article>

                    <article class="card" data-category="Hiburan & Audio">
                        <img src="img/Speaker.jpeg" alt="Proel EX-12P - Speaker Passive">
                        <h3>Proel EX-12P - Speaker Passive</h3>
                        <p class="detail" style="display:none;">Kondisi: 70% • Gratis Ongkir | Rp 800.000 | Jakarta</p>
                    </article>

                    <article class="card" data-category="Hiburan & Audio">
                        <img src="img/Radio.jpeg" alt="Portable Radio AE1850/00 Philips">
                        <h3>Portable Radio AE1850/00 Philips</h3>
                        <p class="detail" style="display:none;">Kondisi: 80% • Gratis Ongkir | Rp 400.000 | Makasar</p>
                    </article>

                    <article class="card" data-category="Hiburan & Audio">
                        <img src="img/Mikrofon.jpeg" alt="Mikrofon Dinamis USB XLR FEELWORLD PM1 Pink">
                        <h3>Mikrofon Dinamis USB XLR FEELWORLD PM1 Pink</h3>
                        <p class="detail" style="display:none;">Kondisi: 91% • Gratis Ongkir | Rp 100.000 | Bali</p>
                    </article>

                    <article class="card" data-category="Komputer & Periferal">
                        <img src="img/Mouse.jpeg" alt="ASUS Wireless Silent Mouse MW103">
                        <h3>ASUS Wireless Silent Mouse MW103</h3>
                        <p class="detail" style="display:none;">Kondisi: 81% • Gratis Ongkir | Rp 225.000 | Bali</p>
                    </article>

                    <article class="card" data-category="Komputer & Periferal">
                        <img src="img/Keyboard.jpeg" alt="Mechanical Gaming Keyboard - HX Red">
                        <h3>Mechanical Gaming Keyboard - HX Red</h3>
                        <p class="detail" style="display:none;">Kondisi: 89% • Gratis Ongkir | Rp 750.000 | Malang</p>
                    </article>

                    <article class="card" data-category="Komputer & Periferal">
                        <img src="img/Printer.jpeg" alt="Printer Epson L3250 Multifungsi Printer Wifi">
                        <h3>Printer Epson L3250 Multifungsi Printer Wifi</h3>
                        <p class="detail" style="display:none;">Kondisi: 91% • Gratis Ongkir | Rp 1.250.000 | Bali</p>
                    </article>

                    <article class="card" data-category="Elektronik Dapur">
                        <img src="img/Blender.jpeg" alt="Moderna Black Blender">
                        <h3>Moderna Black Blender</h3>
                        <p class="detail" style="display:none;">Kondisi: 85% • Gratis Ongkir | Rp 650.000 | Solo</p>
                    </article>

                    <article class="card" data-category="Elektronik Dapur">
                        <img src="img/RiceCooker.jpeg" alt="MIYAKO - RICE COOKER MANUAL 1.8Liter ">
                        <h3>MIYAKO - RICE COOKER MANUAL 1.8Liter </h3>
                        <p class="detail" style="display:none;">Kondisi: 98% • Gratis Ongkir | Rp 475.000 | Palangkaraya</p>
                    </article>

                    <article class="card" data-category="Elektronik Dapur">
                        <img src="img/Oven.jpeg" alt="Oven Listrik M20A">
                        <h3>Oven Listrik M20A</h3>
                        <p class="detail" style="display:none;">Kondisi: 87% • Gratis Ongkir | Rp 550.000 | Palembang</p>
                    </article>

                    <!-- Tambahkan produk lain dengan format yang sama -->
                </div>
            </section>

            <!-- STATISTIK -->
            <section class="stats">
                <h2>ElectroReuse dalam Angka</h2>
                <div class="stats-container">
                    <div class="stat-box">
                        <div class="icon">📦</div>
                        <h3>50,000+</h3>
                        <p>Produk Terjual</p>
                    </div>
                    <div class="stat-box">
                        <div class="icon">👥</div>
                        <h3>25,000+</h3>
                        <p>Pengguna Aktif</p>
                    </div>
                    <div class="stat-box">
                        <div class="icon">👍</div>
                        <h3>98%</h3>
                        <p>Tingkat Kepuasan</p>
                    </div>
                    <div class="stat-box">
                        <div class="icon">⭐</div>
                        <h3>4.9/5</h3>
                        <p>Rating Platform</p>
                    </div>
                </div>
            </section>

            <!-- TESTIMONI -->
            <section id="testimoni">
                <h2>Testimoni Pengguna</h2>
                <blockquote>
                    <img src="img/Pelanggan1.jpeg" alt="Foto Davina" width="60" height="60">
                    <p>"Berhasil beli MacBook Pro 2019 dengan harga 40% lebih murah. Kondisinya seperti baru, dapat garansi 30 hari. Highly recommended!"</p>
                    <cite><strong>Davina Karamoy</strong> - Graphic Designer, Jakarta</cite>
                </blockquote>

                <blockquote>
                    <img src="img/Pelanggan2.jpeg" alt="Foto Bily" width="60" height="60">
                    <p>"Jual iPhone 11 mudah dan cepat. Harga fair, pembayaran langsung cair. Pasti pakai lagi!"</p>
                    <cite><strong>Bily Davidson</strong> - Entrepreneur, Surabaya</cite>
                </blockquote>
            </section>
        </div>
    </main>

    <!-- ASIDE -->
    <aside>
        <div class="container">
            <section id="tips">
                <h3>Tips Jual Beli Elektronik Bekas</h3>
                <ul>
                    <li>Pastikan kondisi barang sesuai deskripsi</li>
                    <li>Gunakan foto produk yang jelas dan detail</li>
                    <li>Tentukan harga kompetitif sesuai dengan harga pasar</li>
                    <li>Jaga komunikasi secara sopan dengan calon pembeli atau penjual</li>
                </ul>
            </section>
        </div>
    </aside>

    <!-- WEATHER -->
        <div class="container">
            <section class="weather-section card">
                <h3>🌦️ Info Cuaca</h3>
                <form id="weather-form">
                    <input type="text" id="city-input" placeholder="Masukkan nama kota..." required>
                    <button type="submit" class="btn btn-primary">Cek Cuaca</button>
                </form>

                <div id="weather-info" class="weather-result">
                    🌤️ Silakan masukkan kota untuk melihat cuaca.
                </div>
            </section>
        </div>

    <!-- FOOTER -->
    <footer>
         <div class="footer-grid">
            <section>
                <h4>Ikuti Kami</h4>
                <ul>
                    <li><a href="#facebook">Facebook</a></li>
                    <li><a href="#instagram">Instagram</a></li>
                    <li><a href="#twitter">Twitter</a></li>
                    <li><a href="#youtube">YouTube</a></li>
                    <li><a href="#tiktok">TikTok</a></li>
                </ul>
            </section>

            <section id="kontak">
                <h4>Hubungi Kami</h4>
                <address>
                    <p><a href="mailto:jenitaputri25062006@gmail.com">jenitaputri25062006@gmail.com</a></p>
                    <p><a href="tel:+62895412818444">+62 895 4128 18444</a></p>
                    <p><a href="https://wa.me/62895412818444" target="_blank">WhatsApp Chat</a></p>
                    <p>Jl. Sambaliung No.9, Kampus Gunung Kulua,<br>Kota Samarinda 75119</p>
                </address>
            </section>

            <section>
                <h4>Referensi Desain</h4>
                <ul>
                    <li><a href="https://www.olx.co.id/" target="_blank">OLX Indonesia</a></li>
                    <li><a href="https://www.tokopedia.com/" target="_blank">Tokopedia</a></li>
                    <li><a href="https://www.bukalapak.com/" target="_blank">Bukalapak</a></li>
                </ul>
            </section>
        </div>

        <div class="footer-bottom">
            <p>&copy; 2025 <strong>ElectroReuse</strong>. All rights reserved.</p>
        </div>
    </footer>

    <!-- Load External JavaScript -->
    <script src="script.js"></script>
</body>
</html>