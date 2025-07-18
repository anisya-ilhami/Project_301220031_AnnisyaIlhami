<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Produk - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { background: #fff8f0; }
        .produk-box {
            max-width: 1000px;
            margin: 40px auto;
            border-radius: 14px;
            box-shadow: 0 2px 12px #ffa50022;
            background: #fff;
            padding: 32px 25px;
        }
        .produk-title {
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
        .img-thumb { max-width: 60px; max-height: 60px; border-radius: 6px; }
    </style>
</head>
<body>
    <div class="produk-box">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="produk-title mb-0">Kelola Produk</h2>
            <a href="<?php echo site_url('produk/tambah'); ?>" class="btn btn-orange"><i class="bi bi-plus-circle"></i> Tambah Produk</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-hover bg-white">
                <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Stok</th>
                        <th>Status</th>
                        <th>Gambar</th>
                        <th style="width:120px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($produk as $p): ?>
                    <tr>
                        <td><?php echo $p['barang_id']; ?></td>
                        <td><?php echo $p['nama_barang']; ?></td>
                        <td><?php echo $p['kategori_id']; ?></td>
                        <td><?php echo $p['stok']; ?></td>
                        <td><?php echo $p['status']; ?></td>
                        <td>
                            <?php if($p['gambar']): ?>
                                <img src="<?php echo $p['gambar']; ?>" class="img-thumb" alt="Gambar Produk">
                            <?php else: ?>
                                <span class="text-muted">-</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="<?php echo site_url('produk/edit/'.$p['barang_id']); ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                            <a href="<?php echo site_url('produk/hapus/'.$p['barang_id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus produk?')"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <a href="<?php echo site_url('admin/dashboard'); ?>" class="btn btn-secondary mt-3"><i class="bi bi-arrow-left"></i> Kembali ke Dashboard</a>
    </div>
</body>
</html> 