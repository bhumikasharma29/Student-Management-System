<!DOCTYPE html>
<html lang="en">

<head>
    <title>Student Dashboard</title>
    <link rel="stylesheet" type="text/css" href="bootstrap-4.0.0-dist/css/bootstrap.min.css">
    <script type="text/javascript" src="bootstrap-4.0.0-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <?php
    session_start();
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, "sms");
    ?>
</head>

<body>
    <div id="header">
        <center><strong>Student Management System </strong>&nbsp;&nbsp;
            Email: <?php echo $_SESSION['email']; ?> &nbsp;&nbsp;
            Name: <?php echo $_SESSION['name']; ?> &nbsp;&nbsp;
            <a href="logout.php">Logout</a>
        </center>
    </div>
    <span id="top_span">
        <marquee>Note:- This portal is available till 30 May... Please edit your information if wrong</marquee>
    </span>
    <div id="left_side"><br><br><br>
        <form action="" method="POST">
            <table>
                <tr>
                    <td><input type="submit" name="show_detail" value="Show Details"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="edit_details" value="Edit Details"></td>
                </tr>
            </table>
        </form>
    </div>
    <div id="right_side"><br><br>
        <div id="demo">
            <?php
            if (isset($_POST['show_detail'])) {
                $query = "select * from student where email = '$_SESSION[email]'";
                $query_run = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($query_run)) {
            ?>
                    <table>
                        <tr>
                            <td>Roll No.</td>
                            <td><input type="text" value="<?php echo $row['roll_no'] ?>" disabled></td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td><input type="text" value="<?php echo $row['Name'] ?>" disabled></td>
                        </tr>
                        <tr>
                            <td>Father's Name</td>
                            <td><input type="text" value="<?php echo $row['father_name'] ?>" disabled></td>
                        </tr>
                        <tr>
                            <td>Mobile</td>
                            <td><input type="text" value="<?php echo $row['Mobile'] ?>" disabled></td>
                        </tr>
                        <tr>
                            <td>Semester</td>
                            <td><input type="text" value="<?php echo $row['Semester'] ?>" disabled></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input type="text" value="<?php echo $row['Email'] ?>" disabled></td>
                        </tr>
                    </table>
            <?php
                }
            }
            ?>
            <?php
            if (isset($_POST['edit_details'])) {
                $query = "select * from student where email = '$_SESSION[email]'";
                $query_run = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($query_run)) {
            ?>
                    <form action="edit_student.php" method="POST">
                        <table>
                            <tr>
                                <td>Roll No:</td>
                                <td><input type="text" name="roll_no" value="<?php echo $row['roll_no'] ?>" disabled></td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td><input type="text" name="name" value="<?php echo $row['Name'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Father's Name</td>
                                <td><input type="text" name="father_name" value="<?php echo $row['father_name'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Mobile</td>
                                <td><input type="text" name="mobile" value="<?php echo $row['Mobile'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Semester</td>
                                <td><input type="text" name="semester" value="<?php echo $row['Semester'] ?>"></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><input type="text" value="<?php echo $row['Email'] ?>" disabled></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                <td><input type="submit" name="edit" value="Update"></td>
                                </td>
                            </tr>
                        </table>
                    </form>
            <?php
                }
            }
            ?>
        </div>
    </div>
</body>

</html>