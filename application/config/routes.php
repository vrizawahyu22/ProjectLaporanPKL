<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//<-- HALAMAN ADMIN -->
$route['admin'] = 'cAdmin';
$route['admin/validation'] = 'cAdmin/validation';
$route['admin/beranda'] = 'cAdmin/lihatLog';
$route['admin/berandaPIC'] = 'cAdmin';
$route['admin/keluar'] = 'cAdmin/keluar';

//CRUD PIC
$route['admin/pic'] = 'cAdmin/lihatPIC';
$route['admin/pic/(:any)'] = 'cAdmin/lihatPIC/$1';
$route['admin/tambahpic'] = 'cAdmin/tambahPIC';
$route['admin/validasitambahpic'] = 'cAdmin/validasiTambahPIC';
$route['admin/editpic/(:any)'] = 'cAdmin/editPIC/$1';
$route['admin/validasieditpic'] = 'cAdmin/validasiEditPIC';
$route['admin/hapuspic'] = 'cAdmin/hapusPIC';
$route['admin/ubahshift'] = 'cAdmin/ubahJadwalShift';
$route['admin/gantijadwal'] = 'cAdmin/gantiJadwal';

//CRUD CHECKLIST
$route['admin/checklist'] = 'cAdmin/lihatChecklist';
$route['admin/checklist/(:any)'] = 'cAdmin/lihatChecklist/$1';
$route['admin/editchecklist/(:any)'] = 'cAdmin/editChecklist/$1';
$route['admin/infochecklist/(:any)'] = 'cAdmin/lihatInfoChecklist/$1';
$route['admin/validasieditchecklist'] = 'cAdmin/validasiEditChecklist';
$route['admin/tambahchecklist'] = 'cAdmin/tambahChecklist';
$route['admin/validasitambahchecklist'] = 'cAdmin/validasiTambahChecklist';
$route['admin/gantichecklist'] = 'cAdmin/gantiChecklist';
$route['admin/jchecklist'] = 'cAdmin/lihatJChecklist';
$route['admin/gantijchecklist'] = 'cAdmin/gantiJChecklist';
$route['admin/getstatusjchecklist'] = 'cAdmin/getStatusJChecklist';
$route['admin/jsonchecklist'] = 'cAdmin/jsonChecklist';


//CRUD ABSENSI
$route['admin/absensi'] = 'cAdmin/lihatAbsensi';
$route['admin/tambahabsensi'] = 'cAdmin/tambahAbsensi';
$route['admin/validasitambahabsensi'] = 'cAdmin/validasiTambahAbsensi';
$route['admin/hapusabsensi/(:any)'] = 'cAdmin/hapusAbsensi/$1';
$route['admin/editabsensi/(:any)'] = 'cAdmin/editAbsensi/$1';
$route['admin/validasieditabsensi'] = 'cAdmin/validasiEditAbsensi';
$route['admin/gantiabsensi'] = 'cAdmin/gantiAbsensi';
$route['admin/ranking'] = 'cAdmin/ranking';
$route['admin/jranking'] = 'cAdmin/jRanking';
$route['admin/tampilRanking'] = 'cAdmin/tampilRangking';
$route['admin/penjadwalan'] = 'cAdmin/penjadwalan';
$route['admin/pergantian'] = 'cAdmin/pergantian';

$route['admin/templateabsensi'] = 'cAdmin/templateAbsensi';
$route['admin/tambahtemplateabsensi'] = 'cAdmin/tambahTemplateAbsensi';
$route['admin/validasitambahtemplate'] = 'cAdmin/validasiTambahTemplate';
$route['admin/edittemplateabsensi/(:any)'] = 'cAdmin/editTemplateAbsensi/$1';
$route['admin/validasitemplateabsensi'] = 'cAdmin/validasiTemplateAbsensi';
$route['admin/hapustemplateabsensi/(:any)'] = 'cAdmin/hapusTemplateAbsensi/$1';
$route['admin/ikuttemplate'] = 'cAdmin/ikutTemplate';
$route['admin/export'] = 'cAdmin/export';


$route['admin/log'] = 'cAdmin/lihatLog';
$route['admin/jLog'] = 'cAdmin/jLihatLog';
$route['admin/gantipiclog'] = 'cAdmin/gantiPICLog';

//BOBOT WEIGHTED PRODUCT
$route['admin/ubahbobotwp'] = 'cAdmin/bobotWP';
$route['admin/gantibobotwp'] = 'cAdmin/gantiBobotWP';


//<-- HALAMAN PIC -->
$route['pic'] = 'cPIC';
$route['pic/validation'] = 'cPIC/validation';
$route['pic/beranda'] = 'cPIC/lihatLog';
$route['pic/keluar'] = 'cPIC/keluar';
$route['pic/checklist'] = 'cPIC/lihatChecklist';
$route['pic/checklist/(:any)'] = 'cPIC/lihatChecklist/$1';
$route['pic/jChecklist'] = 'cPIC/jChecklist';
$route['pic/docheck'] = 'cPIC/doChecklist';
$route['pic/nocheck'] = 'cPIC/noChecklist';
$route['pic/uploadBukti'] = 'cPIC/uploadBukti';
$route['pic/daftarPIC'] = 'cPIC/daftarPIC';
$route['pic/absensi'] = 'cPIC/lihatAbsensi';
$route['pic/ranking'] = 'cPIC/ranking';
$route['pic/ubahPassword'] = 'cPIC/ubahPassword';
$route['pic/validasiubahpassword'] = 'cPIC/validasiUbahPassword';

$route['admin/lihatIP'] = 'cAdmin/lihatIP';