
<div class="ui two column centered grid">
  <div class="column" style="width: auto;">
    <div class="ui segment" style="padding: 10px; border-radius: 1.285714rem">
      
      <div class="segment">
      <div class="ui icon input" style="margin-left: 0px">
        <input type="text" placeholder="Search..." id="pencarian">
        <i class="circular search link icon"></i>
      </div>
      
      <h3 style="text-align: center; margin-top: -30px;">
      <div class="ui icon">
        <i class="users icon"></i>
        Pergantian PIC
      </h3>
      </div>

      <div class="ui divider"></div>
        <table class="ui sortable celled table" id="mytable" style="margin-top: 20px; margin-left: 20px; width: 95%">
          <thead>
            <tr style="text-align: center">
              <th>No</th>
              <th>Hari</th>
              <th>Shift</th>
              <th>Nama Checklist</th>
              <th>Nama PIC Terjadwal</th>
              <th>Nama PIC Pengganti</th>
              <th>Waktu Pergantian PIC</th>
            </tr>
          </thead>
          <tbody id="hasil">
            <?php $temp = 1; ?>
            <?php foreach ($penggantiPIC as $pic): ?>
              <tr style="text-align: center">
              <td><?php echo $temp; ?></td>
              <td><?php echo $pic['Tanggal']; ?></td>
              <td ><?php echo $pic['Jam']; ?></td>
              <td><?php echo $pic['NamaChecklist']; ?></td>
              <td><?php echo $pic['NamaPICS']; ?></td>
              <td><?php echo $pic['NamaPICP'] ?></td>
              <td><?php echo $pic['Waktu'] ?></td>

            </tr>
            <?php $temp = $temp+1; ?>
            <?php endforeach ?>
          </tbody>
          <tfoot>
            <tr> 
            <th colspan="7">
            </th> 
            </tr>
          </tfoot>
        </table>      
      <div class="pagination-container">
      <nav>
        <ul class="pagination"></ul>
      </nav>
    </div>
    </div>
  </div>
</div>

  


   

    
