<div class="container-fluid">
    <h3><i class=" fas fa-edit"></i> DATA USER</h3>

    <?php foreach ($user as $usr) : ?>

        <form method="post" action="<?php echo base_url() . 'admin/pegawai/update' ?>">

            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="name" class="form-control" value="<?php echo $usr->name ?>">
                <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="<?php echo $usr->email ?>">
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="hidden" name="id" class="form-control" value="<?php echo $usr->id ?>">
                <input type="text" name="password" class="form-control" value="<?php echo $usr->password ?>">
            </div>

            <div class="form-group">
                <label>Photo</label><br>
                <input type="file" name="image" class="form_control" value="<?php echo $usr->image ?>">
            </div>

            <button type="submit" class="btn btn-primary btn-sm"> Simpan </button>

        </form>

    <?php endforeach; ?>
</div>