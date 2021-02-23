<div class=" text-White">
    <h2 class="my-0 text-center mt-5">Selamat datang di Aplikasi Presensi Kontrak Dinas Kebudayaan dan Pariwisata Kabupaten Kudus</h4>
</div>
<?php if(is_level('Manager')): ?>

		<div class="text-center mt-5">
                  <!-- <a href="<?//= base_url('user') ?>" class="btn ml-2 ml-2 pl-0 pr-0" style="width:148px;height:148px; background-color:white; color:#333333;"><i class="nc-icon nc-circle-09 mx auto d-inline" style="font-size:90px;"></i><br/>
				  	<b style="font-size: 16px;">Edit Profil</b></a> -->
				  <!-- <a href="<?//= base_url('jam') ?>" class="btn ml-2 ml-2 pl-0 pr-0" style="width:148px;height:148px; background-color:white; color:#333333;"><i class="nc-icon nc-time-alarm" style="font-size:90px"></i><br/>
				  	<b style="font-size: 16px;">Jam Kerja</b></a> -->
				  <a href="<?= base_url('divisi') ?>" class="ml-5 btn ml-2 ml-2 pl-0 pr-0" style="width:148px;height:148px; background-color:white; color:#333333;"><i class="nc-icon nc-bag" style="font-size:90px"></i><br/>
					<b style="font-size: 16px;">Lokasi</b></a>
				  <a href="<?= base_url('karyawan') ?>" class="ml-5 btn ml-2 ml-2 pl-0 pr-0" style="width:148px;height:148px; background-color:white; color:#333333;"><i class="nc-icon nc-circle-09" style="font-size:90px"></i><br/>
				  	<b style="font-size: 16px;">Karyawan</b></a>
				  <a href="<?= base_url('daftar_absensi') ?>" class="ml-5 btn ml-2 ml-2 pl-0 pr-0" style="width:148px;height:148px; background-color:white; color:#333333;"><i class="nc-icon nc-notes mx auto d-inline" style="font-size:90px"></i><br/>
				  <b style="font-size: 16px;">Presensi</b></a>
				  
		</div>
<?php else: ?>
<?php endif; ?>