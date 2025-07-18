<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pembayaran - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { background: #fff8f0; }
        .konfirmasi-box {
            max-width: 800px;
            margin: 40px auto;
            border-radius: 14px;
            box-shadow: 0 2px 12px #ffa50022;
            background: #fff;
            padding: 32px 25px;
        }
        .konfirmasi-title {
            color: #ffa500;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }
        .table-responsive { margin-top: 18px; }
        .table th, .table td { vertical-align: middle !important; }
    </style>
</head>
<body>
    <div class="konfirmasi-box">
        <h2 class="konfirmasi-title">Daftar Konfirmasi Pembayaran</h2>
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
                    <?php if(empty($konfirmasi)): ?>
                    <tr><td colspan="6" class="text-center text-muted">Belum ada konfirmasi pembayaran.</td></tr>
                    <?php else: foreach($konfirmasi as $k): ?>
                    <tr>
                        <td><?php echo $k['konfirmasi_id']; ?></td>
                        <td><?php echo $k['pesanan_id']; ?></td>
                        <td><?php echo $k['nama_account']; ?></td>
                        <td><?php echo $k['nomor_rek']; ?></td>
                        <td><?php echo $k['tanggal_transfer']; ?></td>
                        <td>
                            <?php if($k['gambar']): ?>
                                <a href="<?php echo $k['gambar']; ?>" target="_blank" title="Lihat bukti transfer">Lihat Bukti</a>
                            <?php else: ?>
                                <span class="text-muted">-</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; endif; ?>
                </tbody>
            </table>
        </div>
        <a href="<?php echo site_url('admin/dashboard'); ?>" class="btn btn-secondary mt-3"><i class="bi bi-arrow-left"></i> Kembali ke Dashboard</a>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 