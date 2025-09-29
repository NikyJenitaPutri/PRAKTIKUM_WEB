// Tunggu DOM siap
document.addEventListener('DOMContentLoaded', function () {

    // 1. Smooth Scrolling untuk Nav Links
    const navLinks = document.querySelectorAll('nav ul li a');
    navLinks.forEach(link => {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            const targetId = this.getAttribute('href').substring(1);
            const targetSection = document.getElementById(targetId);
            if (targetSection) {
                targetSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });

    // 2. Fungsi Pencarian Produk
    const searchForm = document.querySelector('#beranda form');
    const searchInput = searchForm.querySelector('input[type="search"]');
    const categorySelect = searchForm.querySelector('select');
    const searchButton = searchForm.querySelector('button');

    searchButton.addEventListener('click', function (e) {
        e.preventDefault();
        const searchTerm = searchInput.value.toLowerCase().trim();
        const selectedCategory = categorySelect.value.toLowerCase();

        const productCards = document.querySelectorAll('#produk-terbaru article');
        let visibleCount = 0;

        productCards.forEach(card => {
            const title = card.querySelector('h3').textContent.toLowerCase();
            const description = Array.from(card.querySelectorAll('p'))
                .map(p => p.textContent.toLowerCase())
                .join(' ');
            const category = card.getAttribute('data-category')?.toLowerCase() || '';

            const matchesSearch = !searchTerm || title.includes(searchTerm) || description.includes(searchTerm);
            const matchesCategory = !selectedCategory || category.includes(selectedCategory);

            if (matchesSearch && matchesCategory) {
                card.style.display = 'block';
                card.classList.add('show-card');
                visibleCount++;
            } else {
                card.style.display = 'none';
                card.classList.remove('show-card');
            }
        });

        // Pesan jika tidak ada hasil
        const produkSection = document.querySelector('#produk-terbaru');
        let message = produkSection.querySelector('.no-results');
        if (!message) {
            message = document.createElement('p');
            message.classList.add('no-results');
            message.style.cssText = 'text-align:center; font-size:18px; color:#666; margin-top:20px;';
            produkSection.querySelector('div').appendChild(message);
        }

        if (visibleCount > 0) {
            message.textContent = '';
            message.style.display = 'none';
            produkSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
        } else {
            message.textContent = 'Tidak ada produk ditemukan. Coba ubah kata kunci atau kategori.';
            message.style.display = 'block';
            produkSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    });

    // 3. Tombol "Lihat Detail" ke Produk Terbaru
    function createDetailButton(card) {
        const button = document.createElement('a');
        button.href = '#';
        button.classList.add('btn', 'btn-primary');
        button.textContent = 'Lihat Detail';
        button.style.cssText = 'display:inline-block; margin-top:10px;';
        card.appendChild(button);

        button.addEventListener('click', function (e) {
            e.preventDefault();
            openProductModal(card);
        });
    }

    // Fungsi buka modal produk
    function openProductModal(card) {
        const imgEl = card.querySelector('img');
        const title = card.querySelector('h3').textContent;
        const details = card.querySelector('p.detail')?.textContent || '';

        let modal = document.querySelector('.modal-produk');
        if (!modal) {
            modal = document.createElement('div');
            modal.classList.add('modal-produk');
            modal.innerHTML = `
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <div class="modal-body"></div>
                </div>
            `;
            document.body.appendChild(modal);

            modal.querySelector('.close').addEventListener('click', () => {
                modal.style.display = 'none';
            });
            window.addEventListener('click', e => {
                if (e.target === modal) modal.style.display = 'none';
            });
        }

        const body = modal.querySelector('.modal-body');
        body.innerHTML = `
            ${imgEl ? `<img src="${imgEl.src}" alt="${title}">` : ''}
            <h3>${title}</h3>
            <p>${details}</p>
            <button class="btn btn-secondary" onclick="alert('Fitur beli akan segera hadir!')">Beli Sekarang</button>
        `;

        modal.style.display = 'flex';
    }

    const productCards = document.querySelectorAll('#produk-terbaru article');
    productCards.forEach(createDetailButton);

    // 4. Modal Kategori
    const kategoriUtamaItems = document.querySelectorAll('#kategori .kategori-utama');
    kategoriUtamaItems.forEach(item => {
        item.addEventListener('click', function () {
            const title = this.querySelector('h3').textContent;
            const subItems = this.getAttribute('data-sub').split(',');

            let modalKategori = document.querySelector('.modal-kategori');
            if (!modalKategori) {
                modalKategori = document.createElement('div');
                modalKategori.classList.add('modal-kategori');
                modalKategori.innerHTML = `
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <h3></h3>
                        <ul class="sub-list"></ul>
                    </div>
                `;
                document.body.appendChild(modalKategori);

                modalKategori.querySelector('.close').addEventListener('click', () => {
                    modalKategori.style.display = 'none';
                });
                window.addEventListener('click', e => {
                    if (e.target === modalKategori) modalKategori.style.display = 'none';
                });
            }

            modalKategori.querySelector('h3').textContent = title;
            const subList = modalKategori.querySelector('.sub-list');
            subList.innerHTML = '';
            subItems.forEach(sub => {
                const li = document.createElement('li');
                li.textContent = sub.trim();
                subList.appendChild(li);
            });

            modalKategori.style.display = 'flex';
        });
    });

    // 5. Dark Mode
    function createDarkModeToggle() {
        const navDiv = document.querySelector('nav div:last-of-type');
        const toggleBtn = document.createElement('button');
        toggleBtn.id = 'dark-mode-toggle';
        toggleBtn.classList.add('btn', 'btn-secondary');
        toggleBtn.textContent = '🌙 Dark Mode';
        toggleBtn.style.marginLeft = '10px';
        navDiv.appendChild(toggleBtn);

        if (localStorage.getItem('darkMode') === 'enabled') {
            document.body.classList.add('dark-mode');
            toggleBtn.textContent = '☀️ Light Mode';
        }

        toggleBtn.addEventListener('click', function () {
            document.body.classList.toggle('dark-mode');
            if (document.body.classList.contains('dark-mode')) {
                localStorage.setItem('darkMode', 'enabled');
                toggleBtn.textContent = '☀️ Light Mode';
            } else {
                localStorage.setItem('darkMode', 'disabled');
                toggleBtn.textContent = '🌙 Dark Mode';
            }
        });
    }
    createDarkModeToggle();

    // 6. Animasi Stats
    const statBoxes = document.querySelectorAll('.stat-box');
    statBoxes.forEach((box, index) => {
        box.style.opacity = '0';
        box.style.transform = 'translateY(20px)';
        setTimeout(() => {
            box.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            box.style.opacity = '1';
            box.style.transform = 'translateY(0)';
        }, index * 200);
    });

    // Fungsi Toast
    function showToast(message) {
        const toast = document.createElement('div');
        toast.className = 'toast';
        toast.textContent = message;
        document.body.appendChild(toast);

        setTimeout(() => toast.classList.add('show'), 100);
        setTimeout(() => {
            toast.classList.remove('show');
            setTimeout(() => toast.remove(), 300);
        }, 3000);
    }

    // Notifikasi tombol Masuk & Daftar
    const btnMasuk = document.querySelector('a[href="#masuk"]');
    const btnDaftar = document.querySelector('a[href="#daftar"]');

    if (btnMasuk) btnMasuk.addEventListener('click', e => { e.preventDefault(); showToast('Fitur Masuk akan segera hadir!'); });
    if (btnDaftar) btnDaftar.addEventListener('click', e => { e.preventDefault(); showToast('Fitur Daftar akan segera hadir!'); });

    // 7. Fetch API OpenWeatherMap
    function getWeather(city = "Jakarta") {
        const apiKey = "1d86135368cb8d10c97f911650bc6f3f";
        const url = `https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${apiKey}&units=metric&lang=id`;

        fetch(url)
            .then(response => {
                if (!response.ok) throw new Error("Gagal mengambil data cuaca");
                return response.json();
            })
            .then(data => {
                const suhu = data.main.temp;
                const kondisi = data.weather[0].description;
                const kota = data.name;

                const weatherEl = document.querySelector("#weather-info");
                if (weatherEl) {
                    weatherEl.textContent = `🌤️ Cuaca di ${kota}: ${suhu}°C, ${kondisi}`;
                }
            })
            .catch(error => {
                console.error("Error:", error);
                const weatherEl = document.querySelector("#weather-info");
                if (weatherEl) weatherEl.textContent = "❌ Gagal mengambil data cuaca. Coba lagi.";
            });
    }

    getWeather("Jakarta");

    // Event form input kota
    const weatherForm = document.getElementById("weather-form");
    const cityInput = document.getElementById("city-input");

    if (weatherForm) {
        weatherForm.addEventListener("submit", function (e) {
            e.preventDefault();
            const city = cityInput.value.trim();
            if (city) getWeather(city);
            else alert("Masukkan nama kota terlebih dahulu!");
        });
    }

});
