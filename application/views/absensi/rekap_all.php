<div class="row mb-2">
    <h4 class="col-xs-12 col-sm-6 mt-0">Detail Absen</h4>
	<div class="d-inline ml-auto float-right">			
    <a href="<?=is_level('Manager')?base_url('absensi/filter_divisi/').$divisi->id_divisi:base_url('dashboard')?>" class="btn btn-success btn-sm" type="button" ><i class="fa fa-chevron-left"></i>  <strong>Kembali</strong><br /></a>  </div>
    <div class="col-xs-12 col-sm-6 ml-auto text-right">
	
	
    <form action="" method="get">
            <div class="row">
				
                <div class="col">
                    <select name="bulan" id="bulan" class="form-control-sm">
                        <option value="" disabled selected>-- Pilih Bulan --</option>
                        <?php foreach($all_bulan as $bn => $bt): ?>
                            <option value="<?= $bn ?>" <?= ($bn == $bulan) ? 'selected' : '' ?>><?= $bt ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col">
                    <select name="tahun" id="tahun" class="form-control-sm">
                        <option value="" disabled selected>-- Pilih Tahun</option>
                        <?php for($i = date('Y'); $i >= (date('Y') - 5); $i--): ?>
                            <option value="<?= $i ?>" <?= ($i == $tahun) ? 'selected' : '' ?>><?= $i ?></option>
                        <?php endfor; ?>
                    </select>
                </div>
                <div class="col ">
                    <button type="submit" class="btn btn-primary btn-fill btn-block btn-sm">Tampilkan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header border-bottom">
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <table class="table border-0">
                            <tr>
                                <td class="border-0 py-0">Divisi <?= $divisi->nama_divisi ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-xs-12 col-sm-6 ml-auto text-right mb-2">
                        <div class="dropdown d-inline">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="droprop-action" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-print"></i>
                                Export Laporan
                            </button>
                            <div class="dropdown-menu" aria-labelledby="droprop-action">
                                <a href="<?= base_url('absensi/export_pdf_divisi/' . $this->uri->segment(3) . "?bulan=$bulan&tahun=$tahun") ?>" class="dropdown-item" target="_blank"><i class="fa fa-file-pdf-o"></i> PDF</a>
                                <a href="<?= base_url('absensi/export_excel_all/' . $this->uri->segment(3) . "?bulan=$bulan&tahun=$tahun") ?>" class="dropdown-item" target="_blank"><i class="fa fa-file-excel-o"></i> Excel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
            <div class="card-body">
                <h4 class="card-title mb-4">Absen Bulan : <?= bulan($bulan) . ' ' . $tahun ?></h4>
                <table class="table table-striped table-bordered" style="font-size: 10px;" width="100%">
                    <thead>
                        <td rowspan="2">No</td>
                        <td rowspan="2">Nama</td>
                        <?php foreach($hari as $i => $h): ?>
                        <td colspan="2"><?=$h['tgl']?></td>
                        <?php endforeach; ?>
                    </thead>
                    <thead>
                        <td></td>
                        <td></td>
                        <?php foreach($hari as $i => $h): ?>
                        <td>Masuk</td>
                        <td>Pulang</td>
                        <?php endforeach; ?>
                    </thead>
                    <tbody>
                        <?php foreach($karyawan as $i => $k): ?>
                            <tr>
                                <td><?= ($i+1) ?></td>
                                <td><?= $k->nama ?></td>
                                <?php foreach($hari as $i => $h): ?>
                                <?php
                                    //cek hari absensi dengan hari ini
                                    $CI =& get_instance();
                                    $CI->load->model('Absensi_model', 'absensi');

                                    $absen = $CI->absensi->get_absen($k->id_user, $bulan, $tahun);
                                    $absen_harian = array_search($h['tgl'], array_column($absen, 'tgl')) !== false ? $absen[array_search($h['tgl'], array_column($absen, 'tgl'))] : '';
                                ?>
                                

                                <td width="20%" class="<?= is_weekend($h['tgl']) ? 'bg-dark text-white' : '' ?> <?=$absen_harian=='' ? 'bg-danger text-white' : '' ?>"><?= is_weekend($h['tgl']) ? 'Libur Akhir Pekan' : check_jam_baru(@$absen_harian['jam_masuk'], 'masuk') ?></td>
                                <td width="20%" class="<?= is_weekend($h['tgl']) ? 'bg-dark text-white' : '' ?> <?=$absen_harian=='' ? 'bg-danger text-white' : '' ?>"><?= is_weekend($h['tgl']) ? 'Libur Akhir Pekan' : check_jam_baru(@$absen_harian['jam_pulang'], 'pulang') ?></td>

                                    
                            <?php endforeach; ?>
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
