<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Absen Harian</h4>
				<div class="d-inline ml-auto float-right">			<a href="<?=base_url('dashboard')?>" class="btn btn-success btn-sm" type="button" ><i class="fa fa-chevron-left"></i>  <strong>Kembali</strong><br /></a>  </div>
            </div>
            <div class="card-body">
                <table class="table w-100">
                    <thead>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th>Absen Masuk</th>
                        <th>Absen Pulang</th>
                    </thead>
                    <tbody>
                        <tr>
                            <?php if(is_weekend()): 
								//if(false):
							?>
                                <td class="bg-light text-danger" colspan="4">Hari ini libur. Tidak Perlu absen</td>
                            <?php else: ?>
                                <td><i class="fa fa-3x fa-<?= ($absen < 2) ? "warning text-warning" : "check-circle-o text-success" ?>"></i></td>
                                <td><?= tgl_hari(date('d-m-Y')) ?></td>
                                <td >
									
                                    <a href="<?= base_url('absensi/absen/masuk') ?>" <?=($absen==1||$absen>=2)?"hidden":""?> class="btn btn-primary btn-sm btn-fill"<?= ($absen == 1) ? 'disabled style="cursor:not-allowed"' : '' ?>>Absen Masuk</a>
                                </td>
                                <td>
                                    <a href="<?= base_url('absensi/absen/pulang') ?>"  <?=($absen==0||$absen>=2)?"hidden":""?> class="btn btn-success btn-sm btn-fill"<?= ($absen !== 1 || $absen == 2) ? 'disabled style="cursor:not-allowed"' : '' ?>>Absen Pulang</a>
                                </td>
                            <?php endif; ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>