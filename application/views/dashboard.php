<div class=" text-White">
    <h2 class="my-0 text-center mt-5">Selamat datang di Aplikasi absensi Kontrak Dinas Kebudayaan dan Pariwisata Kabupaten Kudus</h4>
</div>
<?php if(is_level('Manager')): ?>

		<div class="text-center mt-5">
                  <a href="<?= base_url('user') ?>" class="btn btn-primary ml-2 ml-2 pl-0 pr-0" style="width:148px;height:148px"><i class="nc-icon nc-circle-09 mx auto d-inline" style="font-size:100px"></i><br/>
				  Edit Profil</a>
				  <a href="<?= base_url('jam') ?>" class="btn btn-primary ml-2 ml-2 pl-0 pr-0" style="width:148px;height:148px"><i class="nc-icon nc-time-alarm" style="font-size:100px"></i><br/>
				  Jam Kerja</a>
					<a href="<?= base_url('divisi') ?>" class="btn btn-primary ml-2 ml-2 pl-0 pr-0" style="width:148px;height:148px"><i class="nc-icon nc-bag" style="font-size:100px"></i><br/>
				  Divisi</a>
				  <a href="<?= base_url('karyawan') ?>" class="btn btn-primary ml-2 ml-2 pl-0 pr-0" style="width:148px;height:148px"><i class="nc-icon nc-circle-09" style="font-size:100px"></i><br/>
				  Daftar Karyawan</a>
				  <a href="<?= base_url('daftar_absensi') ?>" class="btn btn-primary ml-2 ml-2 pl-0 pr-0" style="width:148px;height:148px"><i class="nc-icon nc-notes mx auto d-inline" style="font-size:100px"></i><br/>
				  Absensi Karyawan</a>
				  
		</div>
<?php else: ?>
<?php endif; ?>