<div class="row">
    <div class="col-12">
        <div class="card">
        <div class="card-header">
                <h4 class="card-title float-left">Rekap Presensi</h4>
                <div class="d-inline ml-auto float-right">
                  <a href="<?= base_url('dashboard') ?>" class="btn btn-primary btn-sm" type="button" style="" ><i class="fa fa-chevron-left"></i><strong> Kembali</strong><br /></a>                  

                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        <?php foreach($divisi as $i => $k): ?>
                            <tr>
                                <td width="5%" style="text-align:center"><?= ($i+1) ?></td>
                                <td width="70%" ><?= $k->nama_divisi ?></td>
                                <td>
                                    <a href="<?= base_url('absensi/filter_divisi/' . $k->id_divisi) ?>" class="btn btn-primary btn-sm"><i class="fa fa-search"></i> Detail Karyawan</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>