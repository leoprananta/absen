<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Absen <?= $divisi->nama_divisi ?> bulan <?= bulan($bulan) . ', ' . $tahun ?></title>

    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
</head>
<body>
    <div class="row ">
        <div class="">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex">
                            <div class="float-left">
                                <table class="table border-0">
                                    <tr>
                                        <th class="border-0 py-0">Divisi</th>
                                        <th class="border-0 py-0">:</th>
                                        <th class="border-0 py-0"><?= $divisi->nama_divisi ?></th>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="card-body">
                <h4 class="card-title mb-4">Absen Bulan : <?= bulan($bulan) . ' ' . $tahun ?></h4>
                <table style="font-size:10px; border-color: rgba(0,0,255,0.25);" border="1" cellspacing="0">
                    <thead>
                        <tr>
                            <td  style="width: 8px;" rowspan="2">No</td>
                            <td rowspan="2" style="width:20px">Nama</td>
                            <?php foreach($hari as $i => $h): ?>
                            <td colspan="2"><?=$h['tgl']?></td>
                            <?php endforeach; ?>
                        </tr>
                        <tr>
                            <?php foreach($hari as $i => $h): ?>
                            <td>Masuk</td>
                            <td>Pulang</td>
                            <?php endforeach; ?>
                    </thead>
                    <tbody>
                        <?php foreach($karyawan as $i => $k): ?>
                            <tr>
                                <td style="width: 8px;"><?= ($i+1) ?></td>
                                <td style="width: 20px;"><?= $k->nama ?></td>
                                <?php foreach($hari as $i => $h): ?>
                                <?php
                                    //cek hari absensi dengan hari ini
                                    $CI =& get_instance();
                                    $CI->load->model('Absensi_model', 'absensi');

                                    $absen = $CI->absensi->get_absen($k->id_user, $bulan, $tahun);
                                    $absen_harian = array_search($h['tgl'], array_column($absen, 'tgl')) !== false ? $absen[array_search($h['tgl'], array_column($absen, 'tgl'))] : '';
                                ?>
                                <td width="20%"><?= is_weekend($h['tgl']) ? 'Libur Akhir Pekan' : check_jam_baru(@$absen_harian['jam_masuk'], 'masuk') ?></td>
                                <td width="20%"><?= is_weekend($h['tgl']) ? 'Libur Akhir Pekan' : check_jam_baru(@$absen_harian['jam_pulang'], 'pulang') ?></td>
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
						<div class="row mx-5">
							<div class="col8"/>
							<div class="col2" style="text-align:right">
							</div>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>