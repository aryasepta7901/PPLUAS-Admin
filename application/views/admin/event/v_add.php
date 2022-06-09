<div class="row">
    <div class="col-lg-6 mx-auto">
        <!-- Default Card Example -->
        <div class="card mb-4">
            <div class="card-body">

                <?= form_open('event/addData/'); ?>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Nama Event</label>
                    <input type="text" name="nama_event" class="form-control" id="exampleFormControlInput1" value="<?= set_value('nama_event'); ?>">
                    <small class="text-danger"><?= form_error('nama_event'); ?></small>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Kuota Peserta</label>
                    <input type="number" name="kuota" class="form-control" id="exampleFormControlInput1" value="<?= set_value('kuota'); ?>">
                    <small class="text-danger"><?= form_error('kuota'); ?></small>

                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Tempat</label>
                    <input type="text" name="tempat" class="form-control" id="exampleFormControlInput1" value="<?= set_value('tempat'); ?>">
                    <small class="text-danger"><?= form_error('tempat'); ?></small>

                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Waktu Mulai</label>
                            <input type="datetime-local" class="form-control" name="waktu_mulai" value="<?= set_value('waktu_mulai'); ?>">
                            <small class="text-danger"><?= form_error('waktu_mulai'); ?></small>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Waktu selesai</label>
                            <input type="datetime-local" class="form-control" name="waktu_selesai" value="<?= set_value('waktu_selesai'); ?>">
                            <small class="text-danger"><?= form_error('waktu_selesai'); ?></small>

                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Link</label>
                    <input type="text" name="link_zoom" class="form-control" id="exampleFormControlInput1" value="<?= set_value('link_zoom'); ?>">
                    <small class="text-danger"><?= form_error('link_zoom'); ?></small>

                </div>
            </div>
            <div class="card-footer">
                <a href="<?= base_url('event'); ?>" type="button" class="btn btn-secondary">Close</a>
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
            <?= form_close(); ?>

        </div>
    </div>
</div>