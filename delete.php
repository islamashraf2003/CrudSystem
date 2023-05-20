<?php require_once('config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete</title>
</head>
<body>
<?php 
$connection = new PDO($dns, $dbuser, $dbpass);
if(isset($_GET['stid'])&&isset($_GET['fnm'])){
    $sql="DELETE FROM student WHERE id=:id and fname=:fname ";
    $statement=$connection->prepare($sql);
    $statement->execute(array('id'=>$_GET['stid'],'fname'=>$_GET['fnm']));
    header("Location:index.php");
}
?>
    <h1>Delete</h1>
</body>
</html>