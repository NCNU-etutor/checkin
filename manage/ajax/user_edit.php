<?php
require('../../connect.php');
if(!empty($_POST["nameedit"]) && !empty($_POST["cardedit"]) && !empty($_POST["sidedit"])) {
    $teacheredit = $dbh->prepare("UPDATE `user` SET `CardNum`= :num, `Name`= :name, `Sid`= :id WHERE `CardNum`= :orinum;
                                  INSERT INTO `teaching` (`CardNum`, `School`) VALUES (:num, :school) 
                                  ON DUPLICATE KEY UPDATE `School`= :school;");
    $teacheredit->bindParam(':name', $_POST["nameedit"], PDO::PARAM_STR);
    $teacheredit->bindParam(':num', $_POST["cardedit"], PDO::PARAM_INT);
    $teacheredit->bindParam(':id', $_POST["sidedit"], PDO::PARAM_INT);
    $teacheredit->bindParam(':orinum', $_POST["oricard"], PDO::PARAM_INT);
    $teacheredit->bindParam(':school', implode(",", $_POST["schooledit"]), PDO::PARAM_STR);
    $teacheredit->execute();
    $dbh = null;
    exit("success");
} else {
    header('Location: http://10.40.20.33/checkin/manage/user.php');
    exit;
}
?>
