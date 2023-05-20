<?php require_once('config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search page</title>
</head>
<body>
    <h1>Search page</h1>

    <form action="" method="post" >
        <input type="submit" name="submit" value="courses"  id="">
        <input type="submit" name="submit" value="Marks"  id="">
        <input type="submit" name="submit" value="cr_hour"  id=""> <br>
    </form>
    <br>
    <hr>
    <?php 
    $connection = new PDO($dns, $dbuser, $dbpass);
    if(isset($_POST['submit']) && $_POST['submit'] == 'courses'){
        $sql="SELECT s.fname,s.lname, sc.coursecode  from student s , student_course sc , course c WHERE s.id=sc.studentid and sc.coursecode=c.coursecode";
        $statement=$connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
          echo "<table border='2'>";
            echo "<tr><th> First Name </th><th> Last Name </th><th> Course Code </th></tr>";
            foreach($result as $row){
                echo "<tr>";
                echo "<td>", $row['fname'], "</td>";
                echo "<td>", $row['lname'], "</td>";
                echo "<td>", $row['coursecode'], "</td>";
                echo "</tr>";
            }
            echo "</table><br><br>";
    }else if(isset($_POST['submit'])== 'Marks'){
        $sql="SELECT st.fname,st.lname, sc.mark FROM student st , student_course sc where st.id=sc.studentid and sc.mark>=80";
        $statement=$connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
          echo "<table border='2'>";
            echo "<tr><th> Fisrt name </th><th> Last name  </th><th> Mark </th></tr>";
            foreach($result as $row){
                echo "<tr>";
                echo "<td>", $row['fname'], "</td>";
                echo "<td>", $row['lname'], "</td>";
                echo "<td>", $row['mark'], "</td>";
                echo "</tr>";
            }
            echo "</table><br><br>";
    }else {
        $sql="SELECT c.coursecode,c.title,c.crhour FROM course c";
        $statement=$connection->prepare($sql);
        $statement->execute();
        $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        echo "<table border='2'>";
        echo "<tr><th>  Course Code </th><th>  Credits Hours  </th>";
        foreach($result as $row){
            echo "<tr>";
            echo "<td>", $row['coursecode'], "</td>";
            echo "<td>", $row['crhour'], "</td>";
            echo "</tr>";
        }
        echo "</table><br><br>";
    }
    ?>
   <br> <br>
   <a href="index.php">Back--></a>
</body>

</html>