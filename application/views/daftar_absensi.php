<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-success" style="">
                <p class="card-title text-center h1 text-white-50">Lokasi Karyawan</p>
				<a href="<?= base_url('dashboard') ?>" class="d-inline float-right btn btn-primary btn-sm" type="button"  ><i class="fa fa-chevron-left"></i><strong class="text-white">Kembali</strong><br /></a>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <th >No</th>
                        <th  >Nama</th>
                        <th >Aksi</th>
                    </thead>
                    <tbody>
                        <?php foreach($divisi as $i => $k): ?>
                            <tr>
                                <td width="5%" style="text-align:center"><?= ($i+1) ?></td>
                                <td width="70%" ><?= $k->nama_divisi ?></td>
                                <td style="text-align:center">
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