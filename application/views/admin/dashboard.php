<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Berlian Tahu Tempe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { background: #fff8f0; }
        .topbar {
            background: #ffa500;
            color: #fff;
            padding: 16px 0 12px 0;
            margin-bottom: 32px;
            box-shadow: 0 2px 8px #ffa50022;
        }
        .topbar .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .dashboard-title {
            color: #ffa500;
            font-weight: bold;
            margin-bottom: 30px;
            text-align: center;
        }
        .admin-menu {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 24px;
        }
        .admin-card {
            background: #fff;
            border-radius: 14px;
            box-shadow: 0 2px 12px #ffa50022;
            padding: 32px 18px 24px 18px;
            text-align: center;
            transition: box-shadow 0.2s, transform 0.2s;
            cursor: pointer;
            border: 2px solid #ffa50033;
        }
        .admin-card:hover {
            box-shadow: 0 6px 24px #ffa50055;
            transform: translateY(-4px) scale(1.03);
            border-color: #ffa500;
        }
        .admin-card i {
            font-size: 2.5rem;
            color: #ffa500;
            margin-bottom: 12px;
        }
        .admin-card span {
            display: block;
            font-size: 1.15rem;
            font-weight: 500;
            color: #333;
        }
        @media (max-width: 600px) {
            .admin-menu { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
    <div class="topbar">
        <div class="container">
            <div style="font-size:1.2rem;font-weight:500;letter-spacing:1px;">
                <i class="bi bi-person-circle"></i> Admin
            </div>
            <a href="<?php echo site_url('auth/login'); ?>" class="btn btn-light btn-sm">Logout</a>
        </div>
    </div>
    <div class="container">
        <h2 class="dashboard-title">Dashboard Admin</h2>
        <div class="admin-menu">
            <a href="<?php echo site_url('produk'); ?>" class="admin-card">
                <i class="bi bi-box-seam"></i>
                <span>Kelola Produk</span>
            </a>
            <a href="<?php echo site_url('kategori'); ?>" class="admin-card">
                <i class="bi bi-tags"></i>
                <span>Kelola Kategori</span>
            </a>
            <a href="<?php echo site_url('banner'); ?>" class="admin-card">
                <i class="bi bi-image"></i>
                <span>Kelola Banner</span>
            </a>
            <a href="<?php echo site_url('pesanan'); ?>" class="admin-card">
                <i class="bi bi-cart-check"></i>
                <span>Kelola Pesanan</span>
            </a>
            <a href="<?php echo site_url('pesanan/konfirmasi_pembayaran'); ?>" class="admin-card">
                <i class="bi bi-cash-coin"></i>
                <span>Konfirmasi Pembayaran</span>
            </a>
        </div>
    </div>
</body>
</html> 