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
    <li class="active"><a href="#1031classtab" role="tab" data-toggle="tab">上課簽到</a></li>
    <li><a href="#1031Wedtab" role="tab" data-toggle="tab">週三輔導</a></li>
    <li><a href="#1031hezuotab" role="tab" data-toggle="tab">合作相見歡</a></li>
    <li><a href="#1031pingjingtab" role="tab" data-toggle="tab">平靜相見歡</a></li>
    <li><a href="#1031ygestab" role="tab" data-toggle="tab">永光相見歡</a></li>
    <li><a href="#1031yuchihtab" role="tab" data-toggle="tab">魚池相見歡</a></li>
    <li><a href="#1031endingtab" role="tab" data-toggle="tab">期末</a></li>
  </ul>
  <div id="userTabContent" class="tab-content">
    <div class="tab-pane fade in active" id="1031classtab">
      <table class="table table-hover" id="1031class"> 
        <thead><tr>
          <th>姓名</th>
          <th>簽到時間</th>
        </tr></thead>
        <tbody>
        <?php
          foreach($dbh->query("SELECT user.Name, 1031log.DateTime FROM user 
                               INNER JOIN 1031log ON user.CardNum = 1031log.CardNum ORDER BY DateTime DESC;") as $rs) {
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
    </div><!-- End of 1031class -->

    <div class="tab-pane fade" id="1031Wedtab">
      <table class="table table-hover" id="1031Wed">
        <thead><tr>
          <th>姓名</th>
          <th>學號</th>
          <th>參加次數</th>
          <th>詳細時間</th>
        </tr></thead>
        <tbody>
        <?php
          foreach($dbh->query("SELECT * FROM user LEFT JOIN(
                                 SELECT CardNum as C, count(DateTime) as 'times' FROM 1031Wed_log
                                 GROUP BY CardNum
                               )as test ON user.CardNum = test.C ORDER BY Name;") as $wed) {
            if($wed['times'] == "") $wed['times']=0;
            echo "<tr><td>".$wed['Name'];
            echo "</td><td>".$wed['Sid'];
            echo "</td><td><meter value='".$wed['times']."' min='0' max='3'></meter>&nbsp;&nbsp;".$wed['times']."次";
            echo "</td><td>";
            foreach($dbh->query("SELECT DateTime FROM 1031Wed_log WHERE CardNum = '".$wed['CardNum']."';") as $w) {
              echo $w['DateTime']."<br>\r";
            }
            echo "</td></tr>\n";
          }
        ?>
        </tbody>
        <tfoot><tr>
          <th>姓名</th>
          <th>學號</th>
          <th>參加次數</th>
          <th>詳細時間</th>
        </tr></tfoot>
      </table>
    </div><!-- End of 1031Wed -->

    <div class="tab-pane fade" id="1031ygestab">
      <table class="table table-hover" id="1031yges">
        <thead><tr>
          <th>姓名</th>
          <th>學號</th>
          <th>簽到時間</th>
        </tr></thead>
        <tbody>
        <?php
          foreach($dbh->query("SELECT * FROM user LEFT JOIN(
                                 SELECT CardNum as C, DateTime as 'times' FROM 1031yges
                               )as test ON user.CardNum = test.C WHERE times IS NOT NULL ORDER BY Name;") as $yges) {
            echo "<tr><td>".$yges['Name'];
            echo "</td><td>".$yges['Sid'];
            echo "</td><td>".$yges['times'];
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
    </div><!-- End of 1031yges -->

    <div class="tab-pane fade" id="1031yuchihtab">
      <table class="table table-hover" id="1031yuchih">
        <thead><tr>
          <th>姓名</th>
          <th>學號</th>
          <th>簽到時間</th>
        </tr></thead>
        <tbody>
        <?php
          foreach($dbh->query("SELECT * FROM user LEFT JOIN(
                                 SELECT CardNum as C, DateTime as 'times' FROM 1031yuchih
                               )as test ON user.CardNum = test.C WHERE times IS NOT NULL ORDER BY Name;") as $yuchih) {
            echo "<tr><td>".$yuchih['Name'];
            echo "</td><td>".$yuchih['Sid'];
            echo "</td><td>".$yuchih['times'];
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
    </div><!-- End of 1031yuchih -->

    <div class="tab-pane fade" id="1031pingjingtab">
      <table class="table table-hover" id="1031pingjing">
        <thead><tr>
          <th>姓名</th>
          <th>學號</th>
          <th>簽到時間</th>
        </tr></thead>
        <tbody>
        <?php
          foreach($dbh->query("SELECT * FROM user LEFT JOIN(
                                 SELECT CardNum as C, DateTime as 'times' FROM 1031pingjing
                               )as test ON user.CardNum = test.C WHERE times IS NOT NULL ORDER BY Name;") as $pingjing) {
            echo "<tr><td>".$pingjing['Name'];
            echo "</td><td>".$pingjing['Sid'];
            echo "</td><td>".$pingjing['times'];
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
    </div><!-- End of 1031pingjing -->

    <div class="tab-pane fade" id="1031hezuotab">
      <table class="table table-hover" id="1031hezuo">
        <thead><tr>
          <th>姓名</th>
          <th>學號</th>
          <th>簽到時間</th>
        </tr></thead>
        <tbody>
        <?php
          foreach($dbh->query("SELECT * FROM user LEFT JOIN(
                                 SELECT CardNum as C, DateTime as 'times' FROM 1031hezuo
                               )as test ON user.CardNum = test.C WHERE times IS NOT NULL ORDER BY Name;") as $hezuo) {
            echo "<tr><td>".$hezuo['Name'];
            echo "</td><td>".$hezuo['Sid'];
            echo "</td><td>".$hezuo['times'];
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
    </div><!-- End of 1031hezuo -->

    <div class="tab-pane fade" id="1031endingtab">
      <table class="table table-hover" id="1031ending">
        <thead><tr>
          <th>姓名</th>
          <th>學號</th>
          <th>簽到時間</th>
        </tr></thead>
        <tbody>
        <?php
          foreach($dbh->query("SELECT * FROM user LEFT JOIN(
                                 SELECT CardNum as C, DateTime as 'times' FROM 1031ending
                               )as test ON user.CardNum = test.C WHERE times IS NOT NULL ORDER BY Name;") as $ending) {
            echo "<tr><td>".$ending['Name'];
            echo "</td><td>".$ending['Sid'];
            echo "</td><td>".$ending['times'];
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
    </div><!-- End of 1031ending -->

  </div><!--End of TabContent-->

<script>
  $(document).ready(function(){
<?php require("datatables.html"); ?>
    $("#1031class, #1031Wed, #1031yges, #1031yuchih, #1031pingjing, #1031hezuo, #1031ending").DataTable(opt);
  });
</script>
</div><!-- End of container -->
<?php require("include/footer.html"); ?>
</body>
</html>
