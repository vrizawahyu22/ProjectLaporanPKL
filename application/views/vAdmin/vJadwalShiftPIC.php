<div class="ui three column centered grid">
<div class="column">
	<div class="ui segment" style="border-radius: 1.0rem">
		<h3 style="text-align: center;">
			<div class="ui icon">
	  		<i class="setting icon"></i>
			Jadwal Shift PIC</div></h3>
			<div class="ui divider"></div>
			<table class="ui compact celled table" id="mytable">
        <thead class="full-width" style="text-align: center; background-color: #dbedff">
          <tr>
            <th class="">Shift</th>
            <th class="">Jam</th>
            </tr>
        </thead>
        <tbody style="text-align: center;">
            <form method="POST" action="<?php echo site_url('admin/gantijadwal'); ?>">
            <?php $temp = 0; ?>
            <?php foreach ($jadwal as $jadwal) { ?>
                <tr>
                <td>
                    <?php echo $jadwal['Shift']; ?>
                    <input type="hidden" name="<?php echo 'IDJadwal'.$temp ?>" value="<?php echo $jadwal['IDJadwal']; ?>">
                </td>
                <td>
                    <div class="ui input">
                    <input type="text" name="<?php echo 'Jam'.$temp ?>" value="<?php echo $jadwal['Jam']; ?>" >
                </div>
                </td>
            </tr>
            <?php $temp = $temp + 1;
             } ?>
             <input type="hidden" name="temp" value="<?php echo $temp ?>">

        	

        </tbody>
        <tfoot class="full-width">
      <tr>

        <th colspan="2">

          <button class="ui right floated blue small button" style="margin-top: 5px;">
            <i class="save icon"></i>Simpan
          </button>
      </form>
          
        </th>

      </tr>
    </tfoot>
</table>
</div>
</div>
</div>