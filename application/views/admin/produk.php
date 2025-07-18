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
            <button class="btn btn-orange" data-toggle="modal" data-target="#modalTambah"><i class="bi bi-plus-circle"></i> Tambah Produk</button>
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

    <!-- Modal Tambah Produk -->
    <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modalTambahLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form method="post" action="<?php echo site_url('produk/tambah'); ?>">
            <div class="modal-header">
              <h5 class="modal-title" id="modalTambahLabel">Tambah Produk</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label>Nama Produk</label>
                <input type="text" name="nama_barang" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Kategori ID</label>
                <input type="number" name="kategori_id" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Stok</label>
                <input type="number" name="stok" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control">
                  <option value="on">Aktif</option>
                  <option value="off">Nonaktif</option>
                </select>
              </div>
              <div class="form-group">
                <label>URL Gambar</label>
                <input type="text" name="gambar" class="form-control">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-orange">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 