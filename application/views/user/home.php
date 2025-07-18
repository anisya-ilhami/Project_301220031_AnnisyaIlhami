<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda User - Berlian Tahu Tempe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { background: #fff8f0; }
        .user-home-box {
            max-width: 700px;
            margin: 40px auto;
            border-radius: 14px;
            box-shadow: 0 2px 12px #ffa50022;
            background: #fff;
            padding: 32px 25px 25px 25px;
        }
        .user-title {
            color: #ffa500;
            font-weight: bold;
            margin-bottom: 10px;
            text-align: center;
        }
        .user-desc {
            color: #555;
            text-align: center;
            margin-bottom: 30px;
        }
        .user-menu {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 24px;
            margin-bottom: 30px;
        }
        .user-card {
            background: #fff8f0;
            border-radius: 10px;
            box-shadow: 0 1px 6px #ffa50011;
            padding: 28px 10px 18px 10px;
            text-align: center;
            transition: box-shadow 0.2s, transform 0.2s;
            cursor: pointer;
            border: 2px solid #ffa50022;
            text-decoration: none;
        }
        .user-card:hover {
            box-shadow: 0 6px 24px #ffa50033;
            transform: translateY(-4px) scale(1.03);
            border-color: #ffa500;
        }
        .user-card i {
            font-size: 2.2rem;
            color: #ffa500;
            margin-bottom: 10px;
        }
        .user-card span {
            display: block;
            font-size: 1.08rem;
            font-weight: 500;
            color: #333;
        }
        .btn-orange {
            background: #ffa500;
            color: #fff;
            border: none;
            margin-top: 10px;
        }
        .btn-orange:hover {
            background: #ff8800;
            color: #fff;
        }
        @media (max-width: 600px) {
            .user-home-box { padding: 18px 5px; }
            .user-menu { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
    <div class="user-home-box">
        <h2 class="user-title">Selamat Datang di Berlian Tahu Tempe</h2>
        <div class="user-desc">
            Anda berhasil login sebagai <b>user</b>.<br>
            Silakan gunakan menu di bawah untuk melihat produk, melakukan pemesanan, atau mengelola profil Anda.
        </div>
        <div class="user-menu">
            <a href="#" class="user-card">
                <i class="bi bi-box-seam"></i>
                <span>Produk</span>
            </a>
            <a href="#" class="user-card">
                <i class="bi bi-cart-check"></i>
                <span>Pesanan Saya</span>
            </a>
            <a href="#" class="user-card">
                <i class="bi bi-person"></i>
                <span>Profil</span>
            </a>
        </div>
        <form method="post" action="<?php echo site_url('user/admin_access'); ?>" style="max-width:300px;margin:0 auto;">
            <button type="button" class="btn btn-orange btn-block" onclick="document.getElementById('adminForm').style.display='block'">Masuk Admin</button>
            <div id="adminForm" style="display:none;">
                <div class="form-group mt-2">
                    <input type="password" class="form-control" name="admin_password" placeholder="Password Admin" required>
                </div>
                <button type="submit" class="btn btn-orange btn-block">Login Admin</button>
            </div>
        </form>
        <?php if($this->session->flashdata('error')): ?>
            <div class="alert alert-danger mt-3"><?php echo $this->session->flashdata('error'); ?></div>
        <?php endif; ?>
    </div>
    <script>
        document.querySelector('button[onclick]').onclick = function() {
            document.getElementById('adminForm').style.display = 'block';
            this.style.display = 'none';
        };
    </script>
</body>
</html> 