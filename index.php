<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dyann Store | Top Up Game Murah & Terpercaya</title>
    <!-- Google Fonts & FontAwesome untuk Icon -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- NAVIGASI -->
    <nav class="navbar">
        <div class="nav-container">
            <a href="#" class="logo"><i class="fa-solid fa-bolt"></i> Dyann <span>Store</span></a>
            <div class="search-box">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" id="searchInput" placeholder="Cari game favoritmu (e.g., ML, FF)..." onkeyup="searchGame()">
            </div>
        </div>
    </nav>

    <!-- HERO SECTION -->
    <header class="hero">
        <div class="hero-banner-container">
            <img src="img/banner.png" alt="Promo Dyann Store" class="main-banner">
        </div>
    </header>

    <!-- GAME GRID SECTION -->
    <main class="container">
        <h2 class="section-title">Pilih Game</h2>
        <div class="game-grid" id="gameGrid">
            
            <!-- Game 1: MLBB -->
            <div class="game-card" data-name="mobile legends mlbb ml" onclick="openModal('mlbb')">
                <div class="badge">Popular</div>
                <img src="img/ml.png" alt="Mobile Legends">
                <div class="game-info">
                    <h3>Mobile Legends</h3>
                    <p>Diamonds & Weekly Pass</p>
                </div>
            </div>

            <!-- Game 2: HOK -->
            <div class="game-card" data-name="honor of kings hok" onclick="openModal('hok')">
                <img src="img/hok.png" alt="Honor of Kings">
                <div class="game-info">
                    <h3>Honor of Kings</h3>
                    <p>Tokens & Starstone</p>
                </div>
            </div>

            <!-- Game 3: Free Fire -->
            <div class="game-card" data-name="free fire ff" onclick="openModal('ff')">
                <img src="img/ff.jpg" alt="Free Fire">
                <div class="game-info">
                    <h3>Free Fire</h3>
                    <p>Diamonds & Membership</p>
                </div>
            </div>

            <!-- Game 4: PUBG Mobile -->
            <div class="game-card" data-name="pubg mobile pubgm" onclick="openModal('pubg')">
                <img src="img/pubg.jpg" alt="PUBG Mobile">
                <div class="game-info">
                    <h3>PUBG Mobile</h3>
                    <p>Unknown Cash (UC)</p>
                </div>
            </div>

            <!-- Game 5: CODM -->
            <div class="game-card" data-name="call of duty mobile codm cod" onclick="openModal('codm')">
                <img src="img/codm.jpg" alt="Call of Duty Mobile">
                <div class="game-info">
                    <h3>COD Mobile</h3>
                    <p>CP & Battle Pass</p>
                </div>
            </div>

        </div>
    </main>

    <!-- MODAL DETAIL TOP UP (Dinamis via JavaScript) -->
    <div id="topupModal" class="modal">
        <div class="modal-content">
            <span class="close-btn" onclick="closeModal()">&times;</span>
            
            <div class="modal-body">
                <div class="modal-header-game">
                    <h2 id="modalGameTitle">Nama Game</h2>
                    <p>Silakan isi data dan pilih nominal top up</p>
                </div>

                <!-- Form Input Data -->
                <div class="form-group">
                    <label for="userId"><i class="fa-solid fa-user"></i> Masukkan User ID / Server</label>
                    <input type="text" id="userId" placeholder="Contoh: 12345678 (2026)" required>
                </div>

                <!-- Pilihan Nominal -->
                <div class="section-sub-title">1. Pilih Nominal</div>
                <div class="nominal-grid" id="nominalContainer">
                    <!-- Isian nominal akan di-generate otomatis oleh JS tergantung game yang dipilih -->
                </div>

                <!-- Pilihan Metode Pembayaran -->
                <div class="section-sub-title">2. Metode Pembayaran</div>
                <div class="payment-grid">
                    <div class="payment-card">
                        <input type="radio" name="payment" id="qris" value="QRIS">
                        <label for="qris">
                            <i class="fa-solid fa-qrcode"></i> QRIS (OVO, Dana, LinkAja)
                        </label>
                    </div>
                    <div class="payment-card">
                        <input type="radio" name="payment" id="bca" value="BCA">
                        <label for="bca">
                            <i class="fa-solid fa-bank"></i> Bank BCA (Virtual Account)
                        </label>
                    </div>
                    <div class="payment-card">
                        <input type="radio" name="payment" id="mandiri" value="Mandiri">
                        <label for="mandiri">
                            <i class="fa-solid fa-bank"></i> Bank Mandiri
                        </label>
                    </div>
                </div>

                <button class="btn-checkout" onclick="prosesTopUp()">Beli Sekarang</button>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <footer>
        <p>&copy; 2026 Dyann Store. All Rights Reserved. Elegant & Minimalist Design.</p>
    </footer>

    <!-- JAVASCRIPT ACTION -->
    <script>
        // Data Nominal Game & Harga
        const gameData = {
            mlbb: {
                title: "Mobile Legends",
                items: [
                    { name: "86 Diamonds", price: "Rp 20.000" },
                    { name: "172 Diamonds", price: "Rp 40.000" },
                    { name: "257 Diamonds", price: "Rp 60.000" },
                    { name: "Weekly Diamond Pass", price: "Rp 28.000" }
                ]
            },
            hok: {
                title: "Honor of Kings",
                items: [
                    { name: "80 Tokens", price: "Rp 16.000" },
                    { name: "240 Tokens", price: "Rp 48.000" },
                    { name: "1200 Tokens", price: "Rp 230.000" }
                ]
            },
            ff: {
                title: "Free Fire",
                items: [
                    { name: "70 Diamonds", price: "Rp 10.000" },
                    { name: "140 Diamonds", price: "Rp 20.000" },
                    { name: "355 Diamonds", price: "Rp 50.000" },
                    { name: "Membership Mingguan", price: "Rp 33.000" }
                ]
            },
            pubg: {
                title: "PUBG Mobile",
                items: [
                    { name: "60 UC", price: "Rp 14.000" },
                    { name: "325 UC", price: "Rp 70.000" },
                    { name: "660 UC", price: "Rp 140.000" }
                ]
            },
            codm: {
                title: "COD Mobile",
                items: [
                    { name: "31 CP", price: "Rp 5.000" },
                    { name: "63 CP", price: "Rp 10.000" },
                    { name: "128 CP", price: "Rp 20.000" }
                ]
            }
        };

        // Fitur Pencarian Game
        function searchGame() {
            let input = document.getElementById('searchInput').value.toLowerCase();
            let cards = document.getElementsByClassName('game-card');

            for (let i = 0; i < cards.length; i++) {
                let gameTags = cards[i].getAttribute('data-name');
                if (gameTags.includes(input)) {
                    cards[i].style.display = "block";
                } else {
                    cards[i].style.display = "none";
                }
            }
        }

        // Buka Pop-up/Modal Pilihan Top Up
        function openModal(gameKey) {
            const data = gameData[gameKey];
            document.getElementById('modalGameTitle').innerText = data.title;
            
            const container = document.getElementById('nominalContainer');
            container.innerHTML = ""; // Reset isi sebelumnya

            data.items.forEach((item, index) => {
                container.innerHTML += `
                    <div class="nominal-card">
                        <input type="radio" name="nominal" id="item_${index}" value="${item.name}">
                        <label for="item_${index}">
                            <div class="nom-name">${item.name}</div>
                            <div class="nom-price">${item.price}</div>
                        </label>
                    </div>
                `;
            });

            document.getElementById('topupModal').style.display = "flex";
        }

        // Tutup Pop-up
        function closeModal() {
            document.getElementById('topupModal').style.display = "none";
        }

        // Close modal jika klik di luar area modal
        window.onclick = function(event) {
            const modal = document.getElementById('topupModal');
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        // Action Klik Beli
        function prosesTopUp() {
            const userId = document.getElementById('userId').value;
            const nominal = document.querySelector('input[name="nominal"]:checked');
            const payment = document.querySelector('input[name="payment"]:checked');

            if (!userId) {
                alert("Harap isi User ID Anda!");
                return;
            }
            if (!nominal) {
                alert("Harap pilih nominal top up!");
                return;
            }
            if (!payment) {
                alert("Harap pilih metode pembayaran!");
                return;
            }

            alert(`Pesanan Berhasil!\nID: ${userId}\nProduk: ${nominal.value}\nMetode: ${payment.value}\n\nTerima kasih telah memilih Dyann Store!`);
            closeModal();
        }
    </script>
</body>
</html>