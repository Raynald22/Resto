<div class="container-fluid">
    <h3><i class=" fas fa-edit"></i> DATA PESANAN</h3>

    <?php foreach ($pesanan as $psn) : ?>

        <form method="post" action="<?php echo base_url() . 'pelayan/pesanan/update' ?>">

            <div class="form-group">
                <label>No Meja</label>
                <input type="text" name="no_meja" class="form-control" value="<?php echo $psn->no_meja ?>">
            </div>

            <div class="form-group">
                <label>Nama Pesanan</label>
                <input type="hidden" name="id" class="form-control" value="<?php echo $psn->id ?>">
                <input type="text" name="nama" class="form-control" value="<?php echo $psn->nama ?>">
            </div>

            <div class="form-group">
                <label>Jumlah</label>
                <input type="text" name="jumlah" class="form-control" value="<?php echo $psn->jumlah ?>">
            </div>

            <div class="form-group">
                <label>Harga</label>
                <input type="text" name="harga" class="form-control" value="<?php echo $psn->harga ?>">
            </div>

            <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="status" value="<?php echo $psn->status ?>">
                    <option>Ready</option>
                    <option>Unavailable</option>
                </select>
            </div>
</div>

<button type="submit" class="btn btn-primary btn-sm"> Simpan </button>

</form>

<?php endforeach; ?>
</div>