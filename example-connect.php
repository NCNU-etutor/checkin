<?php
$user = 'YOUR_DB_USER';
$pass = 'YOUR_DB_PASSWORD';
try {
    $dbh = new PDO('mysql:host=YOUR_DB_HOST;dbname=YOUR_DB_NAME;charset=utf8', $user, $pass);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>
