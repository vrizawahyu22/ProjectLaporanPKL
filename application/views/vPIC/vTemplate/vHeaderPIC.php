<?php if (!isset($_SESSION['NamaPIC'])) {
  redirect(base_url("pic"));
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.3/semantic.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/Semantic-UI/tablesort.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/Semantic-UI/data-paging.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/md5.js'); ?>"></script>
 <!--  <script type="text/javascript">
      $(document).ready(function() {
        $('#example').DataTable( {
            "pagingType": "full_numbers"
          } );
        } );
      </script> -->
      <!-- <script type="text/javascript">
        $(document).ready(function() 
        { 
          $('table').tablesort(); 
        } 
        ); 
      </script> -->

  <!-- <script>
    $(document).ready(function()
    {
    $('form').transition('zoom');
    }
    );
  
  </script> -->

  <script>
    
  </script>

 <link href="//cdn.rawgit.com/noelboss/featherlight/1.3.2/release/featherlight.min.css" type="text/css" rel="stylesheet" title="Featherlight Styles" /><script src="//cdn.rawgit.com/noelboss/featherlight/1.3.2/release/featherlight.min.js" type="text/javascript" charset="utf-8"></script>

      <script type="text/javascript">
        $(document).ready(function() 
        { 
          $('.ui.dropdown').dropdown();
        } 
        ); 
      </script>

      <!-- Javascript Untuk Filter Hari -->
      <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
      <script>
        $(document).ready(function(){

          var day = $("#hari option:selected").val().toLowerCase();
          $("#hasil tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(day) > -1);

          });
          $("select#hari").change(function(){
            var hari = $("#hari option:selected").val().toLowerCase();
            var jumlah = document.getElementById("hasil").getElementsByTagName("tr").length;

            $("#hasil tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(hari) > -1)
            });
          });
        });
      </script>

      <script>
          
        function date_time(id)
    {
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
        console.log(result);
        return true;

    }
        </script>


      <title>
        <?php echo $judul; ?>
      </title>
    </head>


<body style="background-image: url(<?php echo base_url('assets/images/hhh.jpeg'); ?>); background-size: cover; background-attachment: fixed;">

<!-- <body style="background-color: #B0E0E6"> -->


<!-- <body style="background-image: url(<?php echo base_url('assets/images/square.png'); ?>);"> -->

  <!-- Header -->

    <div class="ui top fixed inverted pointing menu">
      <div class="header item">
        <img class="ui avatar image" src="<?php echo base_url('assets/images/Artajasa.png'); ?> ">
        <?php echo $_SESSION['NamaPIC']; ?>
      </div>
      <a class="item" href="<?php echo site_url('pic/beranda'); ?>">
        <div class="ui icon">
          <i class="home icon"></i>
          Dashboard</div>
        </a>
        <a class="item" href="<?php echo site_url('pic/checklist'); ?>">
          <div class="ui icon">
            <i class="check square icon"></i>
          Checklist</div>
        </a>
        <a class="item" href="<?php echo site_url('pic/absensi'); ?>">
          <div class="ui icon">
            <i class="user icon"></i>    
          Absensi PIC</div>
        </a>

        
        <div class="right menu">
       
          <div class="ui black label" style="margin-top: 3%">
     <!--      <i class="clock outline icon" style="margin-top: 3.5%; color: white;"></i> -->
          <span id="date_time" style="
                                    margin-top: 3.2%;
                                    color: white;
                                    font-size: 15px;
                                    font-family: : Orbitron;
                                    letter-spacing: 1px;
          "></span>
         </div> 

        
          <!-- <div class="ui pointing dropdown link item">
            <span class="text">

            Notifications</span>
            <div class="ui small label">1</div>
            <div class="menu">
              <div class="header">
                <i class= "bell icon"></i>
              Notifications</div>
              <div class="ui relaxed divided list" style="margin: auto+10px auto+10px; padding-bottom: 10px;">
                <div class="item">
                  <div class="content">
                    <a class="header">Semantic-Org/Semantic-UI</a>
                    <div class="description">Updated 10 mins ago</div>
                  </div>
                </div>
                <div class="item">
                  <div class="content">
                    <a class="header">Semantic-Org/Semantic-UI-Docsssss
                    </a>
                    <div class="description">Updated 22 mins ago sjjsak
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
          </div> -->

        <!-- <a class="item" href="<?php echo site_url('pic/ubahPassword'); ?>">
          <i class="cog icon"></i>Setting -->

        

        <form method="POST" action="<?php echo site_url('pic/ubahPassword'); ?>">
          <input type="hidden" name="NIK" value="<?php echo($_SESSION['nik']) ?>">
          <div class="item" style="align-items: center; margin-top: 3px ">
            <button class="ui grey button">
              <i class="setting icon"></i>
              Setting
            </button>
          </div>
        </form>
     
          <a href="<?php echo site_url('pic/keluar'); ?>" style="color: white;" onClick="return confirm('Apa anda yakin ingin keluar ?');">
          <div class="item" style="margin-top: 3px ">
              <div class="ui teal button">
                <i class="sign out alternate icon" icon"></i>Log Out
              </div>
          </div>
          </a>
      </div>
    </div>
    </div>
  </div>
  <br><br><br><br><br>

  <script type="text/javascript">window.onload = date_time('date_time');</script>

