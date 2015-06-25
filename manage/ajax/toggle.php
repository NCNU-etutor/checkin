<?php
  require("../../connect.php");
  if($_POST["on"] == "true") {
    $on = 1;
  } else {
    $on = 0;
  }
  $do = $dbh->prepare("UPDATE `user` SET `InUse` = ? WHERE `Sid` = ?;");
  $do->bindParam(1, $on, PDO::PARAM_INT);
  $do->bindParam(2, $_POST["id"], PDO::PARAM_INT);
  $do->execute();
  $dbh = null;
  exit("done");
?>
