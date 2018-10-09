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
      
      <?php if ($_SESSION['nama'] == 'admin'): ?>       
          <a class="ui right floated tiny blue icon button" data-tooltip="Klik untuk Tambah PIC" data-inverted="" data-position="top right" style="margin-top: -40px" href="<?php echo site_url('admin/tambahpic'); ?>">
            <i class="add icon"></i>
          </a>
      <?php endif ?>
      

      </div>

      <div class="ui divider"></div>
      <!-- <div class= "ui field">
        <select name="state" id="maxRows" class="form-control" style="width:150px;">
                        <option value="10">10</option>
                        <option value="5000">Show All</option>
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="75">75</option>
                        <option value="100">100</option>
                    </select>
                  </div>
 -->
<table class="ui sortable compact celled definition white table" id="mytable" style="text-align: center;">
  <thead class="full-width" style="text-align: center; background-color: #dbedff">
    <tr>
      <th class="sorted ascending">NIK</th>
      <th class="">Nama PIC</th>
      <th class="">Divisi</th>
      <th class="">Jabatan</th>
      <th class="">Tahun Masuk</th>
      <th class="">Jumlah Pengecekan</th>
      <th>Edit</th>
      <th>
        <div class="ui simple dropdown item" style="color: black;">
        Status
          <i class="dropdown icon"></i>
            <div class="menu">
              <a class="item" href="<?php echo site_url('admin/pic/Enabled') ?>">Enabled</a>
              <a class="item" href="<?php echo site_url('admin/pic/Disabled') ?>">Disabled</a>
            </div>
        </div>
      </th>
    </tr>
  </thead>
  <tbody id="hasil">
    <form method="POST" action="<?php echo base_url('admin/hapuspic'); ?>">
    <?php $nEnabled = 0; $nDisabled = 0; $nJumlah = count($pic);?>
    <?php for ($i=0; $i < count($pic) ; $i++) { ?>
    <?php 'NIK'.$i; ?>
    <?php if ($status == 'Enabled' AND $pic[$i]['Status'] == 'Enabled') { ?>
    <?php $nEnabled = $nEnabled +1; ?>
    <tr>
      <td><?php echo $pic[$i]['NIK'] ?></td>
      <td><?php echo $pic[$i]['NamaPIC'] ?></td>
      <td><?php echo $pic[$i]['Divisi'] ?></td>
      <td><?php echo $pic[$i]['Jabatan'] ?></td>
      <td><?php echo $pic[$i]['TahunMasuk'] ?></td>
      <td><?php echo $pic[$i]['JumlahPengecekan'] ?></td>
      <td>
       <!--  <form method="GET" action="<?php echo base_url('admin/editpic'); ?> ">
            <input type="hidden" name="NIK" value="<?php echo $pic[$i]['NIK'] ?>">
            <button class="ui small blue button">
              <i class="edit icon"></i>Edit
            </button>
        </form> -->
        <?php $edit = 'admin/editpic/'.$pic[$i]['NIK'] ?>
        <a href="<?php echo site_url($edit) ;?>" class="ui basic small blue button">
          <i class="icon edit"></i>
            Edit
        </a>
      </td>
      <td>
          <input type="hidden" name="<?php echo 'NIK'.$i; ?>" value="<?php echo $pic[$i]['NIK']; ?>">
          <select name="<?php echo 'status'.$i; ?>"  style="min-width: 10em;cursor: pointer;
                                                                                    word-wrap: break-word;
                                                                                    line-height: 1em;
                                                                                    white-space: normal;
                                                                                    outline: 0;
                                                                                    -webkit-transform: rotateZ(0deg);
                                                                                    transform: rotateZ(0deg);
                                                                                    min-width: 14em;
                                                                                    min-height: 2.71428571em;
                                                                                    background: #FFFFFF;
                                                                                    display: inline-block;
                                                                                    padding: 0.78571429em 2.1em 0.78571429em 1em;
                                                                                    color: rgba(0, 0, 0, 0.87);
                                                                                    -webkit-box-shadow: none;
                                                                                    box-shadow: none;
                                                                                    border: 1px solid rgba(34, 36, 38, 0.15);
                                                                                    border-radius: 0.28571429rem;
                                                                                    -webkit-transition: width 0.1s ease, -webkit-box-shadow 0.1s ease;
                                                                                    transition: width 0.1s ease, -webkit-box-shadow 0.1s ease;
                                                                                    transition: box-shadow 0.1s ease, width 0.1s ease;
                                                                                    transition: box-shadow 0.1s ease, width 0.1s ease, -webkit-box-shadow 0.1s ease;">
            <?php if ($pic[$i]['Status'] == "Enabled") { ?>
              <option value="<?php echo $pic[$i]['Status']; ?>"><?php echo $pic[$i]['Status']; ?></option>
              <option value="Disabled">Disabled</option>
            <?php } ?>
            <?php if ($pic['Status'] == "Disabled") { ?>
              <option value="<?php echo $pic['Status']; ?>"><?php echo $pic['Status']; ?></option>
              <option value="Enabled">Enabled</option>
            <?php } ?>
          </select>
      </td>
    </tr>
    <?php } elseif ($status == 'Disabled' AND $pic[$i]['Status'] == 'Disabled') { ?>
    <?php $nDisabled = $nDisabled +1; ?>
    <tr>
      <td><?php echo $pic[$i]['NIK'] ?></td>
      <td><?php echo $pic[$i]['NamaPIC'] ?></td>
      <td><?php echo $pic[$i]['Divisi'] ?></td>
      <td><?php echo $pic[$i]['Jabatan'] ?></td>
      <td><?php echo $pic[$i]['TahunMasuk'] ?></td>
      <td><?php echo $pic[$i]['JumlahPengecekan'] ?></td>
      <td>

        <?php $edit = 'admin/editpic/'.$pic[$i]['NIK'] ?>
        <a href="<?php echo site_url($edit) ;?>" class="ui basic small blue button">
          Edit
        </a>
      </td>
      <td>
          <input type="hidden" name="<?php echo 'NIK'.$i; ?>" value="<?php echo $pic[$i]['NIK']; ?>">
          <select name="<?php echo 'status'.$i; ?>"  style="min-width: 10em; cursor: pointer;
                                                                                    word-wrap: break-word;
                                                                                    line-height: 1em;
                                                                                    white-space: normal;
                                                                                    outline: 0;
                                                                                    -webkit-transform: rotateZ(0deg);
                                                                                    transform: rotateZ(0deg);
                                                                                    min-width: 14em;
                                                                                    min-height: 2.71428571em;
                                                                                    background: #FFFFFF;
                                                                                    display: inline-block;
                                                                                    padding: 0.78571429em 2.1em 0.78571429em 1em;
                                                                                    color: rgba(0, 0, 0, 0.87);
                                                                                    -webkit-box-shadow: none;
                                                                                    box-shadow: none;
                                                                                    border: 1px solid rgba(34, 36, 38, 0.15);
                                                                                    border-radius: 0.28571429rem;
                                                                                    -webkit-transition: width 0.1s ease, -webkit-box-shadow 0.1s ease;
                                                                                    transition: width 0.1s ease, -webkit-box-shadow 0.1s ease;
                                                                                    transition: box-shadow 0.1s ease, width 0.1s ease;
                                                                                    transition: box-shadow 0.1s ease, width 0.1s ease, -webkit-box-shadow 0.1s ease;">
            <?php if ($pic[$i]['Status'] == "Enabled") { ?>
              <option value="<?php echo $pic['Status']; ?>"><?php echo $pic[$i]['Status']; ?></option>
              <option value="Disabled">Disabled</option>
            <?php } ?>
            <?php if ($pic[$i]['Status'] == "Disabled") { ?>
              <option value="<?php echo $pic[$i]['Status']; ?>"><?php echo $pic[$i]['Status']; ?></option>
              <option value="Enabled">Enabled</option>
            <?php } ?>
          </select>
      </td>
    </tr>
    <?php } ?>
    <?php } ?>
  </tbody>
  <tfoot class="full-width">
    <tr>
      <th colspan="8">
        
      </th>
    </tr>
  </tfoot>

</table>
<input type="hidden" name="nJumlah" value="<?php echo $nJumlah; ?>">
        <input type="hidden" name="nDisabled" value="<?php echo $nDisabled; ?>">
        <input type="hidden" name="nEnabled" value="<?php echo $nEnabled; ?>">
        <button class="ui right floated blue small button" >
          <i class="save icon"></i>
          Simpan
        </button>
      </form>
    
        <div class="pagination-container">
          <nav>
            <ul class="pagination"></ul>
          </nav>
        </div>
<!-- <br><br> -->
</div>
</div>
</div>


<!-- <script>
    var table = '#mytable'
    $(function(){
      $('.pagination').html('')
        var trnum = 0
        var maxRows = 10;
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
    // $('#maxRows').on('change', function(){
    //     $('.pagination').html('')
    //     var trnum = 0
    //     var maxRows = parseInt($(this).val())
    //     var totalRows = $(table+' tbody tr').length
    //     $(table+' tr:gt(0)').each(function(){
    //         trnum++
    //         if(trnum > maxRows){
    //             $(this).hide()
    //         }
    //         if(trnum <= maxRows){
    //             $(this).show()
    //         }
    //     })

    //     if(totalRows > maxRows){
    //         var pagenum = Math.ceil(totalRows/maxRows)
    //         for(var i=1;i<=pagenum;){
    //             $('.pagination').append('<li data-page="'+i+'">\<span>'+ i++ +'<span class="sr-only">(current)</span></span>\</li>').show()
    //         }
    //     }
    //     $('.pagination li:first-child').addClass('active')
    //     $('.pagination li').on('click',function(){
    //         var pageNum = $(this).attr('data-page')
    //         var trIndex = 0;
    //         $('.pagination li').removeClass('active')
    //         $(this).addClass('active')
    //         $(table+' tr:gt(0)').each(function(){
    //             trIndex++
    //             if(trIndex > (maxRows*pageNum) || trIndex <= ((maxRows*pageNum)-maxRows)){
    //                 $(this).hide()
    //             } else{
    //                 $(this).show()
    //             }
    //         })
    //     })
    // })

  </script> -->



