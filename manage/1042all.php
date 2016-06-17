<!DOCTYPE html>
<html>
<head>
<?php require("include/head.html");?>
</head>
<body>
<?php require("include/menu.php");?>
<div class="container">
<?php
require("../connect.php");
?>
  <ul id="Tab" class="nav nav-tabs" role="tablist">
    <li class="active"><a href="#1042classtab" role="tab" data-toggle="tab">上課簽到</a></li>
  </ul>

  <div id="userTabContent" class="tab-content">
    <div class="tab-pane fade in active" id="1042classtab">
      <table class="table table-hover" id="1042class">
        <thead><tr>
          <th>姓名</th>
          <th>簽到時間</th>
        </tr></thead>
        <tbody>
        <?php
          foreach($dbh->query("SELECT user.Name, 1042log.DateTime FROM user
                               INNER JOIN 1042log ON user.CardNum = 1042log.CardNum ORDER BY DateTime DESC;") as $rs) {
            echo
            "<tr><td>", $rs['Name'],
            "</td><td>", $rs['DateTime'],
            "</td></tr>\n";
          }
        ?>
        </tbody>
        <tfoot><tr>
          <th>姓名</th>
          <th>簽到時間</th>
        </tr></tfoot>
      </table>
    </div><!-- End of 1042classtab -->

  </div><!--End of TabContent-->

<script>
  $(document).ready(function(){
<?php require("datatables.html"); ?>
    $('#1042class').DataTable(opt);
  });
</script>
</div><!-- End of container -->
<?php require("include/footer.html"); ?>
</body>
</html>
