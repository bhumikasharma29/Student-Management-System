<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="bootstrap-4.0.0-dist/css/bootstrap.min.css">
    <script type="text/javascript" src="bootstrap-4.0.0-dist/js/bootstrap.min.js"></script>
</head>

<body>
    <br>
    <center>
        <h3>Student Management System</h3>
        <br>
        <form action="" method="post">
            <input type="submit" name="admin_login" value="Admin Login">
            <input type="submit" name="student_login" value="Student Login">
        </form>
        <?php
            if(isset($_POST['admin_login'])){
                header("Location: admin_login.php");
            }
            if (isset($_POST['student_login'])) {
                header("Location: student_login.php");
            }
        ?>
    </center>
</body>

</html>