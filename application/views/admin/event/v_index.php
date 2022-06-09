<!-- Pesan berhasil  -->
<div class="flash-data1" data-flashdata="<?= $this->session->flashdata('pesan'); ?>">
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="<?= base_url('event/addData'); ?>" type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add Event</a>
    </div>
    <div class="card-body">
        <!-- Pesan eror -->
        <?php if (validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
                <?= validation_errors(); ?>
            </div>
        <?php endif; ?>

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Event</th>
                        <th>Tempat</th>
                        <th>Kuota Peserta</th>
                        <th>Action</th>

                    </tr>

                </thead>

                <tbody>
                    <?php
                    $no = 1;
                    foreach ($event as $key => $value) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $value['nama_event']; ?></td>
                            <td><?= $value['tempat']; ?></td>
                            <td class="text-center"> <span class="badge badge-info"><?= $value['kuota']; ?></span></td>
                            <td>
                                <a href="<?= base_url('event/detail/' . $value['id_event']); ?>" type="button" class="btn btn-success"><i class="fa fa-eye"></i></a>
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#updateData<?= $value['id_event']; ?>"><i class="fa fa-pen"></i></button>

                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php foreach ($event as $key => $value) : ?>
    <!-- Modal -->
    <div class="modal fade" id="updateData<?= $value['id_event']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nama Event</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $value['nama_event']; ?>" readonly>
                    </div>
                    <?= form_open('event/updateData/' . $value['id_event']); ?>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Kuota Peserta</label>
                        <input type="number" name="kuota" class="form-control" id="exampleFormControlInput1" value="<?= $value['kuota']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Waktu Mulai</label>
                        <input type="datetime-local" class="form-control" name="waktu_mulai" value="<?= date('Y-m-d\TH:i', strtotime($value['waktu_mulai'])); ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Waktu selesai</label>
                        <input type="datetime-local" class="form-control" name="waktu_selesai" value="<?= date('Y-m-d\TH:i', strtotime($value['waktu_selesai'])); ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Link</label>
                        <input type="text" name="link_zoom" class="form-control" id="exampleFormControlInput1" value="<?= $value['link_zoom']; ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>