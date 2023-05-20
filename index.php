<?php require_once('config.php');
 $connection = new PDO($dns, $dbuser, $dbpass);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>index page</title>
</head>
<?php 
$sql="SELECT s.id,s.fname,s.lname,s.email,c.coursecode  from student s ,course c ,student_course sc WHERE s.id=sc.studentid and sc.coursecode=c.coursecode";
//$sql="SELECT * FROM student";
$statement=$connection->prepare($sql);
$statement->execute();


$result=$statement->fetchAll(PDO::FETCH_ASSOC);
?>
<body>
    <center>
        <h1>INDEX PAGE</h1>
        <table border="1" style="border-collapse: collapse;"  >
        <tr>
            <th>ID</th>
            <th>FIRST NAME</th>
            <th>LAST NAME</th>
            <th>COURSE</th>
            <th>Grade</th>
            <th>DELETE</th>
        </tr>
        <?php foreach($result as $row){ ?>
        <tr>
            <td><?php echo $row['id'];  ?></td>
            <td><?php echo $row['fname'];  ?></td>
            <td><?php echo $row['lname'];  ?></td>
            <td><?php echo $row['coursecode'];  ?></td>
        
            <td><a href="addmark.php?idst=<?php echo $row['id'] ?>&ccode=<?php echo $row['coursecode'] ?>">Grading</a></td>
            <td><a href="delete.php?stid=<?php echo $row['id'] ?>&fnm=<?php echo $row['fname'] ?>"><center>X</center></a></td>
        </tr>
       <?php } ?>
        </table>
        <br> <br>
        <a href="addStudent.php">Registe New Student</a> <br> <br>
        <a href="search.php">Search</a>
    </center>
</body>
</html>