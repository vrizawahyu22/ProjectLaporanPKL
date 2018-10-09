<div class="ui two column centered grid">
  <div class="column" style="width: auto;">
    <div class="ui segment" style="border-radius: 1.285714rem">
     <div class="segment">
      <div class="ui icon input" style="margin-left: 0px">
        <input type="text" placeholder="Search..." id="pencarian">
        <i class="circular search link icon"></i>
      </div>
      <h3 style="text-align: center; margin-top: -30px;">
        <div class="ui icon">
          <i class="user icon"></i>
          Template Absensi PIC 
        </h3>

          <?php if ($_SESSION['nama'] == 'admin'): ?> 
            <a class="ui right floated tiny blue icon button" data-tooltip="Klik untuk Tambah Template Absensi" data-inverted="" data-position="top right" style="margin-top: -40px" href="<?php echo site_url('admin/tambahtemplateabsensi'); ?>">
              <i class="add icon"></i>
            </a>
          <?php endif ?>
      </div>

      <div class="ui divider"></div>
      <div class="field" style="margin-left: 600px; margin-top: 5px" data-tooltip="Klik untuk Pilih Hari" data-inverted="" data-position="top right" >
        <select class="ui right selection tiny dropdown item" id="hari" >
          <!-- <option value="<?php echo $hari; ?>"><?php echo $hari; ?></option>         -->
          <option value="<?php echo $hari ?>"><?php echo $hari ?></option>
          <option value="Senin">Senin</option>
          <option value="Selasa">Selasa</option>
          <option value="Rabu">Rabu</option>
          <option value="Kamis">Kamis</option>
          <option value="Jumat">Jumat</option>
          <option value="Sabtu">Sabtu</option>
          <option value="Minggu">Minggu</option>
        </select>
      </div>

      <table class="ui sortable compact celled definition table">
        <thead class="full-width" style="text-align: center; background-color: #dbedff">
          <tr>
            <th class="sorted ascending">NIK</th>
            <th class="">Nama PIC</th>
            <th class="">Shift</th>
            <th class="">Jam</th>
            <th class="">Hari</th>
            
             <?php if ($_SESSION['nama'] == 'admin'): ?>
            <th class="">Edit</th>
            <th class="">Hapus</th>
            <?php endif ?>
          </tr>
        </thead>
<!--         <form method="POST" action="<?php echo site_url('admin/gantiabsensi'); ?>">
 -->          <tbody id="hasil">
            
          <?php $temp = 0; ?>
            <?php foreach ($template as $template) { ?>
                <tr>
                  <input type="hidden" name="<?php echo 'IDTHarian'.$temp ?>" value="<?php echo $template['IDTHarian']; ?>">
                <td><?php echo $template['NIK']; ?></td>
                <td><?php echo $template['NamaPIC']; ?></td>
                <td><?php echo $template['Shift']; ?></td>
                <td><?php echo $template['Jam']; ?></td>
                <td><?php echo $template['Hari']; ?></td>
                <?php if ($_SESSION['nama'] == 'admin'): ?>
                <td>
              <?php $edit = 'admin/edittemplateabsensi/'.$template['IDTHarian'] ?>
              <a href="<?php echo site_url($edit) ;?>" class="ui basic small blue button">
                <i class="icon edit"></i>
                Edit
              </a>
            </td>
            <?php endif ?> 

            <?php if ($_SESSION['nama'] == 'admin'): ?>
            <td>
              <a href="<?php echo site_url("admin/hapustemplateabsensi/".$template['IDTHarian']) ;?>" class="ui basic small red button" onClick="return confirm('Apa anda yakin ingin menghapus template absensi? ?');">
                <i class="icon trash"></i>
                Hapus
              </a>
            </td>
            <?php endif ?>
            </tr>
            <?php $temp = $temp + 1;
             } ?>
             <input type="hidden" name="temp" value="<?php echo $temp ?>">

    </tbody>
    <tfoot class="full-width">
      <tr>

        <th colspan="9">

        </th>

      </tr>
    </tfoot>
</table>
<br><br>
</div>
</div>
</div>