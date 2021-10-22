<div class="container-fluid">
    <h1 class="my-4"><span class="fas fa-user-check mr-2"></span>Kinerja Pegawai</h1>
    <div class="card mb-4">
        <div class="card-header">
            <div class="float-right d-inline">
                <div class="btn btn-primary" id="refresh-tabel-kinerja"><span class="fas fa-sync-alt mr-1"></span>Refresh Tabel</div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered dashboard" id="listkinerjaku" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nama Pegawai</th>
                            <th>Waktu</th>
                            <th>Mengerjakan</th>
                            <!-- <th>Aksi</th> -->
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nama Pegawai</th>
                            <th>Waktu</th>
                            <th>Mengerjakan</th>
                            <!-- <th>Aksi</th> -->
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i = 1;
                        foreach ($kinerjaku as $k): ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $k->tgl_kinerja ?></td>
                            <td><?= $k->nama_pegawai ?></td>
                            <td><?= $k->jam_mulai ?></td>
                            <td><?= $k->mengerjakan ?></td>
                            <!-- <td><div class="btn-group btn-small " style="text-align: right;">
                                <button class="btn btn-primary detail-absen" data-absen-id="<?= $k->id_kinerja ?>" title="Lihat Kinerja"><span class="fas fa-fw fa-address-card"></span></button>
                                </div>
                            </td> -->
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal View Absen -->
<div class="modal fade" id="viewkinerjamodal" tabindex="-1" role="dialog" aria-labelledby="viewkinerjamodal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="viewkinerjamodallabel"><span class="fas fa-clock mr-1"></span>Preview Kinerja</h5>
            </div>
            <div class="modal-body">
                <div id="viewdatakinerja"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal"><span class="fas fa-times mr-1"></span>Tutup</button>
            </div>
        </div>
    </div>
</div>