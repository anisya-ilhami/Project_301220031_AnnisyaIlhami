<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda User - Berlian Tahu Tempe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #fff8f0; }
        .user-home-box {
            max-width: 500px;
            margin: 40px auto;
            border-radius: 10px;
            box-shadow: 0 0 10px #ffa50033;
            background: #fff;
            padding: 30px 25px;
        }
        .user-title {
            color: #ffa500;
            font-weight: bold;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="user-home-box text-center">
        <h2 class="user-title">Selamat Datang di Berlian Tahu Tempe</h2>
        <p>Anda berhasil login sebagai <b>user</b>.</p>
        <p>Silakan gunakan menu untuk melihat produk, melakukan pemesanan, atau mengelola profil Anda.</p>
        <?php if($this->session->flashdata('error')): ?>
            <div class="alert alert-danger mt-3"><?php echo $this->session->flashdata('error'); ?></div>
        <?php endif; ?>
        <button class="btn btn-warning mt-4" onclick="document.getElementById('adminForm').style.display='block'">Masuk Admin</button>
        <form id="adminForm" method="post" action="<?php echo site_url('user/admin_access'); ?>" style="display:none;max-width:300px;margin:20px auto 0;">
            <div class="form-group">
                <input type="password" class="form-control" name="admin_password" placeholder="Password Admin" required>
            </div>
            <button type="submit" class="btn btn-orange btn-block">Login Admin</button>
        </form>
        <script>
            // Optional: hide form on submit
            document.getElementById('adminForm').onsubmit = function() {
                this.querySelector('button[type=submit]').disabled = true;
            };
        </script>
    </div>
</body>
</html> 