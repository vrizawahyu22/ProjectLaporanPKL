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
            <i class="tasks icon"></i>
            List Checklist 
          </h3>

          <a class="ui right floated tiny blue icon button" data-tooltip="Tambah Checklist" data-inverted="" data-position="top right" style="margin-top: -40px" href="<?php echo site_url('admin/tambahchecklist'); ?>">
            <i class="add icon"></i>
          </a>
          
        </div>
        <form method="POST" action="<?php echo site_url('admin/gantichecklist'); ?>">    
          <div class="ui divider"></div>
          <table class="ui sortable celled table"  id="mytable">
            <thead>
              <tr style="text-align: center">
                <th class="sorted ascending">No</th>
                <th>Jadwal</th>
                <th>Batas Waktu</th>
                <th style="width: 300px;" >Nama Checklist</th>
                <th >Instruksi Pengerjaan</th>
                <th>Edit</th>
                <th>
                  <div class="ui simple dropdown item" style="color: black;">
                    Status
                    <i class="dropdown icon"></i>
                    <div class="menu">
                      <a class="item" href="<?php echo site_url('admin/checklist/Enabled') ?>">Enable</a>
                      <a class="item" href="<?php echo site_url('admin/checklist/Disabled') ?>">Disable</a>
                    </div>
                  </div>
                </th>
              </tr>
            </thead>
            <tbody style="text-align: center;" id="hasil"> 
              <?php $temp = 0; $no = 1;?>
              
              <input type="hidden" name="nJumlah" value="<?php echo count($checklist); ?>">
              <?php foreach ($checklist as $checklist) { ?>
              <?php if ($checklist['Status'] == $status) { ?> 
              <td>
                <?php echo $no; ?>
                <input type="hidden" name="<?php echo 'IDChecklist'.$temp ?>" value="<?php echo $checklist['IDChecklist']; ?>">
              </td>
              <td class="time"><?php echo $checklist['Jam']; ?></td>
              <td class="batasP"><?php echo $checklist['BatasPengecekan'] ?> Menit</td>
              <td class="namaChecklist"><?php echo $checklist['NamaChecklist']; ?></td>
              <td style="text-align: center;">
                <?php 
                $nInfo = NULL;
                $k = 0;
                $fh = fopen($checklist['Info'], 'r');
                while(!feof($fh)){
                 $nInfo[$k] = fgets($fh);
                 $k = $k +1;
               }
               ?>

               <a href="#" data-featherlight=" <?php echo '#bio-name'.$temp ?>">Lihat</a>
               <div style="display:none;">
                <div id="<?php echo 'bio-name'.$temp ?>">
                  <h3>Instruksi Pengerjaan</h3>
                  <div class="ui segment">
                   <?php foreach ($nInfo as $info) {
                    echo '<p>'.$info.'</p>';
                  } ?> 
                </div>
              </div>
            </div>
          </td>
          <td>
            <a class="ui basic blue small button" href="<?php echo site_url('admin/editchecklist/'.$checklist['IDChecklist']); ?>">
              <i class="icon edit"></i>
              Edit
            </a>
          </td>
          <td >
            <select class="ui selection tiny dropdown" name="<?php echo 'Status'.$temp ?>">
              <?php if ($status == "Enabled") { ?>
              <option value="<?php echo $checklist['Status']; ?>"><?php echo $checklist['Status']; ?></option>
              <option value="Disabled">Disabled</option>
              <?php } ?>
              <?php if ($status == "Disabled") { ?>
              <option value="<?php echo $checklist['Status']; ?>"><?php echo $checklist['Status']; ?></option>
              <option value="Enabled">Enabled</option>
              <?php } ?>
            </select>
          </td>
        </tr> 
        <?php $temp++; $no++; ?>
        <?php } }?>
      </tbody>
      <tfoot>
        <th colspan="9">
        </th>
      </tfoot>
    </table>
    <button class="ui right floated blue small button" >
            <i class="save icon"></i>Simpan
          </button>
        </form>
      
      <div class="pagination-container">
      <nav>
        <ul class="pagination"></ul>
      </nav>
    </div>
</div>
</div>
</div>