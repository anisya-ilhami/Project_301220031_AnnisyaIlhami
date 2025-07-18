<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Produk - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #fff8f0; }
        .produk-box {
            max-width: 900px;
            margin: 40px auto;
            border-radius: 10px;
            box-shadow: 0 0 10px #ffa50033;
            background: #fff;
            padding: 30px 25px;
        }
        .produk-title {
            color: #ffa500;
            font-weight: bold;
            margin-bottom: 30px;
        }
        .btn-orange {
            background: #ffa500;
            color: #fff;
        }
        .btn-orange:hover {
            background: #ff8800;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="produk-box">
        <h2 class="produk-title text-center">Kelola Produk</h2>
        <a href="<?php echo site_url('produk/tambah'); ?>" class="btn btn-orange mb-3">Tambah Produk</a>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Stok</th>
                    <th>Status</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
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
                    <td><?php echo $p['gambar']; ?></td>
                    <td>
                        <a href="<?php echo site_url('produk/edit/'.$p['barang_id']); ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="<?php echo site_url('produk/hapus/'.$p['barang_id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus produk?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="<?php echo site_url('admin/dashboard'); ?>" class="btn btn-secondary mt-3">Kembali ke Dashboard</a>
    </div>
</body>
</html> 