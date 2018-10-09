<div class="content-wrapper">
  <div class="container-fluid">

    <form method="POST" action="<?php echo site_url('admin/gantiabsensi'); ?>">
    <div class="container-fluid" style="margin-top: 30px">
      <div class="row">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <div></div>
            <h3 class="panel-title" style="text-align: center;">DAFTAR PIC</h3>
            <div class="pull-right"> 
            </div>
          </div>
          <table class="table table-hover" id="dev-table">
            <thead>
              <tr>
                <th>Nama PIC</th>
                <th>Kehadiran</th>
              </tr>
            </thead>
            <tbody>

              <input type="hidden" name="jumlahAbsensi" value="<?php echo count($absensi); ?>">
            <?php for ($i=0; $i < count($absensi); $i++) { ?>
            <?php echo 'IDHarian'.$i; ?>
              <tr>
                  <td><?php echo $absensi[$i]['NamaPIC']; ?></td>
                  <td>
                    <input type="hidden" name="<?php echo 'IDHarian'.$i; ?>" value="<?php echo $absensi[$i]['IDHarian']; ?>">

                    <select name="<?php echo 'Kehadiran'.$i; ?>" onClick>
                      <option value="<?php echo $absensi[$i]['Kehadiran'] ?>"><?php echo $absensi[$i]['Kehadiran'] ?></option>
                      <option value="Hadir">Hadir</option>
                      <option value="Tidak Hadir">Tidak Hadir</option>
                    </select>
                  </td>
              </tr>>
            <?php } ?>
                </tbody>
            </table>
        </div>
                
                
          </div>
            </div>
            <td>
                <div class="container-btn-edit" style="text-align: right; margin-right: 35%">
                  <button class="btn btn-dark">
                    <span>
                        <span class="glyphicon glyphicon-user"></span>Tambah PIC
                   </span>
                  </button>
                </div>
              </form>
            </td>

          </div>
</div>