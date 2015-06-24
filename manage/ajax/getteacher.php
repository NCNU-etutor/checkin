<?php
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");
  require('../../connect.php');
  $sql = "SELECT * FROM(
            SELECT *, CASE LEFT(RIGHT(Sid, 3),1)
            WHEN '0' THEN '系'
            WHEN '5' THEN '所'
            END as 'grade' FROM(
              SELECT user.Name, user.Sid, user.InUse, user.CardNum as 'Card', count(log.DateTime) as 'times' FROM user
              LEFT JOIN log ON user.CardNum = log.CardNum
              GROUP BY Name
            ) as test
            LEFT JOIN department ON LEFT(RIGHT(Sid, 6), 3) = department.deptid ORDER BY Name
          ) as test1
          LEFT JOIN teaching ON test1.Card = teaching.CardNum";
  $query = $dbh->query($sql);
  list($count) = $dbh->query("SELECT COUNT(Sid) FROM (".$sql.") as QQ;")->fetch();
  //$outp = $count;
  $outp = "{\"data\": [";
  foreach($query as $key => $rs) {
    if(((date("n")%9)-date("n"))==0) {
      $g = date("Y")-1911-substr($rs['Sid'], 0, -6);
    } else {
      $g = date("Y")-1910-substr($rs['Sid'], 0, -6);
    }
    $outp .= "[\""  . $rs["Name"]  . "\",";
    $outp .= "\""  . $rs["Sid"]      . "\",";
    $outp .= "\""  . $rs["cname"]. $rs["grade"]. " ". $g. "年級\",";
    $outp .= "\""  . $rs["Card"]     . "\",";
    $outp .= "\""  . $rs["School"]   . "\",";
    $outp .= "\""  . $rs["InUse"]   . "\",";
    $outp .= "\""   .$rs["times"]    . "次\"]";
    if($key != $count-1){
      $outp .= ","; // not the last element
    }
  }
  $outp .= "]}";
  $dbh = null;
  echo($outp);
?>
