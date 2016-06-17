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
    <li class="active"><a href="#1041classtab" role="tab" data-toggle="tab">上課簽到</a></li>
    <li><a href="#1041firsttab" role="tab" data-toggle="tab">期初教育訓練</a></li>
    <li><a href="#1041wordgametab" role="tab" data-toggle="tab">語文遊戲</a></li>
    <li><a href="#1041yuchihmeetingtab" role="tab" data-toggle="tab">魚池午餐</a></li>
    <li><a href="#1041pingjingmeetingtab" role="tab" data-toggle="tab">平靜午餐</a></li>
    <li><a href="#1041hezuomeetingtab" role="tab" data-toggle="tab">合作午餐</a></li>
    <li><a href="#1041wordgame2tab" role="tab" data-toggle="tab">語文遊戲2</a></li>
    <!--<li><a href="#1032wedtab" role="tab" data-toggle="tab">星期三</a></li>-->
  </ul>

  <div id="userTabContent" class="tab-content">
    <div class="tab-pane fade in active" id="1041classtab">
      <table class="table table-hover" id="1041class">
        <thead><tr>
          <th>姓名</th>
          <th>簽到時間</th>
        </tr></thead>
        <tbody>
        <?php
          foreach($dbh->query("SELECT user.Name, 1041log.DateTime FROM user
                               INNER JOIN 1041log ON user.CardNum = 1041log.CardNum ORDER BY DateTime DESC;") as $rs) {
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
    </div><!-- End of 1041classtab -->

    <div class="tab-pane fade" id="1041firsttab">
      <table class="table table-hover" id="1041first">
        <thead><tr>
          <th>姓名</th>
          <th>學號</th>
          <th>簽到時間</th>
          <th>簽退時間</th>
        </tr></thead>
        <tbody>
        <?php
          foreach($dbh->query("select * from 1041first LEFT JOIN user on 1041first.CardNum = user.CardNum;") as $first) {
            echo "<tr><td>".$first['Name'];
            echo "</td><td>".$first['Sid'];
            echo "</td><td>".$first['login'];
            echo "</td><td>".$first['logout'];
            echo "</td></tr>\n";
          }
        ?>
        </tbody>
        <tfoot><tr>
          <th>姓名</th>
          <th>學號</th>
          <th>簽到時間</th>
          <th>簽退時間</th>
        </tr></tfoot>
      </table>
    </div><!-- End of 1041firsttab -->

    <div class="tab-pane fade" id="1041wordgametab">
      <table class="table table-hover" id="1041wordgame">
        <thead><tr>
          <th>姓名</th>
          <th>學號</th>
          <th>簽到時間</th>
        </tr></thead>
        <tbody>
        <?php
          foreach($dbh->query("select * from 1041wordgame LEFT JOIN user on 1041wordgame.CardNum = user.CardNum;") as $first) {
            echo "<tr><td>".$first['Name'];
            echo "</td><td>".$first['Sid'];
            echo "</td><td>".$first['DateTime'];
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
    </div><!-- End of 1041語文遊戲 -->

    <div class="tab-pane fade" id="1041yuchihmeetingtab">
      <table class="table table-hover" id="1041yuchihmeeting">
        <thead><tr>
          <th>姓名</th>
          <th>學號</th>
          <th>簽到時間</th>
        </tr></thead>
        <tbody>
        <?php
          foreach($dbh->query("select * from 1041yuchihmeeting LEFT JOIN user on 1041yuchihmeeting.CardNum = user.CardNum;") as $first) {
            echo "<tr><td>".$first['Name'];
            echo "</td><td>".$first['Sid'];
            echo "</td><td>".$first['DateTime'];
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
    </div><!-- End of 1041魚池午餐 --> 

    <div class="tab-pane fade" id="1041pingjingmeetingtab">
      <table class="table table-hover" id="1041pingjingmeeting">
        <thead><tr>
          <th>姓名</th>
          <th>學號</th>
          <th>簽到時間</th>
        </tr></thead>
        <tbody>
        <?php
          foreach($dbh->query("select * from 1041pingjingmeeting LEFT JOIN user on 1041pingjingmeeting.CardNum = user.CardNum;") as $first) {
            echo "<tr><td>".$first['Name'];
            echo "</td><td>".$first['Sid'];
            echo "</td><td>".$first['DateTime'];
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
    </div><!-- End of 1041平靜午餐 -->

    <div class="tab-pane fade" id="1041hezuomeetingtab">
      <table class="table table-hover" id="1041hezuomeeting">
        <thead><tr>
          <th>姓名</th>
          <th>學號</th>
          <th>簽到時間</th>
        </tr></thead>
        <tbody>
        <?php
          foreach($dbh->query("select * from 1041hezuomeeting LEFT JOIN user on 1041hezuomeeting.CardNum = user.CardNum;") as $first) {
            echo "<tr><td>".$first['Name'];
            echo "</td><td>".$first['Sid'];
            echo "</td><td>".$first['DateTime'];
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
    </div><!-- End of 1041平靜午餐 -->

    <div class="tab-pane fade" id="1041wordgame2tab">
      <table class="table table-hover" id="1041wordgame2">
        <thead><tr>
          <th>姓名</th>
          <th>學號</th>
          <th>簽到時間</th>
        </tr></thead>
        <tbody>
        <?php
          foreach($dbh->query("select * from 1041wordgame2 LEFT JOIN user on 1041wordgame2.CardNum = user.CardNum;") as $first) {
            echo "<tr><td>".$first['Name'];
            echo "</td><td>".$first['Sid'];
            echo "</td><td>".$first['DateTime'];
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
    </div><!-- End of 1041語文遊戲2 -->
 
  </div><!--End of TabContent-->

<script>
  $(document).ready(function(){
<?php require("datatables.html"); ?>
    $('#1041class, #1041first, #1041wordgame, #1041yuchihmeeting, #1041pingjingmeeting, #1041hezuomeeting, #1041wordgame2').DataTable(opt);
  });
</script>
</div><!-- End of container -->
<?php require("include/footer.html"); ?>
</body>
</html>
