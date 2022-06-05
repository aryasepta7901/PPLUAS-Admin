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
                        <th>Kelas</th>
                        <th>Riset</th>
                        <th>Role</th>
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
                            <td><?= $value['kelas']; ?></td>
                            <td><?= $value['nama_riset_bidang']; ?></td>
                            <?php if ($value['level'] == '1') : ?>
                                <td>
                                    <span class="badge badge-primary">Admin</span>
                                </td>
                            <?php else : ?>
                                <td>
                                    <span class="badge badge-info">User</span>
                                </td>

                            <?php endif; ?>

                            <td>
                                <a href="<?= base_url('mahasiswa/detail/' . $value['nim']); ?>" type="button" class="btn btn-success"><i class="fa fa-eye"></i></a>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>