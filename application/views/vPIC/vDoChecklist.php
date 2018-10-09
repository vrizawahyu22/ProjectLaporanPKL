
<div class="ui two column centered grid">
<div class="column">
 <div class="ui segment">
  <h3 style="text-align: center;">
   <div class="ui icon">
     <i class="pencil icon"></i>
   Pengecekan</div></h3>
   <div class="ui divider"></div>
 
  <form class="ui form" method="POST" action="<?php echo site_url('admin/validasitambahchecklist'); ?>" enctype="multipart/form-data">
    <div class="disabled field">
      <label>Nama PIC</label>
      <input type="text" name="NamaPIC" placeholder="Nama PIC">
    </div>
    <div class="disabled field">
      <label>Nama Checklist</label>
      <input type="text" name="NamaChecklist" placeholder="Nama Checklist">
    </div>
    <div class="ui disabled small field" >
      <label>Instruksi Pengerjaan</label>
      <input type="file" name="Info" id="fileToUpload">
    </div>
    <div class="ui disabled small field" >
      <label>Jadwal Pengecekan</label>
      <input type="text" name="Jam">
    </div>
    <div>
      <label>Status</label>
      <select class="ui selection tiny dropdown" style="min-width: 1em;"">
              <option value="1">OK</option>
              <option value="0">Bad</option>
              <option value="0">Not Checked</option>
          </select>
    </div>
    <br>
    <div class="ui form">
      <label>Keterangan</label>
      <div class="field">
      <textarea></textarea>
    </div>
    </div>
    

  <div class="ui center aligned basic segment">
    <button class="ui blue button" type="submit">
      <i class="file icon"></i>
    Simpan
  </button>
  </div>
  </form>
</div>
</div>
</div>
</div>
