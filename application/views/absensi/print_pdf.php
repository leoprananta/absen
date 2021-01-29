<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Absen <?= $karyawan->nama ?> bulan <?= bulan($bulan) . ', ' . $tahun ?></title>

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
                                <table class="table">
                                    <tr>
                                        <th class="border-0 py-0">Nama</th>
                                        <th class="border-0 py-0">:</th>
                                        <th class="border-0 py-0"><?= $karyawan->nama ?></th>
                                    </tr>
                                    <tr>
                                        <th class="border-0 py-0">Lokasi</th>
                                        <th class="border-0 py-0">:</th>
                                        <th class="border-0 py-0"><?= $karyawan->nama_divisi ?></th>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title mb-4">Absen Bulan : <?= bulan($bulan) . ' ' . $tahun ?></h5>
                            <table class="" width="100%" style="font-size:12px; border-color: rgba(0,0,255,0.25);" border="1" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Absen Masuk</th>
                                        <th>Jam Masuk</th>
                                        <th>Keterangan</th>
                                        <th>Absen Pulang</th>
                                        <th>Jam Pulang</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($hari as $i => $h): ?>
                                    <?php
                                        $absen_harian = array_search($h['tgl'], array_column($absen, 'tgl')) !== false ? $absen[array_search($h['tgl'], array_column($absen, 'tgl'))] : '';
                                    ?>
                                    <tr <?= (in_array($h['hari'], ['Sabtu', 'Minggu'])) ? '' : '' ?> >
                                         <td width="5%"><?= ($i+1) ?></td>
                                    <td width="15%"><?= $h['hari'] . ', ' . $h['tgl'] ?></td>
                                    <td width="20%"><?= is_weekend($h['tgl']) ? 'Libur Akhir Pekan' : check_jam_baru(@$absen_harian['jam_masuk'], 'masuk') ?></td>
									<td  style="text-align:center;">07.00</td>
									<td style="text-align:center;"><?=check_telat_baru(@$absen_harian['jam_masuk'], 'masuk')?></td>
                                    <td width="20%"><?= is_weekend($h['tgl']) ? 'Libur Akhir Pekan' : check_jam_baru(@$absen_harian['jam_pulang'], 'pulang') 
									?></td>
									<td style="text-align:center;"> 15.15 </td>
									<td style="text-align:center;"><?=check_telat_baru(@$absen_harian['jam_pulang'], 'pulang')?></td>
                                    </tr>
                                <?php endforeach; ?>
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