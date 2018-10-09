<div class="ui two column centered grid">
<div class="column">
 <div class="ui segment">
  <h3 style="text-align: center;">
   <div class="ui icon">
     <i class="user icon"></i>
   Edit Checklist</div></h3>
   <div class="ui divider"></div>

  <form class="ui form" method="POST" action="<?php echo site_url('admin/validasieditchecklist'); ?>" enctype="multipart/form-data">
    <div class="field">
      <label>Nama Checklist</label>
      <input type="text" name="NamaChecklist" placeholder="Nama Checklist" value="<?php echo $checklist['NamaChecklist']; ?>" disabled>
    </div>
    <div class="field">
        <label>Jadwal Pengecekan</label>
        <select style="min-width: 10em;" class="ui search dropdown" name="Jam">
          <option value="<?php echo $checklist['Jam'] ?>"><?php echo $checklist['Jam']; ?></option>
          <option value="00">00:00</option>
          <option value="01">01:00</option>
          <option value="02">02:00</option>
          <option value="03">03:00</option>
          <option value="04">04:00</option>
          <option value="05">05:00</option>
          <option value="06">06:00</option>
          <option value="07">07:00</option>
          <option value="08">08:00</option>
          <option value="09">09:00</option>
          <option value="10">10:00</option>
          <option value="11">11:00</option>
          <option value="12">12:00</option>
          <option value="13">13:00</option>
          <option value="14">14:00</option>
          <option value="15">15:00</option>
          <option value="16">16:00</option>
          <option value="17">17:00</option>
          <option value="18">18:00</option>
          <option value="19">19:00</option>
          <option value="20">20:00</option>
          <option value="21">21:00</option>
          <option value="22">22:00</option>
          <option value="23">23:00</option>
        </select>
      </div>
    <div class="field">
      <label>Batas Pengecekan</label>
      <select class="ui dropdown" name="BatasPengecekan">
        <option value="<?php echo $checklist['BatasPengecekan'] ?>"><?php echo $checklist['BatasPengecekan'] ?> Menit</option>
        <option value="10">10 Menit</option>
        <option value="20">20 Menit</option>
        <option value="30">30 Menit</option>
        <option value="40">40 Menit</option>
        <option value="50">50 Menit</option>
        <option value="60">60 Menit</option>
      </select>
    </div>
    <div class="field">
      <label>Tingkat Pengecekan</label>
      <select class="ui dropdown" name="TingkatPengecekan">
        <option value="<?php echo $checklist['TingkatPengecekan'] ?>"><?php echo $checklist['TingkatPengecekan'] ?></option>
        <option value="Mudah">Mudah</option>
        <option value="Sedang">Sedang</option>
        <option value="Sulit">Sulit</option>
      </select>
    </div>
    <div class="ui small field" >
    <label>Instruksi Pengecekan</label>
    <input type="file" name="Info" id="fileToUpload">
    
  </div>

  <input type="hidden" name="NamaChecklist" placeholder="Nama Checklist" value="<?php echo $checklist['NamaChecklist']; ?>">
  <input type="hidden" name="IDChecklist" placeholder="Nama Checklist" value="<?php echo $checklist['IDChecklist']; ?>">

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
