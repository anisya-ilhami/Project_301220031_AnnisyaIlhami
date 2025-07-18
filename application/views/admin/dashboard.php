<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Berlian Tahu Tempe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #fff8f0; }
        .dashboard-box {
            max-width: 700px;
            margin: 40px auto;
            border-radius: 10px;
            box-shadow: 0 0 10px #ffa50033;
            background: #fff;
            padding: 30px 25px;
        }
        .dashboard-title {
            color: #ffa500;
            font-weight: bold;
            margin-bottom: 30px;
        }
        .admin-menu a {
            display: block;
            background: #ffa500;
            color: #fff;
            margin-bottom: 15px;
            padding: 15px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 18px;
            text-align: center;
            transition: background 0.2s;
        }
        .admin-menu a:hover {
            background: #ff8800;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="dashboard-box">
        <h2 class="dashboard-title text-center">Dashboard Admin</h2>
        <div class="admin-menu">
            <a href="#">Kelola Produk</a>
            <a href="#">Kelola Kategori</a>
            <a href="#">Kelola Banner</a>
            <a href="#">Kelola Pesanan</a>
            <a href="#">Konfirmasi Pembayaran</a>
        </div>
    </div>
</body>
</html> 