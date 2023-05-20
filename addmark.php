<?php require_once('config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>add mark</title>
</head>
<body>
    <?php 
      $connection = new PDO($dns, $dbuser, $dbpass);
      if(isset($_GET['idst']) && isset($_GET['ccode'])) {
        // your code to update the mark goes here
        $id=$_GET['idst'];
        $ccode=$_GET['ccode'];
        if(isset($_POST['submit'])){
            $sql="UPDATE student_course SET mark=:mark WHERE studentid=:studentid and coursecode=:coursecode";
            $statement=$connection->prepare($sql);
           
            $statement->execute(array(
              ':mark'=>$_POST['m'],
              ':studentid'=>$_GET['idst'],
              ':coursecode'=>$_GET['ccode']
            ));
            
            header("Location:index.php");
        }
        
    }
    
    ?>
    <h1>add mark page</h1>

    <form action="" method="post" >
     Grade : <input type="number" name="m" id=""> <br> <br>
     <input type="submit" name="submit" value="add grade"  id=""> <a href="index.php">Cansel</a>
    </form>
</body>
</html>