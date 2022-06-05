<!-- Pesan berhasil  -->
<div class="flash-data1" data-flashdata="<?= $this->session->flashdata('pesan'); ?>">
</div>
<!-- Pesan Error  -->
<div class="flash-data2" data-flashdata="<?= $this->session->flashdata('error'); ?>">
</div>

<div class="row">


    <div class="col-lg-12">
        <div class="card">

            <ul class="list-group list-group-flush">
                <li class="list-group-item">Event: <?= $event['nama_event']; ?></li>
                <li class="list-group-item">Kuota: <span class="badge badge-info"><?= $event['kuota']; ?></span> Orang</li>
                <li class="list-group-item">Tempat: <?= $event['tempat']; ?></li>
                <?php if ($event['link_zoom'] != '-') : ?>
                    <li class="list-group-item">Link: <a href="<?= $event['link_zoom']; ?>">Ini Link</a></li>

                <?php endif; ?>
                <li class="list-group-item">Absensi Awal: <?= $event['kode_satu']; ?></li>
                <li class="list-group-item">Absensi Akhir: <?= $event['kode_dua']; ?></li>


                <li class="list-group-item">
                    <a href="<?= base_url('event'); ?>" type="button" class="btn btn-primary">Kembali</a>

                </li>
            </ul>
        </div>

    </div>
</div>


<!-- DataTales Example -->
<div class="card shadow mb-4 mt-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Absensi Peserta</h6>
    </div>
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Keterangan</th>
                        <th>Tingkat Kehadiran</th>
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
                            <td class="text-center">
                                <?php if ($value['absen_awal'] != 0) : ?>
                                    <span class="badge badge-success">Hadir</span>

                                <?php else : ?>
                                    <span class="badge badge-danger">Tidak Hadir</span>
                                <?php endif; ?>

                            </td>
                            <td class="text-center">
                                <?php
                                $nilai = 0;
                                if ($value['absen_awal'] != 0) {
                                    $nilai = 50;
                                    if ($value['absen_akhir'] != 0) {
                                        $nilai = 100;
                                    }
                                } ?>
                                <span class="badge badge-info"><?= $nilai; ?>%</span>

                            </td>

                            <td>
                                <?php if ($value['absen_awal'] == 0) : ?>
                                    <button data-toggle="modal" data-target="#updateAbsenAwal<?= $value['nim']; ?>" type="button" class="btn btn-info">Absen Awal</a>
                                    <?php elseif ($value['absen_akhir'] == 0) : ?>
                                        <button data-toggle="modal" data-target="#updateAbsenAkhir<?= $value['nim']; ?>" class="btn btn-warning">Absen Akhir</button>
                                    <?php else : ?>
                                        <button class="badge badge-info"><i class="fa fa-check"></i></button>
                                    <?php endif; ?>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Modal Absen pertama -->

<?php foreach ($mahasiswa as $key => $value) : ?>
    <div class="modal fade" id="updateAbsenAwal<?= $value['nim']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Absen Awal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <?= form_open('event/updateDataMahasiswaAbsen1/' .  $event['id_event'] . '/' . $value['nim']) ?>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nama</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $value['nama']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Kode Absen Awal</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="absen_awal">
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

<!-- Absen Kedua -->
<?php foreach ($mahasiswa as $key => $value) : ?>
    <div class="modal fade" id="updateAbsenAkhir<?= $value['nim']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Absen Akhir</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <?= form_open('event/updateDataMahasiswaAbsen2/' .  $event['id_event'] . '/' . $value['nim']) ?>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nama</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $value['nama']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Kode Absen Akhir</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="absen_akhir">
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