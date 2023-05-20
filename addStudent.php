<?php require_once('config.php'); ?>
<?php
$connection = new PDO($dns, $dbuser, $dbpass);

if (isset($_POST['submit'])) {
    if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email'])) {
        $Fname = $_POST['fname'];
        $Lname = $_POST['lname'];
        $Email = $_POST['email'];

        $sql = "INSERT INTO student(fname,lname,email) VALUES(:fname,:lname,:email)";
        $statement = $connection->prepare($sql);
        $statement->execute(array(':fname' => $Fname, ':lname' => $Lname, ':email' => $Email));
        $Courses = $_POST['course']; //array
        $studentid = $connection->lastInsertId();
        foreach ($Courses as $course) {
            $sql = "INSERT INTO student_course (studentid,coursecode) VALUES (:studentid,:coursecode)";
            $statement = $connection->prepare($sql);
            $statement->execute(array(':studentid' => $studentid, ':coursecode' => $course));
        }
        if ($connection) {
            header("Location:index.php");
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>add student</title>
</head>

<body>
    <form action="addStudent.php" method="post">
        <h2>Register A New Student</h2>
        First Name: <input type="text" name="fname" id=""> <br>
        Last Name: <input type="text" name="lname" id=""> <br>
        Email: <input type="email" name="email" id=""> <br> <br>
        <select name="course[]" multiple size="4" id="">
            <option value="comp102">comp102</option>
            <option value="comp104">comp104</option>
            <option value="comp106">comp106</option>
        </select> <br> <br>
        <input type="submit" name="submit" value="Register" id="">
        <a href="index.php">Cansel</a> <br> <br>
    </form>
</body>

</html>