<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cPIC extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mPIC');
		$this->load->helper('url_helper');
		$this->load->library('session');

		date_default_timezone_set("Asia/Bangkok");
	}

	public function index()
	{
		$this->load->view('vPIC/vHomePIC');
		$this->load->view('vPIC/vFooterHomePIC');
	}

	public function validation()
	{
		$NIK = $this->input->post('NIK');
		$password = md5($this->input->post('Password'));

		$cek = $this->mPIC->getPIC($NIK, $password);

		if($cek !=NULL){
			$data_session = array(
				'NamaPIC' => $cek['NamaPIC'],
				'nik' => $NIK,
				'status' => "login"
			);

			$this->session->set_userdata($data_session);
			redirect(base_url("pic/beranda"));
		}
		else{
			$this->load->view('vPIC/vHomePIC.php');
			$this->load->view('vPIC/vError');
			$this->load->view('vPIC/vFooterHomePIC.php');
		}
	}

	public function keluar()
	{
		session_destroy();
		redirect(base_url("pic"));
	}

	public function lihatLog()
	{
		$data['judul'] = "Log Checklist";
		$tanggal = $this->input->post('tanggal');
		if ($tanggal == NULL) {
			$tanggal = date('20y-m-d');
		}

		$daftar_hari = array(
			'Sunday'    => 'Minggu',
			'Monday'    => 'Senin',
			'Tuesday'   => 'Selasa',
			'Wednesday' => 'Rabu',
			'Thursday'  => 'Kamis',
			'Friday'    => 'Jumat',
			'Saturday'  => 'Sabtu'
		);
		$namahari = date('l', strtotime($tanggal));

		$data['tanggal'] = $tanggal;
		$tanggal = $daftar_hari[$namahari].', '.$tanggal;
		$data['log']= $this->mPIC->getLogFromDate($tanggal);

		$this->load->view('vPIC/vTemplate/vHeaderPIC', $data);
		$this->load->view('vPIC/vBerandaPIC');
		$this->load->view('vPIC/vTemplate/vFooterPIC');
	}

	public function lihatChecklist($status = NULL)
	{
		$status = explode(".", $status);
		$data['status'] = $status[0];
		if ($data['status'] == NULL) {
			$data['status'] = 'Enabled';
		}

		$tanggal = $this->input->post('tanggal');

		if ($tanggal == NULL AND $status[0] == NULL) {
			$tanggal = date('20y-m-d');
		}
		else if($tanggal ==  NULL AND $status[0] != NULL){
			$tanggal = $status[1];
		}

		$daftar_hari = array(
			'Sunday'    => 'Minggu',
			'Monday'    => 'Senin',
			'Tuesday'   => 'Selasa',
			'Wednesday' => 'Rabu',
			'Thursday'  => 'Kamis',
			'Friday'    => 'Jumat',
			'Saturday'  => 'Sabtu'
		);
		$namahari = date('l', strtotime($tanggal));

		$data['tanggal'] = $tanggal;
		$tanggal = $daftar_hari[$namahari].', '.$tanggal;
		$data['judul'] = "Checklist";
		$data['checklist'] = $this->mPIC->getChecklist($tanggal);

		// echo json_encode($data['checklist']);
		for ($i=0; $i < count($data['checklist']); $i++) { 
			if ($data['checklist'][$i]['NIKP'] != '0' AND $data['checklist'][$i]['NIKP'] != NULL) {
				$picP = $this->mPIC->getDaftarPIC($data['checklist'][$i]['NIKP']);
				$data['picP'][$i]['NamaPIC'] = $picP['NamaPIC'];
				$data['picP'][$i]['NIK'] = $data['checklist'][$i]['NIKP'];
			}
			else{
				$data['picP'][$i]['NamaPIC'] = '0';
				$data['picP'][$i]['NIK'] = '0';
			}
		}

		$this->load->view('vPIC/vTemplate/vHeaderPIC', $data);
		$this->load->view('vPIC/vLihatChecklist');
		$this->load->view('vPIC/vTemplate/vFooterPIC');
	}

	public function jChecklist()
	{
		$tanggal = date('20y-m-d');

		$daftar_hari = array(
			'Sunday'    => 'Minggu',
			'Monday'    => 'Senin',
			'Tuesday'   => 'Selasa',
			'Wednesday' => 'Rabu',
			'Thursday'  => 'Kamis',
			'Friday'    => 'Jumat',
			'Saturday'  => 'Sabtu'
		);
		$namahari = date('l', strtotime($tanggal));

		$data['tanggal'] = $tanggal;
		$tanggal = $daftar_hari[$namahari].', '.$tanggal;
		$data = $this->mPIC->getChecklist($tanggal);
		header("Content-type:application/json");
		echo json_encode($data);
	}

	public function doChecklist()
	{
		// // header("Content-type:application/json");
		// // $data['log']= $this->mAdmin->getLog();
		// // echo json_encode($data);

		date_default_timezone_set('Asia/Jakarta');

		$NIK               = $this->input->post('NIK');
		$IDChecklist       = $this->input->post('IDChecklist');
		$IDC               = $this->input->post('IDC');
		$namaPIC           = $this->input->post('NamaPIC');
		$namaChecklist     = $this->input->post('NamaChecklist');
		$namaPICSebenarnya = $this->input->post('NamaPICSebenarnya');
		$jam               = $this->input->post('Jam');
		$info              = $this->input->post('Info');
		$status            = $this->input->post('Status');
		$keterangan        = $this->input->post('Keterangan');
		$hari              = $this->input->post('Hari');

		if (!empty($_FILES['buktiCek']['name'])) {
			$target_dir = "assets/Bukti/";
			$target_file = $target_dir .date('YmdHis').'_'. basename($_FILES["buktiCek"]["name"]);
			move_uploaded_file($_FILES["buktiCek"]["tmp_name"], $target_file);
		}
		else{
			$target_file = "-";
		}

		$lihat = array(
				'IDJadwalChecklist' => $IDChecklist
			);

		$lihatData = $this->mPIC->lihatDataLog('log', $lihat);

		if ($lihatData == NULL) {
			$data = array(
				'NamaPIC' => $namaPIC,
				'NamaChecklist' => $namaChecklist,
				'IDJadwalChecklist' => $IDChecklist,
				'PICCek' => $namaPICSebenarnya,
				'Jam' => $jam,
				'Info' => $info,
				'Status' => $status,
				'Keterangan' => $keterangan,
				'Hari' => $hari,
				'Bukti' => $target_file
			);
			$hasil = $this->mPIC->doChecklist('log', $data);

			//mengubah status checklist menjadi 1 supaya tidak bisa mengecek ulang
			$this->mPIC->ubahStatusCheck($IDChecklist, "1");

			//Menambahkan jumlah pengecekan pada PIC
			$this->mPIC->tambahJumlah($NIK, $IDC);
			echo "Checklist ".$namaChecklist." Sukses Dicek.";
		}
		else{
			echo "Checklist ".$namaChecklist." Gagal Dicek.";
		}
		// $name = basename($_FILES["buktiCek"]["name"]);
		// $lihat = array(
		// 	'Hari' => $hari,
		// 	'Jam' => $jam,
		// 	'NamaChecklist' => $namaChecklist
		// );

		// $lihatData = $this->mPIC->lihatDataLog('log', $lihat);
		// if ($lihatData != NULL) {
		// 	$tanggal = date("Y-m-d");
		// 	if (count($lihatData)== 1) {
		// 		// echo $tanggal;
		// 		// echo substr($lihatData[0]['Waktu'],0,10);
		// 		if ($tanggal != substr($lihatData[0]['Waktu'],0,10)) {
		// 			$data = array(
		// 				'NamaPIC' => $namaPIC,
		// 				'NamaChecklist' => $namaChecklist,
		// 				'PICCek' => $namaPICSebenarnya,
		// 				'Jam' => $jam,
		// 				'Info' => $info,
		// 				'Status' => $status,
		// 				'Keterangan' => $keterangan,
		// 				'Hari' => $hari
		// 			);
		// 			$hasil = $this->mPIC->doChecklist('log', $data);
		// 			//mengubah status checklist menjadi 1 supaya tidak bisa mengecek ulang
		// 			$this->mPIC->ubahStatusCheck($IDChecklist, "1");
		// 			// echo "JIKA DISINI MAKA DATANYA == 1 DAN DATANYA GA KEMBAR";
		// 		}
		// 	}
		// 	else{
		// 		$jumlah = 0;
		// 		foreach ($lihatData as $data) {
		// 			if ($tanggal == substr($lihatData[0]['Waktu'],0,10)) {
		// 				$jumlah = $jumlah + 1;
		// 			}
		// 		}
		// 		if ($jumlah == 0) {
		// 			$data = array(
		// 				'NamaPIC' => $namaPIC,
		// 				'NamaChecklist' => $namaChecklist,
		// 				'PICCek' => $namaPICSebenarnya,
		// 				'Jam' => $jam,
		// 				'Info' => $info,
		// 				'Status' => $status,
		// 				'Keterangan' => $keterangan,
		// 				'Hari' => $hari
		// 			);
		// 			$hasil = $this->mPIC->doChecklist('log', $data);
		// 			//mengubah status checklist menjadi 1 supaya tidak bisa mengecek ulang
		// 			$this->mPIC->ubahStatusCheck($IDChecklist, "1");
		// 		}
		// 		// echo "DATA LEBIH DARI 1, MAKA DATA AKAN DI CEK APAKAH ADA YANG SAMA";
		// 	}
		// }
		// else{
		// 	$data = array(
		// 		'NamaPIC' => $namaPIC,
		// 		'NamaChecklist' => $namaChecklist,
		// 		'PICCek' => $namaPICSebenarnya,
		// 		'Jam' => $jam,
		// 		'Info' => $info,
		// 		'Status' => $status,
		// 		'Keterangan' => $keterangan,
		// 		'Hari' => $hari
		// 	);
		// 	$hasil = $this->mPIC->doChecklist('log', $data);
		// 	//mengubah status checklist menjadi 1 supaya tidak bisa mengecek ulang
		// 	$this->mPIC->ubahStatusCheck($IDChecklist, "1");
		// 	echo "NULL COY";
		// }
		
		// // Menyimpan di notifikasi
		// $notif = array(
		// 	'ForN' => 'admin',
		// 	'Waktu' => date("l, d-m-Y h:i:s a"),
		// 	'Isi' => $namaPICSebenarnya .' telah mengecek ' . $namaChecklist,
		// 	'Status' => 'Belum'
		// );
		// $this->mPIC->notifikasi('notifikasi', $notif);

		// //Menambahkan jumlah pengecekan pada PIC
		// $this->mPIC->tambahJumlah($NIK, $IDChecklist);

		// echo "<script type='text/javascript'>
		// alert('Sukses Melakukan Pengecekan.');
		// window.location.href = '" . base_url() . "pic/checklist';
		// </script>";
	}

	public function noChecklist()
	{
		$statusCheck = $this->input->post('statusCheck');
		if ($statusCheck != '2') {
			date_default_timezone_set('Asia/Jakarta');

			$NIK = "-";
			$IDChecklist = $this->input->post('IDChecklist');
			$namaPIC = $this->input->post('NamaPIC');
			$namaPIC = str_replace("  ", "", $namaPIC);
			$namaChecklist = $this->input->post('NamaChecklist');
			$namaPICSebenarnya = "-";
			$jam = $this->input->post('Jam');
			$info = $this->input->post('Info');
			$status = "Not Checked";
			$keterangan = "-";
			$hari = $this->input->post('Hari');

			$lihat = array(
				'IDJadwalChecklist' => $IDChecklist
			);

			$lihatData = $this->mPIC->lihatDataLog('log', $lihat);

			if ($lihatData == NULL) {
				$data = array(
					'NamaPIC' => $namaPIC,
					'NamaChecklist' => $namaChecklist,
					'IDJadwalChecklist' => $IDChecklist,
					'PICCek' => $namaPICSebenarnya,
					'Jam' => $jam,
					'Info' => $info,
					'Status' => $status,
					'Keterangan' => $keterangan,
					'Hari' => $hari
				);
				$hasil = $this->mPIC->doChecklist('log', $data);
			}
			//mengubah status checklist menjadi 2 supaya tidak bisa mengecek ulang
			$this->mPIC->ubahStatusCheck($IDChecklist, "2");

			// 	//Menyimpan di notifikasi
			// 	$notif = array(
			// 		'ForN' => 'admin',
			// 		'Waktu' => date("l, d-m-Y h:i:s a"),
			// 		'Isi' => $namaChecklist. "Tidak Dicek",
			// 		'Status' => 'Belum'
			// 	);
			// 	$this->mPIC->notifikasi('notifikasi', $notif);
			// 	echo "2";
		}
	}

	public function daftarPIC()
	{
		$data['judul'] = "Daftar PIC";
		$data['pic'] = $this->mPIC->getDaftarPIC();

		// header("Content-type:application/json");
		// echo json_encode($data);
		$this->load->view('vPIC/vTemplate/vHeaderPIC', $data);
		$this->load->view('vPIC/vLihatPIC');
		$this->load->view('vPIC/vTemplate/vFooterPIC');

	}

	
	public function lihatAbsensi()
	{
  		function method1($a,$b) 
		{
			$first = explode(' ',$a['Hari']);
			$second = explode(' ',$b['Hari']);
		    return ($first[1] <= $second[1]) ? -1 : 1;
		}
		
		$data['judul'] = "Lihat Absensi";
		$data['absensi'] = $this->mPIC->getAbsensiPIC($_SESSION['nik']);
		usort($data['absensi'], "method1");

		for ($i=0; $i < count($data['absensi']); $i++) { 
			$bln = explode(' ', $data['absensi'][$i]['Hari']);
			$bln = explode('-', $bln[1]);
			$bulan[$i] = $bln[0].'-'.$bln[1];
		}

		for ($i = 0; $i < count($bulan); $i++) {
			$bln =explode('-', $bulan[$i]);
			switch ($bln[1]) {
		    case 1:
		        $bln[1] = 'Januari';
		        break;
		    case 2:
		        $bln[1] = 'Februari';
		        break;
		    case 3:
		        $bln[1] = 'Maret';
		        break;
		    case 4:
		        $bln[1] = 'April';
		        break;
		    case 5:
		        $bln[1] = 'Mei';
		        break;
		    case 6:
		        $bln[1] = 'Juni';
		        break;
		    case 7:
		        $bln[1] = 'Juli';
		        break;
		    case 8:
		        $bln[1] = 'Agustus';
		        break;
		    case 9:
		        $bln[1] = 'September';
		        break;
		    case 10:
		        $bln[1] = 'Oktober';
		        break;
		    case 11:
		        $bln[1] = 'November';
		        break;
		    case 12:
		        $bln[1] = 'Desember';
		        break;
			}

			$bulan[$i] = $bln[1].', '.$bln[0];
		}
		
		$bulan = array_unique($bulan);

		$input = $this->input->post('bulan');
		if ($input == NULL) {
			$input = $bulan[0];
		}
		$input = explode(', ', $input);

		switch ($input[0]) {
		    case 'Januari':
		        $input[0] = '01';
		        break;
		    case 'Februari':
		        $input[0] = '02';
		        break;
		    case 'Maret':
		        $input[0] = '03';
		        break;
		    case 'April':
		        $input[0] = '04';
		        break;
		    case 'Mei':
		        $input[0] = '05';
		        break;
		    case 'Juni':
		        $input[0] = '06';
		        break;
		    case 'Juli':
		        $input[0] = '07';
		        break;
		    case 'Agustus':
		        $input[0] = '08';
		        break;
		    case 'September':
		        $input[0] = '09';
		        break;
		    case 'Oktober':
		        $input[0] = '10';
		        break;
		    case 'November':
		        $input[0] = '11';
		        break;
		    case 'Desember':
		        $input[0] = '12';
		        break;
		}
		$hInput = $input[1].'-'.$input[0];
		$y = 0;
		for ($i=0; $i < count($data['absensi']); $i++) { 
			$b = explode(' ', $data['absensi'][$i]['Hari']);
			$bln = explode('-', $b[1]);
			if ($hInput == ($bln[0].'-'.$bln[1])) {
				$hasil[$y] = $data['absensi'][$i];
				$y++;
			}
		}

		$data['absensi'] = $hasil;
		$data['bulan'] = $bulan;
		$data['bulanini'] = $this->input->post('bulan');
		if ($data['bulanini']== NULL) {
			$data['bulanini'] = $bulan[0];
		}
		$this->load->view('vPIC/vTemplate/vHeaderPIC', $data);
		$this->load->view('vPIC/vAbsensiPIC');
		$this->load->view('vPIC/vTemplate/vFooterPIC');
	}


	public function ranking()
	{
		$data['judul'] = "Ranking PIC";
		$this->load->view('vPIC/vTemplate/vHeaderPIC', $data);
		$this->load->view('vPIC/vRankingPIC');
		$this->load->view('vPIC/vTemplate/vFooterPIC');
	}

	public function ubahPassword(){
		$data['judul'] = "Ubah Password";
		$NIK = $this->input->post('NIK');
		$data['pic'] = $this->mPIC->ubahPassword('pic', $NIK);

		$this->load->view('vPIC/vTemplate/vHeaderPIC', $data);
		$this->load->view('vPIC/vUbahPassword');
		$this->load->view('vPIC/vTemplate/vFooterPIC');
	}

	public function validasiUbahPassword(){
		$NIK = $this->input->post('NIK');
		$password = $this->input->post('password');
		$data = array(
			'password' => md5($password)
		);
		$this->mPIC->validasiUbahPassword('pic', $data, $NIK);

		echo "<script type='text/javascript'>
		alert('Sukses Mengubah Password');
		window.location.href = '" . base_url() . "pic/beranda';
		</script>";
	}
}
