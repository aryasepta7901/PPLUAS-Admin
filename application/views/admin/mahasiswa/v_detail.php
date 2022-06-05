<!-- Pesan berhasil  -->
<div class="flash-data1" data-flashdata="<?= $this->session->flashdata('pesan'); ?>">
</div>


<div class="row">

    <div class="col-lg-5">

        <!-- Default Card Example -->
        <div class="card mb-4">
            <div class="card-header">
                Image
            </div>
            <div class="card-body text-center">
                <!-- Pesan eror -->
                <?php if ($this->session->flashdata('error')) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $this->session->flashdata('error');
                        ?>
                    </div>
                <?php endif; ?>
                <img src="<?= base_url('assets/mahasiswa/default.jpg'); ?>" width="200px" height="200px" alt="">
            </div>
        </div>
    </div>
    <div class="col-lg-7">
        <div class="card">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Nama: <?= $mahasiswa['nama']; ?></li>
                <li class="list-group-item">NIM : <?= $mahasiswa['nim']; ?></li>
                <li class="list-group-item">Riset : <?= $mahasiswa['nama_riset_bidang']; ?></li>
                <li class="list-group-item">Role : <?php if ($mahasiswa['level'] == '1') : ?>
                        <td>
                            <span class="badge badge-primary">Admin</span>
                        </td>
                    <?php else : ?>
                        <td>
                            <span class="badge badge-info">User</span>
                        </td>

                    <?php endif; ?>
                </li>
                <li class="list-group-item">
                    <a href="<?= base_url('mahasiswa'); ?>" type="button" class="btn btn-primary">Kembali</a>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Role Management</button>

                </li>
            </ul>
        </div>

    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Role Management</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <?= form_open('mahasiswa/detail/' . $mahasiswa['nim']) ?>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Nama</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $mahasiswa['nama']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Role</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="level">
                        <option <?php if ($mahasiswa['level'] == '1') {
                                    echo  "selected";
                                } ?> value="1">Admin</option>
                        <option <?php if ($mahasiswa['level'] == '0') {
                                    echo "selected";
                                } ?> value="0">User</option>

                    </select>
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