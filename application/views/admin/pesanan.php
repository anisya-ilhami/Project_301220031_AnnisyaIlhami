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
            margin-bottom: 10px;
            text-align: center;
        }
        .pesanan-desc {
            color: #555;
            text-align: center;
            margin-bottom: 30px;
        }
        .section-box {
            background: #fff8f0;
            border-radius: 10px;
            padding: 18px 18px 10px 18px;
            margin-bottom: 32px;
            box-shadow: 0 1px 6px #ffa50011;
        }
        .badge-status {
            font-size: 0.95em;
            padding: 5px 12px;
        }
        .badge-pending { background: #ffc107; color: #fff; }
        .badge-proses { background: #17a2b8; color: #fff; }
        .badge-selesai { background: #28a745; color: #fff; }
        .badge-batal { background: #dc3545; color: #fff; }
        .table-responsive { margin-top: 18px; }
        .table th, .table td { vertical-align: middle !important; }
    </style>
</head>
<body>
    <div class="pesanan-box">
        <h2 class="pesanan-title">Kelola Pesanan & Konfirmasi Pembayaran</h2>
        <div class="pesanan-desc">
            Halaman ini digunakan untuk <b>mengelola pesanan pelanggan</b> dan <b>memverifikasi konfirmasi pembayaran</b>.<br>
            Admin dapat mengubah status pesanan, menghapus pesanan, dan melihat bukti transfer pembayaran.
        </div>
        <div class="section-box">
            <h4 class="mb-2">Daftar Pesanan</h4>
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
                        <?php if(empty($pesanan)): ?>
                        <tr><td colspan="9" class="text-center text-muted">Belum ada pesanan.</td></tr>
                        <?php else: foreach($pesanan as $p): ?>
                        <tr>
                            <td><?php echo $p['pesanan_id']; ?></td>
                            <td><?php echo $p['user_id']; ?></td>
                            <td><?php echo $p['tanggal']; ?></td>
                            <td>
                                <?php
                                    $badge = 'badge-pending';
                                    if($p['status']=='proses') $badge='badge-proses';
                                    elseif($p['status']=='selesai') $badge='badge-selesai';
                                    elseif($p['status']=='batal') $badge='badge-batal';
                                ?>
                                <span class="badge badge-status <?php echo $badge; ?>"><?php echo ucfirst($p['status']); ?></span>
                            </td>
                            <td><?php echo $p['kota_id']; ?></td>
                            <td><?php echo $p['nama_penerima']; ?></td>
                            <td><?php echo $p['alamat']; ?></td>
                            <td><?php echo $p['nomor_telp']; ?></td>
                            <td>
                                <?php if($p['status'] != 'selesai'): ?>
                                    <a href="<?php echo site_url('pesanan/konfirmasi/'.$p['pesanan_id']); ?>" class="btn btn-sm btn-orange" title="Konfirmasi pesanan"><i class="bi bi-check-circle"></i></a>
                                <?php endif; ?>
                                <a href="<?php echo site_url('pesanan/hapus/'.$p['pesanan_id']); ?>" class="btn btn-sm btn-danger" title="Hapus pesanan" onclick="return confirm('Yakin hapus pesanan?')"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="section-box">
            <h4 class="mb-2">Daftar Konfirmasi Pembayaran</h4>
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
        </div>
        <a href="<?php echo site_url('admin/dashboard'); ?>" class="btn btn-secondary mt-3"><i class="bi bi-arrow-left"></i> Kembali ke Dashboard</a>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 