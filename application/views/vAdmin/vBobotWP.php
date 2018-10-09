<div class="ui three column centered grid">
<div class="column">
	<div class="ui segment" style="border-radius: 1.0rem">
		<h3 style="text-align: center;">
			<div class="ui icon">
	  		<i class="setting icon"></i>
			Bobot Weighted Product</div></h3>
			<div class="ui divider"></div>
			<table class="ui compact celled table">
        <thead class="full-width" style="text-align: center; background-color: #dbedff">
          <tr>
            <th class="">Kriteria Penilaian</th>
            <th class="">Bobot</th>
            </tr>
        </thead>
        <tbody style="text-align: center;">
        	<form method="POST" action="<?php echo site_url('admin/gantibobotwp'); ?>">
        	<?php $temp = 0; ?>
        	<?php foreach ($wp as $wp) { ?>
        		<tr>
        		<td>
        			<?php echo $wp['NamaParameter']; ?>
        			<input type="hidden" name="<?php echo 'IDParameter'.$temp ?>" value="<?php echo $wp['IDParameter']; ?>">
        		</td>
        		<td>
        			<div class="ui input">
        			<input type="number" step="0.01" name="<?php echo 'Bobot'.$temp ?>" value="<?php echo $wp['Bobot']; ?>" >
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