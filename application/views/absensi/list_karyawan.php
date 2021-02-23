<div class="row">
    <div class="col-12">
        <div class="card">
        <div class="card-header">
                <h4 class="card-title float-left">Lokasi Karyawan</h4>
                <div class="d-inline ml-auto float-right">
                    <a href="<?= base_url('daftar_absensi') ?>" class="btn btn-primary btn-sm" type="button" style="" ><i class="fa fa-chevron-left"></i><strong> Kembali</strong><br /></a>                  
                    <a href="<?= base_url('absensi/rekapall/' . $divisi) ?>" class="btn btn-success btn-sm" type="button" style="text-align:right;" ><i class="fa fa-file-text"></i><strong>Rekap</strong><br /></a>

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
                        <?php foreach($karyawan as $i => $k): ?>
                            <tr>
                                <td><?= ($i+1) ?></td>
                                <td><?= $k->nama ?></td>
                                <td>
                                    <a href="<?= base_url('absensi/detail_absensi/' . $k->id_user) ?>" class="btn btn-primary btn-sm"><i class="fa fa-search"></i> Detail</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
						
						<?php 
						if($karyawan == NULL){
							echo "<tr><td colspan='3' class='text-center'>";
							echo "Data Kosong";
							echo "</td></tr>";
						}
						?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>