<div class="ui two column centered grid">
<div class="column">
 <div class="ui segment">
  <h3 style="text-align: center;">
   <div class="ui icon">
     <i class="user icon"></i>
   Tambah Checklist</div></h3>
   <div class="ui divider"></div>
 
  <form class="ui form" method="POST" action="<?php echo site_url('admin/validasitambahchecklist'); ?>" enctype="multipart/form-data">
    <div class="field">
      <label>Nama Checklist</label>
      <input type="text" name="NamaChecklist" placeholder="Nama Checklist">
    </div>
    <div class="grouped fields">
    <label>Jadwal Pengecekan:</label>
    <div class="field">
      <div class="ui radio checkbox" class="radio">
        <input type="radio" name="Jam" checked="checked" tabindex="0" value="Setiap Jam">
        <label>Setiap Jam</label>
      </div>
    </div>
    <div class="field" style="width: 100%">
      <div class="ui radio checkbox">
        <input type="radio" name="Jam" tabindex="0" value="Lainnya">
        <label>Lainnya</label>      
      </div>
      <div class="field" style="margin-left: 25px" id="lainnya">
        <input type="text" name="Jam1" placeholder="Tulis Jam disini (03:00, 07:00, 11:00, dst)">
    </div>
    </div>
    <label>Batas Pengecekan</label>
    <div class="field">
      <select class="ui dropdown" name="BatasPengecekan">
        <option value="">Batas Waktu Pengecekan</option>
        <option value="10">10 Menit</option>
        <option value="20">20 Menit</option>
        <option value="30">30 Menit</option>
        <option value="40">40 Menit</option>
        <option value="50">50 Menit</option>
        <option value="60">60 Menit</option>
      </select>
    </div>
    <label>Tingkat Pengecekan</label>
    <div class="field">
      <select class="ui dropdown" name="TingkatPengecekan">
        <option value="">Tingkat Pengecekan</option>
        <option value="Mudah">Mudah</option>
        <option value="Sedang">Sedang</option>
        <option value="Sulit">Sulit</option>
      </select>
    </div>
    <div class="ui small field" >
      <label>Instruksi Pengerjaan (.txt)</label>
      <input type="file" name="Info" id="fileToUpload">
    </div>    

  <div class="ui center aligned basic segment">
    <button class="ui blue button" type="submit">
      <i class="save icon"></i>
    Simpan
  </button>
	</div>
  </form>
</div>
</div>
</div>
</div>

<script>
  jQuery(function() {

    jQuery('#lainnya').hide();

      jQuery('.radio').change(function() {
        selected_value = $("input[name='Jam']:checked").val();
        jQuery('#lainnya').toggle();
    });
  });


</script>