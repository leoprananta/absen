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
                <table style="font-size:8px; border-color: rgba(0,0,255,0.25);" border="1" cellspacing="0">
                    <thead>
                        <tr>
                            <th  style="width: 8px;" rowspan="2">No</th>
                            <th rowspan="2" style="width:20px">Nama</th>
                            <?php
                            
                            $len = count($hari);
                            $firsthalf = array_slice($hari, 0, $len / 2);

                            foreach($firsthalf as $i => $h):
                            echo "<th colspan='2'>";
                            echo $h['tgl'];
                            echo "</th>";
                            endforeach;
                            
                            ?>
                        </tr>
                        <tr>
                        <?php
                            
                            $len = count($hari);
                            $firsthalf = array_slice($hari, 0, $len / 2);

                            foreach($firsthalf as $i => $h):
                            echo "<th>Masuk</th>";
                            echo "<th>Pulang</th>";
                            endforeach;
                            
                            ?>
                            
                    </thead>
                    <tbody>
                        <?php foreach($karyawan as $i => $k): ?>
                            <tr>
                                <td style="width: 8px;"><?= ($i+1) ?></td>
                                <td style="width: 20px;"><?= $k->nama ?></td>
                                <?php
                            
                                $len = count($hari);
                                $firsthalf = array_slice($hari, 0, $len / 2);

                                foreach($firsthalf as $i => $h):
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

                <br>
                <br>

                <table style="font-size:8px; border-color: rgba(0,0,255,0.25);" border="1" cellspacing="0">
                    <thead>
                        <tr>
                            <th  style="width: 8px;" rowspan="2">No</th>
                            <th rowspan="2" style="width:20px">Nama</th>
                            <?php
                            
                            $len = count($hari);
                            $secondhalf = array_slice($hari, $len / 2);

                            foreach($secondhalf as $i => $h):
                            echo "<th colspan='2'>";
                            echo $h['tgl'];
                            echo "</th>";
                            endforeach;
                            
                            ?>
                        </tr>
                        <tr>
                        <?php
                            
                            $len = count($hari);
                            $secondhalf = array_slice($hari, $len / 2);

                            foreach($secondhalf as $i => $h):
                            echo "<th>Masuk</th>";
                            echo "<th>Pulang</th>";
                            endforeach;
                            
                            ?>
                            
                    </thead>
                    <tbody>
                        <?php foreach($karyawan as $i => $k): ?>
                            <tr>
                                <td style="width: 8px;"><?= ($i+1) ?></td>
                                <td style="width: 20px;"><?= $k->nama ?></td>
                                <?php
                            
                                $len = count($hari);
                                $secondhalf = array_slice($hari, $len / 2);

                                foreach($secondhalf as $i => $h):

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

                <!-- <br>
                <br>

                <table style="font-size:8px; border-color: rgba(0,0,255,0.25);" border="1" cellspacing="0">
                    <thead>
                        <tr>
                            <td  style="width: 8px;" rowspan="2">No</td>
                            <td rowspan="2" style="width:20px">Nama</td>
                            <?php
                            
                            $len = count($hari);
                            $thirdhalf = array_slice($hari, 20, $len / 3);

                            foreach($thirdhalf as $i => $h):
                            echo "<td colspan='2'>";
                            echo $h['tgl'];
                            echo "</td>";
                            endforeach;
                            
                            ?>
                        </tr>
                        <tr>
                        <?php
                            
                            $len = count($hari);
                            $thirdhalf = array_slice($hari, 20, $len / 3);

                            foreach($thirdhalf as $i => $h):
                            echo "<td>Masuk</td>";
                            echo "<td>Pulang</td>";
                            endforeach;
                            
                            ?>
                            
                    </thead>
                    <tbody>
                        <?php foreach($karyawan as $i => $k): ?>
                            <tr>
                                <td style="width: 8px;"><?= ($i+1) ?></td>
                                <td style="width: 20px;"><?= $k->nama ?></td>
                                <?php
                            
                                $len = count($hari);
                                $thirdhalf = array_slice($hari, 20, $len / 3);

                                foreach($thirdhalf as $i => $h):

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
                </table> -->
            </div>
						<div class="row mx-5">
							<div class="col8">
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