<div class="container-fluid">
    <h3><i class=" fas fa-edit"></i> DATA PRODUK</h3>

    <?php foreach ($produk as $prd) : ?>

        <form method="post" action="<?php echo base_url() . 'admin/produk/update' ?>">

            <div class="form-group">
                <label>Nama produk</label>
                <input type="text" name="nama" class="form-control" value="<?php echo $prd->nama ?>">
            </div>

            <div class="form-group">
                <label>Kategori</label>
                <input type="hidden" name="id_produk" class="form-control" value="<?php echo $prd->id_produk ?>">
                <input type="text" name="kategori" class="form-control" value="<?php echo $prd->kategori ?>">
            </div>

            <div class="form-group">
                <label>Harga</label>
                <input type="text" name="harga" class="form-control" value="<?php echo $prd->harga ?>">
            </div>

            <div class="form-group">
                <label>Status</label>
                <input type="text" name="status" class="form-control" value="<?php echo $prd->status ?>">
            </div>

            <div class="form-group">
                <label>Gambar</label><br>
                <input type="file" name="gambar" class="form_control" value="<?php echo $prd->gambar ?>">
            </div>

            <button type="submit" class="btn btn-primary btn-sm"> Simpan </button>

        </form>

    <?php endforeach; ?>
</div>