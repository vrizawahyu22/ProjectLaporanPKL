<?php if (!isset($_SESSION['nama'])) {
  redirect(base_url("admin"));
} ?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/Semantic-UI/semantic.min.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/Semantic-UI/data-paginate.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/pagination.min.css'); ?>">
  
  <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.3.1.min.js'); ?>"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/Semantic-UI/tablesort.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/Semantic-UI/data-paging.js'); ?>"></script>

<!-- Table Sort -->
      <script type="text/javascript">
        $(document).ready(function() 
        { 
          $('table').tablesort(); 
        } 
        ); 
      </script>
<!-- End of Table Sort -->

<!-- Dropdown -->
      <script type="text/javascript">
        $(document).ready(function() 
        { 
          $('.ui.dropdown').dropdown();
        } 
        ); 
      </script>
<!-- End of Dropdown -->

<!-- Sorting Days -->
      <script>
        $(document).ready(function(){

          var day = $("#hari option:selected").val();
          // console.log(day);
          $("#hasil tr").filter(function() {
            $(this).toggle($(this).text().indexOf(day) > -1);

          });
          $("select#hari").change(function(){
            var hari = $("#hari option:selected").val();
            var jumlah = document.getElementById("hasil").getElementsByTagName("tr").length;

            $("#hasil tr").filter(function() {
              $(this).toggle($(this).text().indexOf(hari) > -1)
            });
          });
        });
      </script>
<!-- End of Sorting Days -->

<!-- Header Date -->
      <script>  
        function date_time(id){
        date = new Date;
        // year = date.getFullYear();
        // month = date.getMonth();
        // months = new Array('January', 'February', 'March', 'April', 'May', 'June', 'Jully', 'August', 'September', 'October', 'November', 'December');
        d = date.getDate();
        day = date.getDay();
        days = new Array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');
        h = date.getHours();
        if(h<10)
        { 
                h = "0"+h;
        }
        m = date.getMinutes();
        if(m<10)
        {
                m = "0"+m;
        }
        s = date.getSeconds();
        if(s<10)
        {
                s = "0"+s;
        }
        result = ''+days[day]+', '+h+':'+m+':'+s;
        document.getElementById(id).innerHTML = result;
        setTimeout('date_time("'+id+'");','1000');
        // console.log(result);
        return true;
        }
        </script>
<!-- End of Header Date -->

<!-- Pagination -->
<script>
    var table = '#mytable'
    $(function(){
      $('.pagination').html('')
        var trnum = 0
        var maxRows = 50;
        var totalRows = $(table+' tbody tr').length
        $(table+' tr:gt(0)').each(function(){
            trnum++
            if(trnum > maxRows){
                $(this).hide()
            }
            if(trnum <= maxRows){
                $(this).show()
            }
        })

        if(totalRows > maxRows){
            var pagenum = Math.ceil(totalRows/maxRows)
            for(var i=1;i<=pagenum;){
                $('.pagination').append('<li data-page="'+i+'">\<span>'+ i++ +'<span class="sr-only">(current)</span></span>\</li>').show()
            }
        }
        $('.pagination li:first-child').addClass('active')
        $('.pagination li').on('click',function(){
            var pageNum = $(this).attr('data-page')
            var trIndex = 0;
            $('.pagination li').removeClass('active')
            $(this).addClass('active')
            $(table+' tr:gt(0)').each(function(){
                trIndex++
                if(trIndex > (maxRows*pageNum) || trIndex <= ((maxRows*pageNum)-maxRows)){
                    $(this).hide()
                } else{
                    $(this).show()
                }
            })
        })
    });
  </script>
<!-- End of Pagination -->


<!--   <script >
    $(document).ready(function(){
        $.getJSON("<?php echo site_url('admin/jLog'); ?>", function(result){
            $.each(result, function(i, field){
                $("#vriza").append(field + " ");
                });
            });
        });
      </script> -->

      <!-- <script type="text/javascript">
        $(document).ready(function(){
          var txt= ""; var a = "";
          var kalender = $("#kalender").val();
          var info ="";
          $.getJSON("<?php echo site_url('admin/jLog'); ?>", function(result){
            $.each(result, function(i, field){  

              for (var i = 0; i < field.length; i++) {
                info =  field[i]["Info"];

                jQuery.get("<?php echo site_url() ?>"+info, function(data) {
                  txt += "<tr>";
                  txt += "<td>" + (i+1) + "</td>" +
                  "<td>" + field[i]["Jam"] + "</td>" +
                  "<td class='waktu'>" + field[i]["Waktu"] + "</td>" +
                  "<td>" + field[i]["NamaChecklist"] + "</td>" +
                  "<td>" + field[i]["NamaPIC"] + "</td>" +
                  "<td>" + field[i]["PICCek"] + "</td>" ;          
                  console.log(data);
                  txt+= "<td>"+ data +"</td>";
                  txt +=  "<td>" + field[i]["Status"] + "</td>" +
                  "<td>" + field[i]["Keterangan"] + "</td>" ;
                  txt += "</tr>";
                });
              } 
              
              document.getElementById("hasilLog").innerHTML = txt;
              for (var i = 0; i < field.length; i++) {
                document.getElementById("hasilLog").innerHTML = txt;
              }
              $("#hasilLog tr").filter(function() {
                $(this).toggle($(this).text().indexOf(kalender) > -1);
              });
            });
          });  

          $('#kalender').on("change",function(){
            kalender =  $('#kalender').val();
      // $('#getDate').html($('#kalender').val());
      $("#hasilLog tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(kalender) > -1);
      });
    }); 
  }); 
</script> -->



<link href="//cdn.rawgit.com/noelboss/featherlight/1.3.2/release/featherlight.min.css" type="text/css" rel="stylesheet" title="Featherlight Styles" /><script src="//cdn.rawgit.com/noelboss/featherlight/1.3.2/release/featherlight.min.js" type="text/javascript" charset="utf-8"></script>

<title>
  <?php echo $judul; ?>
</title>

</head>

 <!--  <body style="background-image: url(<?php echo base_url('assets/images/9.jpg'); ?>); background-size: cover; background-attachment: fixed;"> -->
  
  <!-- Top Menu -->

<body style="background-image: url(<?php echo base_url('assets/images/ini.jpeg'); ?>); background-size: cover; background-attachment: fixed;">
  <div class="ui top fixed inverted pointing menu">
    <a class="header item" href="<?php echo site_url('admin/beranda'); ?>">
      <img class="ui avatar image" src="<?php echo base_url('assets/images/Artajasa.png'); ?> ">
      Artajasa
    </a>
    <a class="item" href="<?php echo site_url('admin/beranda'); ?>">
      <div class="ui icon">
        <i class="home icon"></i>
      Dashboard</div>
    </a>

    <?php if ($_SESSION['nama'] == 'admin'): ?>
      <div class="ui dropdown item">
        <div class="ui icon">
            <i class="check square icon"></i>
        Checklist
      </div>
        <i class="dropdown icon"></i>
        <div class="menu">
          <a class="item" href="<?php echo site_url('admin/checklist'); ?>">
            <div class="ui icon">
              <i class="list icon"></i>
            List Checklist</div>
          </a>
          <a class="item" href="<?php echo site_url('admin/jchecklist'); ?>">
            <div class="ui icon">
              <i class="calendar outline icon"></i>
            Jadwal Checklist</div>
          </a>
        </div>
      </div>
    <?php endif ?>

    <div class="ui dropdown item">
      <i class="user icon"></i>
      PIC
      <i class="dropdown icon"></i>
      <div class="menu">

            <?php if ($_SESSION['nama'] == 'admin'): ?>
            <a class="item" href="<?php echo site_url('admin/pic'); ?>">
              <i class="file alternate outline icon"></i>
            Daftar PIC</a>
            <?php endif ?>

            <a class="item" href="<?php echo site_url('admin/absensi'); ?>">
              <i class="calendar check outline icon"></i>
            Absensi PIC</a>

            <a class="item" href="<?php echo site_url('admin/templateabsensi'); ?>">
              <i class="calendar plus alternate icon"></i>
            Template Absensi</a>

            
            <?php if ($_SESSION['nama'] == 'admin'): ?>
            <a class="item" href="<?php echo site_url('admin/tampilRanking'); ?>">
              <i class="chart bar outline icon"></i>
            Ranking PIC</a>
            <?php endif ?>
            
            <a class="item" href="<?php echo site_url('admin/pergantian'); ?>">
              <i class="sync alternate icon"></i>
            Pergantian PIC</a>
          </div>
        </div>
      
        
        <div class="right menu">

          <div class="ui black label" style="margin-top: 3.2%">

     <!--      <i class="clock outline icon" style="margin-top: 3.5%; color: white;"></i> -->
          <span id="date_time" style="
                                    margin-top: 3.2%;
                                    color: white;
                                    font-size: 15px;
                                   /* font-family: : Orbitron;*/
                                    letter-spacing: 1px;
          "></span>
          </div>
      
          


          <!-- <div class="ui pointing dropdown link item"> -->
            <!-- <span class="text">

            Notifications</span> -->
            <!-- <div class="ui small label" style="background-color: red;">
              
            2</div> -->
           <!--  <div class="menu"> -->
              <!-- <div class="header">
                <i class= "bell icon"></i>
              Notifications</div>-->

              <!-- <div class="ui relaxed divided list" style="margin: auto+10px auto+10px; padding-bottom: 10px;">
              <?php foreach ($notifikasi as $notifikasi): ?>
                <a href="<?php echo site_url('admin/beranda'); ?>">
                <?php if ($notifikasi['Status'] == 'Belum'): ?>
                  <div class="item" style="background-color: #e2f8ff; padding: 10px; ">
                <?php endif ?>
                <?php if ($notifikasi['Status'] == 'Sudah'): ?>
                  <div class="item" style="background-color: white; padding: 10px; ">
                <?php endif ?>
                  <div class="content">
                    <p class="header" style="margin-bottom: 5px; color: blue;"><?php echo $notifikasi['Isi'] ?></p>
                    <div class="description" style="font-size: 12px; color: black;">Updated <?php echo $notifikasi['Waktu'] ?></div>
                  </div>
                </div>  
                </a>
                <br>
              <?php endforeach ?>
            </div> -->


          <!-- </div> -->
        <!-- </div> -->


        <div class="ui dropdown item">
          <i class="setting icon"></i>
          Settings
          <i class="dropdown icon"></i>
          <div class="menu">
            <a class="item" href="<?php echo site_url('admin/ubahbobotwp'); ?>">
              <i class="chart area icon"></i>
            Ubah Bobot WP</a>
            <a class="item" href="<?php echo site_url('admin/ubahshift'); ?>">
              <i class="clock outline icon"></i>
            Ubah Jadwal Shift PIC</a>
          </div>
        </div>




        <!-- <form method="POST" action="<?php echo site_url('admin/bobotwp'); ?>">
        <div class="item" style="align-items: center; margin-top: 3px ">
            <button class="ui grey button" >
              <i class="setting icon"></i>
              Setting
            </button>
          </div>
        </form> -->
        
        <a href="<?php echo site_url('admin/keluar'); ?>" style="color: white;" onClick="return confirm('Apa anda yakin ingin keluar ?');">
          <div class="item" style="margin-top: 3px ">
            <div class="ui teal button">
              <i class="sign out alternate icon" icon"></i>Log Out
            </div>
          </div>
        </a>
      </div>
    </div>
  </body>
</div>
<br><br><br><br><br>


<script type="text/javascript">window.onload = date_time('date_time');</script>



