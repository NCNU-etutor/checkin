<?php
  require("../../connect.php");
  if(!empty($_POST["tohistory"])) {
    $tohistory = $_POST["tohistory"];
    $data = explode(",", $tohistory);
    $count = count($data);
    $history = $dbh->prepare("UPDATE `user` SET `InUse`=b'0' WHERE `CardNum` = ?;");
    for($i = 0; $i < $count-1; $i++) {
      $history->bindParam(1, $data[$i], PDO::PARAM_INT);
      $history->execute();
    }
    $dbh = null;
    exit("done");
  }
?>
