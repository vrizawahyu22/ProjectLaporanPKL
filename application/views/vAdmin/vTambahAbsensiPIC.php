<div class="ui two column centered grid">
	<div class="column">
		<div class="ui segment" style="border-radius: 1.285714rem">
			<h3 style="text-align: center;">
				<div class="ui icon">
					<i class="user icon"></i>
				Tambah Absensi PIC</div></h3>
				<div class="ui divider"></div>

				<form class="ui form" method="POST" action="<?php echo site_url('admin/validasitambahabsensi'); ?>">
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
						<label>Tanggal</label>
						<div class="ui input left icon">
						<i class="calendar icon"></i>
						<input type="date" name="Hari" value="<?php echo date('20y-m-d') ?>">
						</div>
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