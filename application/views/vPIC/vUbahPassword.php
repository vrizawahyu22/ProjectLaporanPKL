<div class="ui two column centered grid">
<div class="column">
    <div class="ui segment">
        <h3 style="text-align: center;">
            <div class="ui icon">
            <i class="user icon"></i>
            Ubah Password</h3>
            <div class="ui divider"></div>
        <form class="ui form" method="POST" action="<?php echo site_url('pic/validasiubahpassword'); ?>" id="form" >
          <div class="field">
            <label>Nomor Induk Karyawan</label>
            <input type="text" placeholder="Nomor Induk Karyawan" value="<?php echo($pic['NIK']) ?>" disabled>
            <input type="hidden" name="NIK" placeholder="Nomor Induk Karyawan" value="<?php echo($pic['NIK']) ?>" >
          </div>
          <div class="field">
            <label>Nama PIC</label>
            <input type="text" name="NamaPIC" placeholder="Nama PIC" value="<?php echo($pic['NamaPIC']) ?>" disabled>
          </div>
          <div class="field">
            <label>Password Lama</label>
            <input type="hidden" name="passwordL2" id="passwordL2" value="<?php echo($pic['Password']) ?>">
            <input type="password" name="passwordL1" id="passwordL1" placeholder="Password Lama (password akan terenkripsi)" onchange="enkripsi();">
        </div>
            <div class="field">
            <label>Password Baru</label>
            <input type="password" name="password" id="password"  placeholder="Passowrd Baru">
          </div>
          <div class="field">
            <label>Confirm Password Baru</label>
            <input type="password" name="confirmpassword" placeholder="Confirm Passowrd Baru" value="">
          </div>
          
    
        <div class="ui center aligned basic segment">
          <button class="ui right vertical blue button" tabindex="0">
            <i class="save icon"></i>
              Simpan
            </button>
            </div>
        </form>

</div>
</div>
</div>
<script>



function enkripsi(){
  var pass = $('#passwordL1').val();
  var passL1 = md5(pass);
  console.log(passL1);
  document.getElementById("passwordL1").value = passL1;
}

$('.ui.form')
            .form({
              on: 'blur',
              inline : true,
              fields: {
                password: {
                  identifier  : 'password',
                  rules: [
                    {
                      type   : 'minLength[6]',
                      prompt : 'Password setidaknya 6 karakter'
                    },
                ]
              },
              confirmpassword: {
                  identifier  : 'confirmpassword',
                  rules: [
                    {
                      type   : 'match[password]',
                      prompt : "Password Anda tidak cocok"
                    },
                ]
              },
              passwordlama : {
                identifier : 'passwordL1',
                rules : [
                  {
                    type : 'match[passwordL2]',
                    prompt : "Password lama Anda salah"
                  },
                ]
              },
          }
      }
    );
</script>