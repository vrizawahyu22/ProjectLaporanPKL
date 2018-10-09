
<div class="ui two column centered grid">
  <div class="column" style="width: auto;">
    <div class="ui segment" style="padding: 10px; border-radius: 1.285714rem">
      
      
    <div class="segment">
      <div class="ui icon input" style="margin-left: 20px">
        <input type="text" placeholder="Search..." id="pencarian">
        <i class="circular search link icon"></i>
      </div>
      
      <h3 style="text-align: center; margin-top: -30px;">
      <div class="ui icon">
        <i class="clock icon"></i>
        L O G 
      </h3>

      <form method="POST" action="<?php echo site_url('admin/beranda'); ?>">
        <div class="ui right calendar" style="margin-left: 75%; margin-top: -45px">
          <div class="ui input left icon" >
            <i class="calendar icon" ></i>
            <input type="date" value="<?php echo $tanggal ?>" id="kalender" name="tanggal">
            <button class="ui right floated tiny basic icon button" data-tooltip="Klik untuk Cari Absensi PIC" data-inverted="" data-position="top right">
              <i class="search icon"></i>
            </button>
          </div>
        </div>
      </form>
       <h2 class="ui icon" style="margin-left: 97%;  margin-top: -35px;"">

        <a href="#" id="template" data-tooltip="Download Report Checklist">
          <i class="download icon"></i>
        </a>
        <div class="ui tiny modal">
            <div class="header">Input Tanggal</div>
            <div class="content">
              <p>
                <form method="POST" action="<?php echo site_url('admin/export'); ?>">
                  <div class="ui center aligned basic segment">

                    <div class="ui input left icon">
                      <i class="calendar icon"></i>
                      <input type="date" value="<?php echo date('Y-m-d', strtotime(date('Y-m-d') )); ?>" name="date0" id="date0">
                    </div>
                    Sampai:
                    <div class="ui input left icon">
                      <i class="calendar icon"></i>
                      <input type="date" value="<?php echo date('Y-m-d', strtotime(date('Y-m-d'))); ?>" name="date1" id="date1">
                    </div>
                    <br>
                    <br>
                  
                    <button class="ui blue button">Download</button>
                   
                  </div>
                </form>
              </p>

            </div>
      </h2>
      </div>
  
      <div class="ui divider"></div>
    
        <table class="ui sortable celled table" id="mytable" style="margin-top: 20px; margin-left: 20px; width: 95%">
          <thead style="text-align: center;">
            <tr>
            <th>No</th>
            <th>Jadwal</th>
            <th>Jam Pengecekan</th>
            <th style="width: 300px;">Nama Checklist</th>
            <th>Nama PIC</th>
            <th>PIC Yang Mengecek</th>
            <th>Instruksi Pengerjaan</th>
            <th>Status</th>
            <th>Keterangan</th>
            <th>Bukti</th>
            </tr>
          </thead>
          <tbody id="hasil" style="text-align: center;">
            <?php $temp = 1; ?>
            <?php foreach ($log as $log): ?>
                <tr>
                  <td><?php echo $temp; $temp = $temp +1; ?></td>
                  <td><?php echo $log['Jam'] ?></td>
                  <td><?php echo $log['Waktu'] ?></td>
                  <td><?php echo $log['NamaChecklist'] ?></td>
                  <td><?php echo $log['NamaPIC'] ?></td>
                  <td><?php echo $log['PICCek'] ?></td>
                  <td>
                     <?php 
                      $nInfo = NULL;
                      $k = 0;
                      $fh = fopen($log['Info'], 'r');
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
                  <?php if ($log['Status'] == 'OK') {?>
                  <td style="background-color: #90EE90 ;"><b>OK</b></td>
                  <?php } else if($log['Status'] == 'Bad') {?>
                    <td style="background-color:  #f5ae70;"><b>Bad</b></td>
                  <?php } else if($log['Status'] == 'Not Checked'){?>
                    <td style="background-color: tomato;"><b>Not Checked</b></td>
                  <?php } ?>
                  </td>
                  <td>
                     <a href="#" data-featherlight="<?php echo '#lihatKet'.$temp ?>">Lihat</a>
                      <div style="display:none;">
                        <div id="<?php echo 'lihatKet'.$temp ?>">
                          <h3>Keterangan</h3>
                          <div class="ui segment">
                            <?php echo $log['Keterangan'] ?>
                          </div>
                        </div>
                      </div>
                  </td>
                  <td>
                    <a href="#" data-featherlight="<?php echo '#lihatBukti'.$temp ?>">Lihat</a>
                      <div style="display:none;">
                        <div id="<?php echo 'lihatBukti'.$temp ?>">
                          <h3>Bukti Pengecekan</h3>
                          <div class="ui segment" >
                            <img  height ="400" src="<?php echo site_url($log['Bukti']) ?>" alt="Bukti Pengecekan">
                          </div>
                        </div>
                      </div>
                  </td>
                </tr>
            <?php endforeach ?>
          </tbody>
          <tfoot>
            <tr> 
            <th colspan="10">
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


<script type="text/javascript">
  kalender =  $('#kalender').val();
  $("#hasilLog tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(kalender) > -1);
  });
  $('#kalender').on("change",function(){
    kalender =  $('#kalender').val();
    $("#hasilLog tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(kalender) > -1);
    });
  }); 
</script>

<script>
  $(document).ready(function(){
    $("#template").click(function(){
      $('.tiny.modal').modal('show');
    });
  });
</script>