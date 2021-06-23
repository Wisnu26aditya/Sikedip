<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <div class="row">
        <div class="col-lg">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('messege'); ?>
            <a href="" class="btn btn-info mb-3" data-toggle="modal" data-target="#newReward"> Add New Reward</a>
            <div class="table-responsive">
                <table class="table table-striped table-bordered" style="width:100%" id="submenu">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Pegawai</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Jenis Reward</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($reward as $m) :
                            $reward_nama = $m['ms_nama'];
                            $reward_foto = $m['reward_foto'];
                            $reward_type   = $m['reward_type'];
                        ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $reward_nama; ?></td>
                                <td><?= $reward_foto; ?></td>
                                <?php if ($reward_type == 1) {
                                    echo '<td>Pegawai Terbaik</td>';
                                } elseif ($reward_type == 2) {
                                    echo '<td>Satpam Terbaik</td>';
                                } elseif ($reward_type == 3) {
                                    echo '<td>Petugas Kebersihan Terbaik</td>';
                                }
                                ?>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal add -->
<div class="modal fade" id="newReward" tabindex="-1" role="dialog" aria-labelledby="newRewardLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <form action="<?= base_url('reward/simpan'); ?>" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newRewardLabel">New Reward</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-auto">
                                <div class="form-group">
                                    <label>Nama Pegawai</label> <br />
                                    <select class="chosen-select form-control" id="nama" name="nama" class="form-control">
                                        <option disabled selected>Pilih</option>
                                        <?php
                                        foreach ($pegawai as $p) :
                                            $menu_nama = $p['ms_nama'];
                                            $menu_id = $p['ms_nip'];
                                        ?>
                                            <option value="<?= $menu_id; ?>"><?= $menu_id . ' - ' . $menu_nama; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Reward</label>
                                    <select id="jenis" name="jenis" class="form-control" required>
                                        <option disabled selected>Pilih</option>
                                        <option value="1">Pegawai Rajin</option>
                                        <option value="2">Security Terbaik</option>
                                        <option value="3">OB Terbaik</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</div>