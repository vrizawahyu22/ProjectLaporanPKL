<script type="text/javascript">
        $(document).ready(function() 
        { 
          $('table').tablesort(); 
        } 
        ); 
      </script>
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
          Absensi PIC 

        </h3>

        <div class="field" style="margin-left: 600px; margin-top: -45px" data-tooltip="Klik untuk Pilih Bulan" data-inverted="" data-position="top right" >
          <form method="POST" action="<?php echo site_url('pic/absensi') ?>">
          <select class="ui search right selection tiny dropdown item" name="bulan">
            <option value="<?php echo $bulanini; ?>"><?php echo $bulanini; ?></option>
            <?php foreach ($bulan as $bulan) { ?>
              <option value="<?php echo $bulan; ?>"><?php echo $bulan; ?></option>
            <?php } ?>
          </select> 
          <button class="ui right floated tiny basic icon button" data-tooltip="Cari Absensi" data-inverted="" data-position="top right" >
                <i class="search icon" style="padding-bottom:10px; padding-top:10px; "></i>
            </button>          
          </form>
        </div>
          
        </div>

        <div class="ui divider"></div>

        <table class="ui sortable compact celled definition table" id="mytable">
          <thead class="full-width" style="text-align: center; background-color: #dbedff">
            <tr>
              <th class="sorted ascending">NIK</th>
              <th class="">Nama PIC</th>
              <th class="">Shift</th>
              <th class="">Jam</th>
              <th class="">Hari</th>
              <th class="">Kehadiran</th>
            </tr>
          </thead>

          <tbody id="hasil" style="text-align: center">

            <?php foreach ($absensi as $absensi ) { ?>
            <?php if ($absensi['Status'] == 'Enabled' AND $absensi['NIK'] == $_SESSION['nik']) { ?>
            <tr>
              <td> <?php echo $absensi['NIK'] ?> </td>
              <td> <?php echo $absensi['NamaPIC'] ?> </td>
              <td> <?php echo $absensi['Shift'] ?> </td>
              <td> <?php echo $absensi['Jam'] ?> </td>
              <td> <?php echo $absensi['Hari'] ?> </td>
              <td> <?php echo $absensi['Kehadiran'] ?></td>
            </tr>
            <?php } ?>
            <?php } ?>
            
          </tbody>
          <tfoot class="full-width">
            <tr>
              <th colspan="8"></th>
            </tr>
          </tfoot>
        </form>
      </table>
      <div class="pagination-container">
      <nav>
        <ul class="pagination"></ul>
      </nav>
    </div>
    </div>
  </div>
</div>