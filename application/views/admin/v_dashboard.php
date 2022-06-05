<!-- Pesan berhasil  -->
<div class="flash-data1" data-flashdata="<?= $this->session->flashdata('pesan'); ?>">
</div>

<div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Peserta Event Offline</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pendaftarOffline; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Peserta Event Zoom</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pendaftarOnlineZoom; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Peserta Event Youtube</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pendaftarOnlineYoutube; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>
<!-- Pesan berhasil  -->
<div class="flash-data1" data-flashdata="<?= $this->session->flashdata('pesan'); ?>">
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Riset</th>
                        <th>Event</th>

                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($mahasiswa as $key => $value) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $value['nama']; ?></td>
                            <td><?= $value['nim']; ?></td>
                            <td><?= $value['nama_riset_bidang']; ?></td>
                            <?php if ($value['id_event'] == 0) : ?>
                                <td> <span class="badge badge-danger">Belum Daftar</span>
                                </td>
                            <?php elseif ($value['id_event'] == 1) : ?>
                                <td> <span class="badge badge-success"><?= $value['nama_event']; ?></span>
                                </td>
                            <?php elseif ($value['id_event'] == 2) : ?>
                                <td> <span class="badge badge-info"><?= $value['nama_event']; ?></span>
                                <?php else : ?>
                                <td> <span class="badge badge-secondary"><?= $value['nama_event']; ?></span>

                                <?php endif; ?>
                                </td>

                                <td>
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#update<?= $value['nim']; ?>"><i class="fa fa-pen"></i></button>

                                </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php foreach ($mahasiswa as $key => $value) : ?>
    <!-- Modal -->
    <div class="modal fade" id="update<?= $value['nim']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <label for="exampleFormControlInput1">Nama </label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $value['nama']; ?>" readonly>
                    </div>
                    <?= form_open('admin/updateData/' . $value['nim']); ?>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Event </label>
                        <?php if ($value['id_event'] == 0) : ?>
                            <select class="form-control" id="exampleFormControlSelect1" name="id_event">
                                <option value="0">--Pilih Event--</option>
                                <?php foreach ($event as $e) : ?>
                                    <option value="<?= $e['id_event']; ?>"><?= $e['nama_event']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        <?php else : ?>
                            <select class="form-control" id="exampleFormControlSelect1" name="id_event">
                                <option value="0">--Pilih Event--</option>

                                <?php foreach ($event as $e) : ?>
                                    <option <?php if ($value['id_event'] == $e['id_event']) {
                                                echo 'selected';
                                            } ?> value="<?= $e['id_event']; ?> "><?= $e['nama_event']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        <?php endif; ?>

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