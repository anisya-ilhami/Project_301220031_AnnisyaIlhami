<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Banner - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { background: #fff8f0; }
        .banner-box {
            max-width: 800px;
            margin: 40px auto;
            border-radius: 14px;
            box-shadow: 0 2px 12px #ffa50022;
            background: #fff;
            padding: 32px 25px;
        }
        .banner-title {
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
        .img-thumb { max-width: 80px; max-height: 60px; border-radius: 6px; }
    </style>
</head>
<body>
    <div class="banner-box">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="banner-title mb-0">Kelola Banner</h2>
            <button class="btn btn-orange" data-toggle="modal" data-target="#modalTambah"><i class="bi bi-plus-circle"></i> Tambah Banner</button>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-hover bg-white">
                <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>Judul</th>
                        <th>Gambar</th>
                        <th>Link</th>
                        <th>Status</th>
                        <th style="width:120px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($banner as $b): ?>
                    <tr>
                        <td><?php echo $b['banner_id']; ?></td>
                        <td><?php echo $b['banner']; ?></td>
                        <td>
                            <?php if($b['gambar']): ?>
                                <img src="<?php echo $b['gambar']; ?>" class="img-thumb" alt="Gambar Banner">
                            <?php else: ?>
                                <span class="text-muted">-</span>
                            <?php endif; ?>
                        </td>
                        <td><?php echo $b['link']; ?></td>
                        <td><?php echo $b['status']; ?></td>
                        <td>
                            <a href="<?php echo site_url('banner/edit/'.$b['banner_id']); ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                            <a href="<?php echo site_url('banner/hapus/'.$b['banner_id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus banner?')"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <a href="<?php echo site_url('admin/dashboard'); ?>" class="btn btn-secondary mt-3"><i class="bi bi-arrow-left"></i> Kembali ke Dashboard</a>
    </div>

    <!-- Modal Tambah Banner -->
    <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modalTambahLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form method="post" action="<?php echo site_url('banner/tambah'); ?>">
            <div class="modal-header">
              <h5 class="modal-title" id="modalTambahLabel">Tambah Banner</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label>Judul Banner</label>
                <input type="text" name="banner" class="form-control" required>
              </div>
              <div class="form-group">
                <label>URL Gambar</label>
                <input type="text" name="gambar" class="form-control">
              </div>
              <div class="form-group">
                <label>Link</label>
                <input type="text" name="link" class="form-control">
              </div>
              <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control">
                  <option value="ON">Aktif</option>
                  <option value="OFF">Nonaktif</option>
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