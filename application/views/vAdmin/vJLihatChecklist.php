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
            Jadwal Checklist 
          </h3>
        
          <form method="POST" action="<?php echo site_url('admin/jchecklist'); ?>">
            <div class="ui calendar" style="margin-left: 77.65%; margin-top: -45px">
              <div class="ui input left icon">
                <i class="calendar icon"></i>
                <input type="date" id="tanggal" value="<?php echo $tanggal; ?>" name="tanggal">
                <button class="ui right floated tiny basic icon button" data-tooltip="Cari Jadwal Checklist" data-inverted="" data-position="top right" >
              	  <i class="search icon"></i>
            	</button>
              </div>
            </div>
          </form>

          
        </div>
        <form method="POST" action="<?php echo site_url('admin/gantijchecklist'); ?>">    
          <div class="ui divider"></div>
          <div class= "ui field">
        <!-- <select name="state" id="maxRows" class="form-control" style="width:150px;">
                        <option value="5000">Show All</option>
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="75">75</option>
                        <option value="100">100</option>
                    </select>
                  </div> -->
          <table class="ui sortable celled table"  id="mytable">
            <thead>
              <tr style="text-align: center">
                <th class="sorted ascending">No</th>
                <th>Hari</th>
                <th>Jadwal</th>
                <th>Batas Waktu</th>
                <th style="width: 300px;" >Nama Checklist</th>
                <th>Nama PIC</th>
                <th >Instruksi Pengerjaan</th>
              </tr>
            </thead>
            <tbody id="tabelku" >
              <?php $temp = 0; $no = 1; ?>
              <input type="hidden" name="nJumlah" value="<?php echo count($checklist); ?>">
              <?php foreach ($checklist as $checklist) { ?>
              <input type="hidden" name="<?php echo 'IDChecklist'.$temp ?>" value="<?php echo $checklist['IDChecklist']; ?>">
              <input type="hidden" name="<?php echo 'IDJadwalChecklist'.$temp ?>" value="<?php echo $checklist['IDJadwalChecklist']; ?>">
              <input type="hidden" name="date" value="<?php echo $checklist['Tanggal']; ?>">
              <?php  
                if ($checklist['StatusCheck'] == '1') {
                  echo '<tr style="background-color: #75e2f2; text-align:center;" class="hasilku">';
                }
                else if ($checklist['StatusCheck'] == '2'){ 
                  echo '<tr style="background-color: tomato" class="hasilku">';
                }
                else{
                    echo '<tr style="text-align:center;" class="hasilku">';
                }
                ?>
                <td> <?php echo $no ; $no = $no+1;?> </td>
                <td class=""><?php echo $checklist['Tanggal']; ?></td>
                <td class="time"><?php echo $checklist['Jam']; ?></td>
                <td class="batasP"><?php echo $checklist['BatasPengecekan'] ?> Menit</td>
                <td class="namaChecklist" ><?php echo $checklist['NamaChecklist']; ?></td>
                <td>
                  <input type="hidden" name="<?php echo 'NIK'.$temp ?>" value="<?php echo $checklist['NIK'] ?>">
                  <input type="hidden" class="statusCheck" value="<?php echo $checklist['StatusCheck'] ?>">

                  <select class="ui search dropdown" name="<?php echo 'NIKP'.$temp ?>">
                    <?php if ($picP[$temp]['NamaPIC'] != '0') { ?>
                      <option value="<?php echo $picP[$temp]['NIK'] ?>"><?php echo $picP[$temp]['NamaPIC']; ?></option>
                    <?php } elseif ($picP[$temp]['NamaPIC'] == '0'){ ?>
                      <option value="<?php echo $checklist['NIK'] ?>"><?php echo $checklist['NamaPIC']; ?></option>
                      <?php } ?>
                      <?php for ($i=0; $i < count($pic); $i++) { ?>
                        <option value="<?php echo $pic[$i]['NIK'] ?>"><?php echo $pic[$i]['NamaPIC']; ?></option>
                    <?php } ?>
                  </select>

                </td>
                <td>
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
            </tr> 

            <?php $temp = $temp + 1; ?>
            <?php } ?>
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
    <div class="ui divider"></div>
    <div>
      <h4 style="margin-left:5px;"> Keterangan :</h4>
      <div class="ui equal width aligned padded grid">
        <div class="row" style="padding:5px;">
          <div class="column" style="background-color: tomato;color: #FFFFFF;"></div>
          <div class="column">Tidak Dicek</div>
          <div class="column"></div>
        </div>
        <div class="row" style="padding:5px;">
          <div class="column" style="background-color: mediumseagreen;color: #FFFFFF;"></div>
          <div class="column">Waktu Pengecekan Dimulai</div>
          <div class="column"></div>
        </div>
        <div class="row" style="padding:5px;">
          <div class="column" style="background-color: gold;color: #FFFFFF;"></div>
          <div class="column">Waktu Pengecekan Telah Melewati Batas</div>
          <div class="column"></div>
        </div>
        <div class="row" style="padding:5px; ">
          <div class="column" style="background-color: #75e2f2;color: #FFFFFF;"></div>
          <div class="column">Berhasil Dicek</div>
          <div class="column"></div>
        </div>
      </div>
    </div>
    </div>
  </div>
</div>
</div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.js"></script>
    <script type="text/javascript">
      var d = document.getElementById("tanggal").value;
      var nowDay = moment().format('dddd');
      var nowDate = moment().format('YYYY-MM-DD');
      
      if (d == nowDate){
      
      var interval = setInterval(myTimer,1000);

      function myTimer(){
        $.getJSON("<?php echo site_url('admin/jsonchecklist') ?>", function(result){
          $.each(result, function(i, field){
            document.getElementsByClassName("statusCheck")[i].value = field['StatusCheck'];
          });
        });

        var d = new moment.locale();
        var nowTime = moment();
        var nowDay = moment().format('dddd');
        var checkTime = moment('13:00', 'hh:mm');
        var duration = moment.duration(checkTime.diff(nowTime));

        // console.log('now time', nowTime);
        // console.log('now day', nowDay);
        // console.log('check time', checkTime);
        // console.log('duration in hours', duration.asHours());
        // console.log('duration in minutes', duration.asMinutes());
        // console.log(moment().format());

        var row = document.querySelectorAll("table#mytable>tbody#tabelku>tr");
        var time = [];
        var namaChecklist = [];
        var idChecklist = [];
        var namaPIC = [];
        var info = [];
        var selisih = [];
        var batasP = [];
        var statusCheck = [];


        var x = document.getElementsByClassName("time");
        for(var j = 0; j < x.length; j++){
          time[j] =  document.getElementsByClassName("time")[j].innerHTML;
          namaChecklist[j] =  document.getElementsByClassName("namaChecklist")[j].innerHTML;
          statusCheck[j] = document.getElementsByClassName("statusCheck")[j].value;
          batasP[j] = parseInt(document.getElementsByClassName("batasP")[j].innerHTML.substring(0,2));
          selisih[j] =  moment.duration(moment(time[j], 'hh:mm').diff(nowTime)).asMinutes();

        }

      // $(function(){
      //   $.ajax({
      //     type       : 'POST',
      //     url        : "<?php echo site_url('admin/getstatusjchecklist'); ?>",
      //     success    : function(hasil) {
      //       // jQuery('#hasilQ' + $('.tSimpan').attr('target')).css("background-color","#AFEEEE");
      //       // jQuery('#sttsCheck' + $('.tSimpan').attr('target')).val("1");
      //       // jQuery('#' + $('.tSimpan').attr('target')).text("Disabled");
      //       // alert("Checklist sukses");
      //       // var current = $.featherlight.current();
      //       // current.close();
      //       alert(hasil);
      //     }
      //   });
      // });

        var f = [];
        for (var j = 0; j < row.length; j++) {
          f[j] = document.getElementsByClassName('hasilku')[j];
          if(statusCheck[j] == "0"){
              if((selisih[j]*(-1)) > 0 && (selisih[j]*(-1)) < batasP[j] ){
                f[j].style.backgroundColor = (f[j].style.backgroundColor == 'mediumseagreen' ? '' : 'mediumseagreen');
              }

              else if ((selisih[j]*(-1)) > batasP[j]) {
                f[j].style.backgroundColor = (f[j].style.backgroundColor == 'gold' ? '' : 'gold');
              }

              for (var k = j+1; k < row.length; k++) {
                if (namaChecklist[j] == namaChecklist[k] && (selisih[k]*-1) > 0 && f[j].style.backgroundColor != 'tomato') {
                  f[j].style.backgroundColor = 'tomato';
                }
              }
            }
          else if(statusCheck[j] == "1"){
            f[j].style.backgroundColor = '#75e2f2';
          }
        }
      }//Akhir Method myTimer
    }


</script>

<script type="text/javascript">
      $(document).ready(function(){
        $("#pencarian").on("keyup", function() {
          var value = $(this).val().toLowerCase();
          $("#tabelku tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          });
          $("#tabelku tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          });
        }); 
      });
  </script>



