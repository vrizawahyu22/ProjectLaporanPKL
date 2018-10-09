<?php
include_once("xlsxwriter.class.php");
ini_set('display_errors', 0);
ini_set('log_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);

$filename = "Report Checklist pada Tanggal ".$tanggalAwal." Sampai " .$tanggalAkhir.".xlsx";
header('Content-disposition: attachment; filename="'.XLSXWriter::sanitize_filename($filename).'"');
header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header('Content-Transfer-Encoding: binary');
header('Cache-Control: must-revalidate');
header('Pragma: public');


$writer = new XLSXWriter();
$writer->setAuthor('Anak Magang Universitas Brawijaya'); 

$font = array(['font-size'=>14, 'halign'=>'center'] );
$judul = array("Report Checklist pada Tanggal ".$tanggalAwal." Sampai " .$tanggalAkhir);
$subJudul = array("", "OK", "Bad", "Not Checked","Jumlah");
$status = array("Nama PIC","Status Checklist","","","Jumlah");

$writer->markMergedCell('Sheet1', $start_row = 0, $start_col = 0, $end_row = 0, $end_col = 6);
$writer->markMergedCell('Sheet1', $start_row = 2, $start_col = 0, $end_row = 3, $end_col = 0);
$writer->markMergedCell('Sheet1', $start_row = 2, $start_col = 1, $end_row = 2, $end_col = 3);
$writer->markMergedCell('Sheet1', $start_row = 2, $start_col = 4, $end_row = 3, $end_col = 4);
$writer->writeSheetRow('Sheet1', $judul, $font);
$writer->writeSheetRow('Sheet1', array());
$writer->writeSheetRow('Sheet1', $status, array(['font-size'=>11, 'font-style'=>'bold', 'fill'=>'#ccf', 'border'=>'left,right,top,bottom', 'halign'=>'center', 'valign'=>'center'],['font-size'=>11, 'font-style'=>'bold', 'fill'=>'#ccf', 'border'=>'left,right,top,bottom', 'halign'=>'center'],['font-size'=>11, 'font-style'=>'bold', 'fill'=>'#ccf', 'border'=>'left,right,top,bottom', 'halign'=>'center'],['font-size'=>11, 'font-style'=>'bold', 'fill'=>'#ccf', 'border'=>'left,right,top,bottom', 'halign'=>'center'],['font-size'=>11, 'font-style'=>'bold', 'fill'=>'#ccf', 'border'=>'left,right,top,bottom', 'halign'=>'center', 'valign'=>'center']));
$writer->writeSheetRow('Sheet1', $subJudul, array(['font-size'=>11, 'font-style'=>'bold', 'fill'=>'#ccf', 'border'=>'left,right,top,bottom', 'halign'=>'center'],['font-size'=>11, 'font-style'=>'bold', 'fill'=>'#ccf', 'border'=>'left,right,top,bottom', 'halign'=>'center'], ['font-size'=>11, 'font-style'=>'bold', 'fill'=>'#ccf', 'border'=>'left,right,top,bottom', 'halign'=>'center'], ['font-size'=>11, 'font-style'=>'bold', 'fill'=>'#ccf', 'border'=>'left,right,top,bottom', 'halign'=>'center'], ['font-size'=>11, 'font-style'=>'bold', 'fill'=>'#ccf', 'border'=>'left,right,top,bottom', 'halign'=>'center']));
for ($i=0; $i < count($export)-1; $i++) { 
	$writer->writeSheetRow('Sheet1', $export[$i], array(['font-size'=>11, 'border'=>'left,right,top,bottom'],['font-size'=>11, 'border'=>'left,right,top,bottom', 'halign'=>'center'], ['font-size'=>11, 'border'=>'left,right,top,bottom', 'halign'=>'center'], ['font-size'=>11, 'border'=>'left,right,top,bottom', 'halign'=>'center'], ['font-size'=>11, 'border'=>'left,right,top,bottom', 'halign'=>'center']));
}
$writer->writeSheetRow('Sheet1', $export[count($export)-1], array(['font-size'=>11, 'border'=>'left,right,top,bottom', 'font-style'=>'bold', 'fill'=>'#ccf'],['font-size'=>11, 'border'=>'left,right,top,bottom', 'halign'=>'center', 'font-style'=>'bold', 'fill'=>'#ccf'], ['font-size'=>11, 'border'=>'left,right,top,bottom', 'halign'=>'center', 'font-style'=>'bold', 'fill'=>'#ccf'], ['font-size'=>11, 'border'=>'left,right,top,bottom', 'halign'=>'center', 'font-style'=>'bold', 'fill'=>'#ccf'], ['font-size'=>11, 'border'=>'left,right,top,bottom', 'halign'=>'center', 'font-style'=>'bold', 'fill'=>'#ccf']));
$writer->writeToStdOut();

exit(0);


