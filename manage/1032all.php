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
    <li class="active"><a href="#1032classtab" role="tab" data-toggle="tab">上課簽到</a></li>
    <li><a href="#1032firsttab" role="tab" data-toggle="tab">期初教育訓練</a></li>
    <li><a href="#1032meettab" role="tab" data-toggle="tab">相見歡</a></li>
    <li><a href="#1032wedtab" role="tab" data-toggle="tab">星期三</a></li>
  </ul>

  <div id="userTabContent" class="tab-content">
    <div class="tab-pane fade in active" id="1032classtab">
      <table class="table table-hover" id="1032class">
        <thead><tr>
          <th>姓名</th>
          <th>簽到時間</th>
        </tr></thead>
        <tbody>
        <?php
          foreach($dbh->query("SELECT user.Name, 1032log.DateTime FROM user
                               INNER JOIN 1032log ON user.CardNum = 1032log.CardNum ORDER BY DateTime DESC;") as $rs) {
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
    </div><!-- End of 1032classtab -->

    <div class="tab-pane fade" id="1032firsttab">
      <table class="table table-hover" id="1032first">
        <thead><tr>
          <th>姓名</th>
          <th>學號</th>
          <th>簽到時間</th>
        </tr></thead>
        <tbody>
        <?php
          foreach($dbh->query("SELECT * FROM user LEFT JOIN(
                                 SELECT CardNum as C, DateTime as 'times' FROM 1032first
                               )as test ON user.CardNum = test.C WHERE times IS NOT NULL ORDER BY Name;") as $first) {
            echo "<tr><td>".$first['Name'];
            echo "</td><td>".$first['Sid'];
            echo "</td><td>".$first['times'];
            echo "</td></tr>\n";
          }
        ?>
        </tbody>
        <tfoot><tr>
          <th>姓名</th>
          <th>學號</th>
          <th>簽到時間</th>
        </tr></tfoot>
      </table>
    </div><!-- End of 1032firsttab -->

    <div class="tab-pane fade" id="1032meettab">
      <table class="table table-hover" id="1032meet">
        <thead><tr>
          <th>姓名</th>
          <th>學號</th>
          <th>簽到時間</th>
        </tr></thead>
        <tbody>
        <?php
          foreach($dbh->query("SELECT * FROM user LEFT JOIN(
                                 SELECT CardNum as C, DateTime as 'times' FROM 1032meet
                               )as test ON user.CardNum = test.C WHERE times IS NOT NULL ORDER BY Name;") as $first) {
            echo "<tr><td>".$first['Name'];
            echo "</td><td>".$first['Sid'];
            echo "</td><td>".$first['times'];
            echo "</td></tr>\n";
          }
        ?>
        </tbody>
        <tfoot><tr>
          <th>姓名</th>
          <th>學號</th>
          <th>簽到時間</th>
        </tr></tfoot>
      </table>
    </div><!-- End of 1032meettab -->

    <div class="tab-pane fade" id="1032wedtab">
      <table class="table table-hover" id="1032wed">
        <thead><tr>
          <th>姓名</th>
          <th>學號</th>
          <th>簽到時間</th>
        </tr></thead>
        <tbody>
        <?php
          foreach($dbh->query("SELECT * FROM user LEFT JOIN(
                                 SELECT CardNum as C, DateTime as 'times' FROM Wed_log
                               )as test ON user.CardNum = test.C WHERE times IS NOT NULL ORDER BY times DESC;") as $first) {
            echo "<tr><td>".$first['Name'];
            echo "</td><td>".$first['Sid'];
            echo "</td><td>".$first['times'];
            echo "</td></tr>\n";
          }
        ?>
        </tbody>
        <tfoot><tr>
          <th>姓名</th>
          <th>學號</th>
          <th>簽到時間</th>
        </tr></tfoot>
      </table>
    </div><!-- End of 1032meettab -->

  </div><!--End of TabContent-->

<script>
  $(document).ready(function(){
<?php require("datatables.html"); ?>
    $("#1032class, #1032first, #1032meet, #1032wed").DataTable(opt);
  });
</script>
</div><!-- End of container -->
<?php require("include/footer.html"); ?>
</body>
</html>
