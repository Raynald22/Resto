<div class="container-fluid">
    <button class="btn btn sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_produk"><i class="fas fa-plus fa-sm"></i> Tambah produk</button>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>NAMA MAKANAN</th>
            <th>KATEGORI</th>
            <th>HARGA</th>
            <th>STATUS</th>
            <th>GAMBAR</th>
            <th colspan="3">AKSI</th>
        </tr>

        <?php
        $no = 1;
        foreach ($produk as $prd) : ?>
            <tr>
                <td width="3"><?php echo $no++ ?></td>
                <td width="3"><?php echo $prd->nama ?></td>
                <td width="3"><?php echo $prd->kategori ?></td>
                <td width="3"><?php echo $prd->harga ?></td>
                <td width="3">
                    <div class="btn btn-primary btn-sm"><?php echo $prd->status ?>
                </td>
</div>
<td width="3"><img src='<?= base_url() ?>assets/uploads/<?= $prd->gambar; ?>'></td>
<td width="3"><?php echo anchor('admin/produk/edit/' . $prd->id_produk, '<div class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></div>') ?></td>
<td width="3"><?php echo anchor('admin/produk/hapus/' . $prd->id_produk, '<div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></div>') ?></td>

<?php endforeach; ?>

</table>
</div>
<!-- Modal -->
<div class="modal fade" id="tambah_produk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url() . 'admin/produk/tambah_aksi'; ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nama produk</label>
                        <input type="text" name="nama" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Kategori</label>
                        <select class="form-control" name="kategori">
                            <option>Makanan</option>
                            <option>Minuman</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Harga</label>
                        <input type="text" name="harga" class="form-control">
                    </div>


                    <div class="form-group">
                        <label>Gambar</label><br>
                        <input type="file" name="gambar" class="form_control">
                    </div>

                    <div class="form-group">
                        <label>Kategori</label>
                        <select class="form-control" name="kategori">
                            <option>Ready</option>
                            <option>Unavailable</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>