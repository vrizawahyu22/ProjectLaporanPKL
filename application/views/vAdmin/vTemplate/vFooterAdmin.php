
<br><br><br><br><!-- <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br> -->
  <div class="ui inverted vertical footer segment" style="position: fixed; bottom: 0px; left: 0px; right: 0px;">
    <div class="ui center aligned container">
    Copyright © Artajasa 2018
  </div>
</div>


  <script src="<?php echo base_url('assets/Semantic-UI/semantic.min.js'); ?>"></script>
  <script type="text/javascript">
      $(document).ready(function(){
        $("#pencarian").on("keyup", function() {
          var value = $(this).val().toLowerCase();
          $("#hasil tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          });
          $("#hasil tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          });
        }); 
      });
  </script>
</body>
</html>