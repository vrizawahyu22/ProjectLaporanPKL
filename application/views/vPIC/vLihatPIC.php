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
      Daftar PIC 
      </h3>
      </div>

      <div class="ui divider"></div>

<table class="ui sortable compact celled definition white table" id="example" class="display" style="text-align: center;">
  <thead class="full-width" style="text-align: center; background-color: #dbedff">
    <tr>
      <th class="sorted ascending">NIK</th>
      <th class="">Nama PIC</th>
      <th class="">Divisi</th>
      <th class="">Jabatan</th>
      <th class="">Tahun Masuk</th>
      <th class="">Jumlah Pengecekan</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($pic as $pic) { ?>
       <tr>
      <td> <?php echo $pic['NIK'] ?> </td>
      <td> <?php echo $pic['NamaPIC'] ?> </td>
      <td> <?php echo $pic['Divisi'] ?> </td>
      <td> <?php  echo $pic['Jabatan'] ?> </td>
      <td> <?php echo $pic['TahunMasuk'] ?> </td>
      <td> <?php echo $pic['JumlahPengecekan'] ?> </td>
    </tr>
     <?php } ?>
    
  </tbody>
  <tfoot class="full-width">
    <tr>
      
    </tr>
  </tfoot>
  </form>
</table>
<br><br>
</div>
</div>
</div>


<!-- <?php 
  foreach ($pic as $pic) {
    echo $pic['NIK'];
    echo '<br>';
    echo $pic['NamaPIC'];
    echo '<br>';
  }
?> -->