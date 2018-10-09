<?php $pic = [
	['Panji Nugroho' => ['jumlahcek' => 251, 'jabatan' => 80, 'checklist' => 100, 'masa kerja' => 40]]
	]; 
 
?>

<table>
	<tr>
		<th>PIC</th>
		<th>Nilai</th>
	</tr>

	<?php foreach ($pic as $key => $value){
		echo ?>
		<tr>
		
			<td>'. $key .'</td>
			<td>'. $value .'</td>
		<
	<?php } ?> 
		
	<?php endforeach ?>
</table>

