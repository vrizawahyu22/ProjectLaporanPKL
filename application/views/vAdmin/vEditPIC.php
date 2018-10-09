<div class="ui two column centered grid">
	<div class="column">
		<div class="ui segment">
			<h3 style="text-align: center;">
				<div class="ui icon">
					<i class="user icon"></i>
				Edit PIC</h3>
				<div class="ui divider"></div>

				<form class="ui form" method="POST" action="<?php echo site_url('admin/validasieditpic'); ?>">
					<div class="field">
						<label>Nomor Induk Karyawan</label>
						<input type="hidden" name="Password" value="<?php echo $pic['Password']; ?>">
						<input type="text" name="" placeholder="Nomor Induk Karyawan" value="<?php echo $pic['NIK'] ?>" disabled>
						<input type="hidden" name="NIK" placeholder="Nomor Induk Karyawan" value="<?php echo $pic['NIK'] ?>" >
					</div>
					<div class="field">
						<label>Nama PIC</label>
						<input type="text" name="NamaPIC" placeholder="Nama PIC" value="<?php echo $pic['NamaPIC'] ?>">
					</div>
					<div class="field">
						<label>Divisi</label>
						<input type="text" name="Divisi" placeholder="Divisi" value="<?php echo $pic['Divisi'] ?>">
					</div>
					<div class="field">
						<label>Jabatan</label>
						<select style="min-width: 10em;" class="ui selected dropdown" name="Jabatan">
							<option value="<?php echo $pic['Jabatan'] ?>"><?php echo $pic['Jabatan'] ?></option>
							<option value="Chief Leader">Chief Leader</option>
							<option value="Staff">Staff</option>
						</select>
					</div>
					<div class="field">
						<label>Tahun Masuk PIC</label>
						<input type="text" name="TahunMasuk" placeholder="Tahun Masuk PIC" value="<?php echo $pic['TahunMasuk'] ?>">
					</div>


					<div class="ui center aligned basic segment">
						<button class="ui right vertical blue button" tabindex="0">
							<i class="check icon"></i>
							Simpan
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>