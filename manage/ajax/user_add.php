<?php
require('../../connect.php');
if(!empty($_POST["nameadd"]) && !empty($_POST["cardadd"]) && !empty($_POST["sidadd"])) {
    //$schoolAdd = implode(",", $_POST["schooladd"]);
    $teacheradd = $dbh->prepare("INSERT INTO `user` (`CardNum`, `Name`, `Sid`) VALUES (:num, :name, :id);
                                 INSERT INTO `teaching` (`CardNum`, `School`) VALUES (:num, :school);");
    $teacheradd->bindParam(':name', $_POST["nameadd"], PDO::PARAM_STR);
    $teacheradd->bindParam(':num', $_POST["cardadd"], PDO::PARAM_INT);
    $teacheradd->bindParam(':id', $_POST["sidadd"], PDO::PARAM_INT);
    $teacheradd->bindParam(':school', implode(",", $_POST["schooladd"]), PDO::PARAM_STR);
    $teacheradd->execute();
    $dbh = null;
    exit("success");
} else {
    header('Location: http://10.40.20.33/checkin/manage/user.php');
    exit;
}
?>
