<?php
$produk = [
    ["nama" => "Monitor 24 Inch",         "kategori" => "Monitor",  "harga" => 1800000, "stok" => 4],
    ["nama" => "Laptop Infinix",          "kategori" => "Laptop",   "harga" => 8500000, "stok" => 0],
    ["nama" => "Keyboard Gaming RGB",     "kategori" => "Keyboard", "harga" => 450000,  "stok" => 12],
    ["nama" => "Mouse Wireless",          "kategori" => "Mouse",    "harga" => 110000,  "stok" => 0],
    ["nama" => "Headset Gaming Wireless", "kategori" => "Audio",    "harga" => 250000,  "stok" => 7],
    ["nama" => "Webcam Full HD 4K",       "kategori" => "Webcam",   "harga" => 2500000, "stok" => 5],
    ["nama" => "PC Gaming ASUS",          "kategori" => "PC",       "harga" => 12000000, "stok" => 2],
    ["nama" => "Stiker Laptop",           "kategori" => "Sticker",  "harga" => 10000, "stok" => 27],
];
 
function formatRupiah($angka)
{
    return "Rp" . number_format($angka, 0, ",", ".");
}
 
function hitungDiskon($harga, $persen)
{
    return $harga - ($harga * $persen / 100);
}
 
$batasDiskon  = 1000000;
$persenDiskon = 10;
 
$totalProduk = count($produk);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cia Store - Katalog Produk</title>
     <link rel="stylesheet" href="DevonStyle.css">
</head>
<body>
 
    <header class="navbar">
        <div class="container">
            <div class="brand">Cia Store</div>
            <ul class="nav-links">
                <li><a href="#home">Home</a></li>
                <li><a href="#produk">Products</a></li>
                <li><a href="#footer">About</a></li>
            </ul>
        </div>
    </header>
 
    <section class="hero" id="home">
        <div class="container">
            <div class="hero-box">
                <small>CIA STORE</small>
                <h1>Simple Tech Store.</h1>
                <p>Temukan berbagai perangkat dan aksesoris teknologi untuk kebutuhanmu.</p>
                <a href="#produk" class="btn btn-light">Lihat Produk</a>
            </div>
        </div>
    </section>
 
    <main class="container" id="produk">
        <div class="catalog-head">
            <div>
                <small>Our Products</small>
                <h2>Katalog Produk</h2>
            </div>
            <div class="total-badge">Total Produk: <strong><?= $totalProduk; ?></strong></div>
        </div>
 
        <div class="grid">
            <?php foreach ($produk as $item): ?>
                <?php
                $dapatDiskon = $item["harga"] >= $batasDiskon;
                $tersedia    = $item["stok"] > 0;
                $hargaAkhir  = hitungDiskon($item["harga"], $persenDiskon);
                ?>
                <article class="card">
                    <div class="card-kategori">
                        <?= htmlspecialchars($item["kategori"]); ?>
                        <?php if ($dapatDiskon): ?>
                            <span class="promo">DISKON <?= $persenDiskon; ?>%</span>
                        <?php endif; ?>
                    </div>
                    <h3><?= htmlspecialchars($item["nama"]); ?></h3>
 
                    <div class="harga-box">
                        <?php if ($dapatDiskon): ?>
                            <div class="harga-coret"><?= formatRupiah($item["harga"]); ?></div>
                            <div class="harga"><?= formatRupiah($hargaAkhir); ?></div>
                        <?php else: ?>
                            <div class="harga"><?= formatRupiah($item["harga"]); ?></div>
                        <?php endif; ?>
                    </div>
 
                    <div class="card-info">
                        <span>Stok: <?= $item["stok"]; ?></span>
                        <?php if ($tersedia): ?>
                            <span class="status tersedia">Tersedia</span>
                        <?php else: ?>
                            <span class="status habis">Stok Habis</span>
                        <?php endif; ?>
                    </div>
 
                    <?php if ($tersedia): ?>
                        <button class="btn btn-dark" type="button">Beli Sekarang</button>
                    <?php else: ?>
                        <button class="btn btn-dark" type="button" disabled>Stok Habis</button>
                    <?php endif; ?>
                </article>
            <?php endforeach; ?>
        </div>
    </main>
 
    <footer id="footer">
        <div class="container">
            &copy; <?= date("Y"); ?> Cia Store. Simple Tech Store.
        </div>
    </footer>
 
</body>
</html>