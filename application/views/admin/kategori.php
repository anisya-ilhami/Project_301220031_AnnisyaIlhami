<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Kategori - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { background: #fff8f0; }
        .kategori-box {
            max-width: 700px;
            margin: 40px auto;
            border-radius: 14px;
            box-shadow: 0 2px 12px #ffa50022;
            background: #fff;
            padding: 32px 25px;
        }
        .kategori-title {
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
    <div class="kategori-box">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="kategori-title mb-0">Kelola Kategori</h2>
            <button class="btn btn-orange" data-toggle="modal" data-target="#modalTambah"><i class="bi bi-plus-circle"></i> Tambah Kategori</button>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-hover bg-white">
                <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Status</th>
                        <th style="width:120px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($kategori as $k): ?>
                    <tr>
                        <td><?php echo $k['kategori_id']; ?></td>
                        <td><?php echo $k['nama']; ?></td>
                        <td><?php echo $k['status']; ?></td>
                        <td>
                            <a href="<?php echo site_url('kategori/edit/'.$k['kategori_id']); ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                            <a href="<?php echo site_url('kategori/hapus/'.$k['kategori_id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus kategori?')"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <a href="<?php echo site_url('admin/dashboard'); ?>" class="btn btn-secondary mt-3"><i class="bi bi-arrow-left"></i> Kembali ke Dashboard</a>
    </div>

    <!-- Modal Tambah Kategori -->
    <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modalTambahLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form method="post" action="<?php echo site_url('kategori/tambah'); ?>">
            <div class="modal-header">
              <h5 class="modal-title" id="modalTambahLabel">Tambah Kategori</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label>Nama Kategori</label>
                <input type="text" name="nama" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control">
                  <option value="on">Aktif</option>
                  <option value="off">Nonaktif</option>
                </select>
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