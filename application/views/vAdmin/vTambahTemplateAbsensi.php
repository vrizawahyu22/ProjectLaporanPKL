<div class="ui two column centered grid">
	<div class="column">
		<div class="ui segment" style="border-radius: 1.285714rem">
			<h3 style="text-align: center;">
				<div class="ui icon">
					<i class="user icon"></i>
				Tambah Template Absensi PIC</div></h3>
				<div class="ui divider"></div>

				<form class="ui form" method="POST" action="<?php echo site_url('admin/validasitambahtemplate'); ?>">
					<div class="field">
						<label>Nama PIC</label>
						<select style="min-width: 10em;" class="ui selected dropdown" name="NIK">
							<?php foreach ($pic as $pic ) { ?>
							<?php if ($pic['Status'] == 'Enabled') { ?>
							<option value="<?php echo $pic['NIK']; ?>"><?php echo $pic['NamaPIC'] ; ?></option>
							<?php } ?>
							<?php } ?>
						</select>

					</div>
					
					<div class="field">
						<label>Shift</label>
						<select style="min-width: 10em;" class="ui selected dropdown" name="IDJadwal">
							<?php foreach ($jadwal as $jadwal) { ?>
							<option value="<?php echo $jadwal['IDJadwal'] ?>"><?php echo $jadwal['Shift'] ?></option>
							<?php } ?>
						</select>
					</div>

					<div class="field">
						<label>Hari</label>
						<select style="min-width: 10em;" class="ui selected dropdown" name="Hari">
							<option>Senin</option>
							<option>Selasa</option>
							<option>Rabu</option>
							<option>Kamis</option>
							<option>Jumat</option>
							<option>Sabtu</option>
							<option>Minggu</option>
						</select>
					</div>
					<div class="ui center aligned basic segment">
						<button class="ui right vertical blue button" tabindex="0">
							<i class="plus icon"></i>
							Tambah
						</button>
					</div>
				</form>

			</div>
		</div>
	</div>