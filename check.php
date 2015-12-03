<?php
    require("connect.php");
    if(isset($_POST["cardnum"]) && !empty($_POST["cardnum"])) {
      $checkinuse = $dbh->prepare("SELECT `InUse` FROM `user` WHERE CardNum = ?;");
      $checkinuse->bindParam(1, $_POST["cardnum"], PDO::PARAM_INT);
      $checkinuse->execute();
      list($inuse) = $checkinuse->fetch();
      if($inuse == 1) {
        $checkgap = $dbh->prepare("SELECT TIMESTAMPDIFF(MINUTE, MAX(DateTime), NOW())'TimePassed' FROM `log` WHERE CardNum = :num ;");
        $checkgap->bindParam(':num', $_POST["cardnum"], PDO::PARAM_INT);
        $checkgap->execute();
        list($gap) = $checkgap->fetch();
        if($gap > 90 || $gap == "") {
          $log = $dbh->prepare("INSERT INTO `log` (`CardNum`, `DateTime`) VALUES (:num, NOW());");
          $log->bindParam(':num', $_POST["cardnum"], PDO::PARAM_INT);
          $log->execute();
          exit("sucess");
        } else {
          exit("already");
        }
      } else {
        exit("not_online");
      } 
    } else {
      header('Location: http://10.40.20.33/checkin');
      exit;
    }
?>

