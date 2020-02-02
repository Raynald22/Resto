<div class="container-fluid">
    <button class="btn btn sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_pesanan"><i class="fas fa-plus fa-sm"></i> Tambah Pesanan</button>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>NO MEJA</th>
            <th>NAMA MAKANAN</th>
            <th>JUMLAH</th>
            <th>HARGA</th>
            <th>STATUS</th>
            <th colspan="3">AKSI</th>
        </tr>

        <?php
        $no =  1;
        foreach ($pesanan as $psn) : ?>
            <tr>
                <td width="3"><?php echo "ERP", date('ymd'), "-", "00", $no++ ?></td>
                <td width="3"><?php echo $psn->no_meja ?></td>
                <td width="3"><?php echo $psn->nama ?></td>
                <td width="3"><?php echo $psn->jumlah ?></td>
                <td width="3"><?php echo $psn->harga ?></td>
                <td width="3">
                    <div class="btn btn-primary btn-sm"><?php echo $psn->status ?>
                </td>
</div>
<td width="3"><?php echo anchor('pelayan/pesanan/edit/' . $psn->id, '<div class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></div>') ?></td>
<td width="3"><?php echo anchor('pelayan/pesanan/hapus/' . $psn->id, '<div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></div>') ?></td>

<?php endforeach; ?>

</table>
</div>
<!-- Modal -->
<div class="modal fade" id="tambah_pesanan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pesanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url() . 'pelayan/pesanan/tambah_aksi'; ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>No Meja</label>
                        <input type="text" name="no_meja" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Nama Pesanan</label>
                        <input type="hidden" name="id_produk" class="form-control">
                        <select class="form-control" name="nama">
                            <option>Rendang</option>
                            <option>Nasi Uduk</option>
                            <option>Dendeng Goreng</option>
                            <option>Ayam Bakar</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Jumlah</label>
                        <input type="text" name="jumlah" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Harga</label>
                        <input type="text" name="harga" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
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