<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pesanan & Konfirmasi Pembayaran - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { background: #fff8f0; }
        .pesanan-box {
            max-width: 1100px;
            margin: 40px auto;
            border-radius: 14px;
            box-shadow: 0 2px 12px #ffa50022;
            background: #fff;
            padding: 32px 25px;
        }
        .pesanan-title {
            color: #ffa500;
            font-weight: bold;
            margin-bottom: 30px;
            text-align: center;
        }
        .btn-orange {
            background: #ffa500;
            color: #fff;
            border: none;
        }
        .btn-orange:hover {
            background: #ff8800;
            color: #fff;
        }
        .table-responsive { margin-top: 24px; }
        .table th, .table td { vertical-align: middle !important; }
    </style>
</head>
<body>
    <div class="pesanan-box">
        <h2 class="pesanan-title">Kelola Pesanan</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover bg-white">
                <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>User ID</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Kota ID</th>
                        <th>Nama Penerima</th>
                        <th>Alamat</th>
                        <th>No. Telp</th>
                        <th style="width:120px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($pesanan as $p): ?>
                    <tr>
                        <td><?php echo $p['pesanan_id']; ?></td>
                        <td><?php echo $p['user_id']; ?></td>
                        <td><?php echo $p['tanggal']; ?></td>
                        <td><?php echo $p['status']; ?></td>
                        <td><?php echo $p['kota_id']; ?></td>
                        <td><?php echo $p['nama_penerima']; ?></td>
                        <td><?php echo $p['alamat']; ?></td>
                        <td><?php echo $p['nomor_telp']; ?></td>
                        <td>
                            <?php if($p['status'] != 'selesai'): ?>
                                <a href="<?php echo site_url('pesanan/konfirmasi/'.$p['pesanan_id']); ?>" class="btn btn-sm btn-orange">Konfirmasi</a>
                            <?php endif; ?>
                            <a href="<?php echo site_url('pesanan/hapus/'.$p['pesanan_id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus pesanan?')"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <h2 class="pesanan-title mt-5" style="font-size:1.5rem;">Konfirmasi Pembayaran</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover bg-white">
                <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>Pesanan ID</th>
                        <th>Nama Account</th>
                        <th>No. Rekening</th>
                        <th>Tanggal Transfer</th>
                        <th>Bukti</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($konfirmasi as $k): ?>
                    <tr>
                        <td><?php echo $k['konfirmasi_id']; ?></td>
                        <td><?php echo $k['pesanan_id']; ?></td>
                        <td><?php echo $k['nama_account']; ?></td>
                        <td><?php echo $k['nomor_rek']; ?></td>
                        <td><?php echo $k['tanggal_transfer']; ?></td>
                        <td>
                            <?php if($k['gambar']): ?>
                                <a href="<?php echo $k['gambar']; ?>" target="_blank">Lihat Bukti</a>
                            <?php else: ?>
                                <span class="text-muted">-</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <a href="<?php echo site_url('admin/dashboard'); ?>" class="btn btn-secondary mt-3"><i class="bi bi-arrow-left"></i> Kembali ke Dashboard</a>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 