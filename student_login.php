<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Student Login</title>
    <link rel="stylesheet" type="text/css" href="bootstrap-4.0.0-dist/css/bootstrap.min.css">
    <script type="text/javascript" src="bootstrap-4.0.0-dist/js/bootstrap.min.js"></script>
</head>

<body>
    <br>
    <center><br><br>
        <h3>Student Login Page</h3>
        <form action="" method="post">
            Email: <input type="text" name="email" required><br><br>
            Password:<input type="password" name="password" required><br><br>
            <input type="submit" name="Submit">
        </form>
        <?php
        session_start();
        if (isset($_POST['Submit'])) {
            $connection = mysqli_connect("localhost", "root", "");
            $db = mysqli_select_db($connection, "sms");
            $query = "select * from student where email = '$_POST[email]'";
            $query_run = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($query_run)) {
                if ($row['Email'] == $_POST['email']) {
                    if ($row['Password'] == $_POST['password']) {
                        $_SESSION['email'] = $row['Email'];
                        $_SESSION['name'] = $row['Name'];
                        header("Location: student_dashboard.php");
                    } else {
                        echo "Incorrect Password";
                    }
                } else {
                    echo "Invalid email address";
                }
            }
        }
        ?>
    </center>
</body>

</html>