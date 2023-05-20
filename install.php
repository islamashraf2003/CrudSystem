<?php require_once('config.php'); ?>
<?php
try {
    $connection = new PDO($dns, $dbuser, $dbpass);
    echo "coonncted the database ". $dbname ."  is sucsessfully";
} catch (PDOException $e) {
    echo 'connection failde: '.$e->getMessage();
}
?>