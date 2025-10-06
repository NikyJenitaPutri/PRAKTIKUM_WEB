document.addEventListener('DOMContentLoaded', function () {
    // 1. Tombol Fitur Belum Ada
    document.querySelectorAll('.btn-fitur').forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            alert("Fitur belum ada");
        });
    });

    // 2. Smooth Scrolling Nav Links
    document.querySelectorAll('nav ul li a').forEach(link => {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            const targetId = this.getAttribute('href').substring(1);
            const target = document.getElementById(targetId);
            if (target) target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        });
    });

    // 3. Pencarian Produk
    const searchForm = document.querySelector('#beranda form');
    if (searchForm) {
        const searchInput = searchForm.querySelector('input[type="search"]');
        const categorySelect = searchForm.querySelector('select');
        const searchButton = searchForm.querySelector('button');

        searchButton.addEventListener('click', function (e) {
            e.preventDefault();
            const term = searchInput.value.toLowerCase().trim();
            const category = categorySelect.value.toLowerCase();

            const productCards = document.querySelectorAll('#produk-terbaru article');
            let visibleCount = 0;

            productCards.forEach(card => {
                const title = card.querySelector('h3').textContent.toLowerCase();
                const desc = Array.from(card.querySelectorAll('p'))
                    .map(p => p.textContent.toLowerCase()).join(' ');
                const cardCategory = card.getAttribute('data-category')?.toLowerCase() || '';

                const matchSearch = !term || title.includes(term) || desc.includes(term);
                const matchCategory = !category || cardCategory.includes(category);

                if (matchSearch && matchCategory) {
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
    }

    // 4. Tombol "Lihat Detail" Produk
    function createDetailButton(card) {
        const button = document.createElement('a');
        button.href = '#';
        button.className = 'btn btn-primary';
        button.textContent = 'Lihat Detail';
        button.style.cssText = 'display:inline-block; margin-top:10px;';
        card.appendChild(button);

        button.addEventListener('click', function (e) {
            e.preventDefault();
            openProductModal(card);
        });
    }

    function openProductModal(card) {
        const img = card.querySelector('img');
        const title = card.querySelector('h3').textContent;
        const details = card.querySelector('p.detail')?.textContent || '';

        let modal = document.querySelector('.modal-produk');
        if (!modal) {
            modal = document.createElement('div');
            modal.className = 'modal-produk';
            modal.innerHTML = `
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <div class="modal-body"></div>
                </div>`;
            document.body.appendChild(modal);

            modal.querySelector('.close').addEventListener('click', () => modal.style.display = 'none');
            window.addEventListener('click', e => { if (e.target === modal) modal.style.display = 'none'; });
        }

        modal.querySelector('.modal-body').innerHTML = `
            ${img ? `<img src="${img.src}" alt="${title}">` : ''}
            <h3>${title}</h3>
            <p>${details}</p>
            <button class="btn btn-secondary" onclick="alert('Fitur beli akan segera hadir!')">Beli Sekarang</button>
        `;
        modal.style.display = 'flex';
    }

    document.querySelectorAll('#produk-terbaru article').forEach(createDetailButton);

    // 5. Modal Kategori
    document.querySelectorAll('#kategori .kategori-utama').forEach(item => {
        item.addEventListener('click', function () {
            const title = this.querySelector('h3').textContent;
            const subItems = this.getAttribute('data-sub').split(',');

            let modal = document.querySelector('.modal-kategori');
            if (!modal) {
                modal = document.createElement('div');
                modal.className = 'modal-kategori';
                modal.innerHTML = `
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <h3></h3>
                        <ul class="sub-list"></ul>
                    </div>`;
                document.body.appendChild(modal);

                modal.querySelector('.close').addEventListener('click', () => modal.style.display = 'none');
                window.addEventListener('click', e => { if (e.target === modal) modal.style.display = 'none'; });
            }

            modal.querySelector('h3').textContent = title;
            const subList = modal.querySelector('.sub-list');
            subList.innerHTML = '';
            subItems.forEach(sub => {
                const li = document.createElement('li');
                li.textContent = sub.trim();
                subList.appendChild(li);
            });

            modal.style.display = 'flex';
        });
    });

    // 6. Dark Mode Toggle
    const toggleBtn = document.getElementById('toggle-dark');

    if (toggleBtn) {
        // Inisialisasi status dari localStorage
        if (localStorage.getItem('darkMode') === 'enabled') {
            document.body.classList.add('dark-mode');
            toggleBtn.textContent = 'Light Mode';
        } else {
            toggleBtn.textContent = 'Dark Mode';
        }

        toggleBtn.addEventListener('click', () => {
            document.body.classList.toggle('dark-mode');
            if (document.body.classList.contains('dark-mode')) {
                localStorage.setItem('darkMode', 'enabled');
                toggleBtn.textContent = 'Light Mode';
            } else {
                localStorage.setItem('darkMode', 'disabled');
                toggleBtn.textContent = 'Dark Mode';
            }
        });
    }

    // 7. Animasi Stat Boxes
    document.querySelectorAll('.stat-box').forEach((box, i) => {
        box.style.opacity = '0';
        box.style.transform = 'translateY(20px)';
        setTimeout(() => {
            box.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            box.style.opacity = '1';
            box.style.transform = 'translateY(0)';
        }, i * 200);
    });

    // 9. Fetch API OpenWeatherMap
    function getWeather(city = "Jakarta") {
        const apiKey = "1d86135368cb8d10c97f911650bc6f3f";
        fetch(`https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${apiKey}&units=metric&lang=id`)
            .then(res => { if(!res.ok) throw new Error("Gagal mengambil data"); return res.json(); })
            .then(data => {
                const el = document.querySelector("#weather-info");
                if(el) el.textContent = `Cuaca di ${data.name}: ${data.main.temp}°C, ${data.weather[0].description}`;
            })
            .catch(err => {
                console.error(err);
                const el = document.querySelector("#weather-info");
                if(el) el.textContent = "Gagal mengambil data cuaca.";
            });
    }

    getWeather();

    const weatherForm = document.getElementById("weather-form");
    const cityInput = document.getElementById("city-input");
    if (weatherForm && cityInput) {
        weatherForm.addEventListener("submit", function (e) {
            e.preventDefault();
            const city = cityInput.value.trim();
            if (city) getWeather(city);
            else alert("Masukkan nama kota terlebih dahulu!");
        });
    }
});
