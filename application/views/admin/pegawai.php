<div class="site-section bg-light" id="about-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h1 class="h3 mb-0 text-gray-800">DATA USER</h1>
            </div>
            <div class="row text-center mt-3">

                <?php foreach ($user as $usr) : ?>

                    <div class="card ml-3 mb-3" style="width: 16rem;">
                        <img src="<?php echo base_url() . 'assets/img/' . $usr->image  ?>">
                        <div class="card-body mb-3 mr-3 mx-3">
                            <h5 class="card-title mb-1"><?= $usr->name ?></h5>
                            <small><?= $usr->email ?></small><br>
                            <small><?= $usr->date_created ?></small><br>
                            <?php echo anchor('admin/pegawai/edit/' . $usr->id, '<div class="btn btn-sm btn-primary">Edit</div>') ?>
                            <?php echo anchor('admin/pegawai/hapus/' . $usr->id, '<div class="btn btn-sm btn-danger">Hapus</div>') ?>

                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>