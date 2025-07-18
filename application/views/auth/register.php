<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Berlian Tahu Tempe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #fff8f0; }
        .register-box {
            max-width: 400px;
            margin: 40px auto;
            border-radius: 10px;
            box-shadow: 0 0 10px #ffa50033;
            background: #fff;
            padding: 30px 25px;
        }
        .btn-orange {
            background: #ffa500;
            color: #fff;
        }
        .btn-orange:hover {
            background: #ff8800;
            color: #fff;
        }
        .form-title {
            color: #ffa500;
            font-weight: bold;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="register-box">
        <h3 class="form-title text-center">Daftar Akun</h3>
        <?php if(validation_errors()): ?>
            <div class="alert alert-danger"><?php echo validation_errors(); ?></div>
        <?php endif; ?>
        <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
        <?php endif; ?>
        <form method="post" action="">
            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama" name="nama" required value="<?php echo set_value('nama'); ?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required value="<?php echo set_value('email'); ?>">
            </div>
            <div class="form-group">
                <label for="kota">Kota</label>
                <input type="text" class="form-control" id="kota" name="kota" value="<?php echo set_value('kota'); ?>">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="password2">Konfirmasi Password</label>
                <input type="password" class="form-control" id="password2" name="password2" required>
            </div>
            <button type="submit" class="btn btn-orange btn-block">Daftar</button>
        </form>
        <div class="mt-3 text-center">
            Sudah punya akun? <a href="<?php echo site_url('auth/login'); ?>" style="color:#ffa500;">Login</a>
        </div>
    </div>
</body>
</html> 