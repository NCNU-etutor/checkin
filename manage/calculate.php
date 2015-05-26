<!DOCTYPE html>
<html>
<head>
<?php require("include/head.html");?>
</head>
<body>
<div class="container">
<?php require("include/menu.php");?>
<?php
require("../connect.php");
?>
  <ul id="allTab" class="nav nav-tabs" role="tablist">
    <li class="active"><a href="#1032" role="tab" data-toggle="tab">1032</a></li>
    <li><a href="#1031" role="tab" data-toggle="tab">1031</a></li>
  </ul>

  <div id="userTabContent" class="tab-content">
    <div class="tab-pane fade in active" id="1032">
      <?php require("1032all.php"); ?>
    </div><!-- End of 1032 -->

    <div class="tab-pane fade" id="1031">
      <?php require("1031all.php"); ?>
    </div><!-- End of 1031 -->
  </div><!--End of TabContent-->

<script>
  $(document).ready(function(){
    $('a[href="calculate.php"]').attr('disabled', true);
    $('#allTab li a').click(function (e) {
      e.preventDefault();
      $('#Tab li').attr('class', '');
    })
  });
</script>
</div><!-- End of container -->
<?php require("include/footer.html"); ?>
</body>
</html>
