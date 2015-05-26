<?php
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");
  require('../../connect.php');
  $sql = "SELECT user.Name, log.DateTime FROM user INNER JOIN log ON user.CardNum = log.CardNum ORDER BY DateTime DESC";
  $query = $dbh->query($sql);
  list($count) = $dbh->query("SELECT COUNT(DateTime) FROM (".$sql.") as QQ;")->fetch();
  $outp = "{\"data\": [";
  foreach($query as $key => $rs) {
    $outp .= "[\""  . $rs["Name"]      . "\",";
    $outp .= "\""   .$rs["DateTime"]   . "\"]";
    if($key != $count-1){
      $outp .= ","; // not the last element
    }
  }
  $outp .= "]}";
  $dbh = null;
  echo($outp);
?>
