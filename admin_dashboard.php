<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Dashboard</title>
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
                    <td><input type="submit" name="search_student" value="Search Student"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="edit_student" value="Edit Student"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="add_new_student" value="Add New Student"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="delete_student" value="Delete Student"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="show_teachers" value="Teachers"></td>
                </tr>
            </table>
        </form>
    </div>
    <div id="right_side"><br><br>
        <div id="demo">
            <?php
            if (isset($_POST['search_student'])) {
            ?>
                <center>
                    <form action="" method="POST">
                        Enter Roll No:
                        <input type="text" name="roll_no"><br><br>
                        <input type="submit" name="search_by_roll_no" value="Search">
                    </form>
                </center>
                <?php
            }
            if (isset($_POST['search_by_roll_no'])) {
                $query = "select * from student where roll_no = '$_POST[roll_no]' ";
                $query_run = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($query_run)) {
                ?>
                    <table>
                        <tr>
                            <td><b>Roll No:&nbsp;&nbsp;</b></td>
                            <td><input type="text" value="<?php echo $row['roll_no']; ?>" disabled></td>
                        </tr>
                        <tr>
                            <td><b>Name: &nbsp;&nbsp;</b></td>
                            <td><input type="text" value="<?php echo $row['Name']; ?>" disabled></td>
                        </tr>
                        <tr>
                            <td><b>Father's Name: &nbsp;&nbsp;</b></td>
                            <td><input type="text" value="<?php echo $row['father_name']; ?>" disabled></td>
                        </tr>
                        <tr>
                            <td><b>Mobile: &nbsp;&nbsp;</b></td>
                            <td><input type="text" value="<?php echo $row['Mobile']; ?>" disabled></td>
                        </tr>
                        <tr>
                            <td><b>Semester: &nbsp;&nbsp;</b></td>
                            <td><input type="text" value="<?php echo $row['Semester']; ?>" disabled></td>
                        </tr>
                        <tr>
                            <td><b>Email:&nbsp;&nbsp;</b></td>
                            <td><input type="text" value="<?php echo $row['Email']; ?>" disabled></td>
                        </tr>
                    </table>
            <?php
                }
            }
            ?>
            <?php
            if (isset($_POST['edit_student'])) {
            ?>
                <center>
                    <form action="" method="POST">
                        Enter Roll No:
                        <input type="text" name="roll_no"><br><br>
                        <input type="submit" name="search_by_roll_no_for_edit" value="Search">
                    </form>
                </center>
                <?php
            }
            if (isset($_POST['search_by_roll_no_for_edit'])) {
                $query = "select * from student where roll_no = '$_POST[roll_no]' ";
                $query_run = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($query_run)) {
                ?>
                    <form action="admin_edit_student.php" method="POST">
                        <table>
                            <tr>
                                <td><b>Roll No: &nbsp;&nbsp;</b></td>
                                <td><input type="text" name="roll_no" value="<?php echo $row['roll_no']; ?>"></td>
                            </tr>
                            <tr>
                                <td><b>Name: &nbsp;&nbsp;</b></td>
                                <td><input type="text" name="name" value="<?php echo $row['Name']; ?>"></td>
                            </tr>
                            <tr>
                                <td><b>Father's Name: &nbsp;&nbsp;</b></td>
                                <td><input type="text" name="father_name" value="<?php echo $row['father_name']; ?>"></td>
                            </tr>
                            <tr>
                                <td><b>Mobile: &nbsp;&nbsp;</b></td>
                                <td><input type="text" name="mobile" value="<?php echo $row['Mobile']; ?>"></td>
                            </tr>
                            <tr>
                                <td><b>Semester: &nbsp;&nbsp;</b></td>
                                <td><input type="text" name="semester" value="<?php echo $row['Semester']; ?>"></td>
                            </tr>
                            <tr>
                                <td><b>Email:&nbsp;&nbsp;</b></td>
                                <td><input type="text" name="email" value="<?php echo $row['Email']; ?>"></td>
                            </tr><br><br>
                            <tr>
                                <td><input type="submit" name="edit" value="Update"></td>
                            </tr>
                        </table>
                    </form>
            <?php
                }
            }
            ?>
            <?php
            if (isset($_POST['add_new_student'])) {
            ?>
                <center>
                    <h4>Fill the details below:</h4>
                </center>
                <form action="add_student.php" method="POST">
                    <table>
                        <tr>
                            <td>Roll No: </td>
                            <td><input type="text" name="roll_no" required></td>
                        </tr>
                        <tr>
                            <td>Name: </td>
                            <td><input type="text" name="name" required></td>
                        </tr>
                        <tr>
                            <td>Father's Name: </td>
                            <td><input type="text" name="father_name" required></td>
                        </tr>
                        <tr>
                            <td>Mobile: </td>
                            <td><input type="text" name="mobile" required></td>
                        </tr>
                        <tr>
                            <td>Semester: </td>
                            <td><input type="text" name="sem" required></td>
                        </tr>
                        <tr>
                            <td>Email: </td>
                            <td><input type="text" name="email" required></td>
                        </tr>
                        <tr>
                            <td>Password: </td>
                            <td><input type="password" name="pass" required></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="add" value="Add Student"></td>
                        </tr>
                    </table>
                </form>

            <?php
            }
            ?>
            <?php
            if (isset($_POST['delete_student'])) {
            ?>
                <center>
                    <form action="delete_student.php" method="POST">
                        Roll No.: <input type="text" name="roll_no">
                        <input type="submit" name="search_by_roll_no_for_delete" value="Delete Student">
                    </form>
                </center>
            <?php
            }
            ?>

            <?php
            if (isset($_POST['show_teachers'])) {
            ?>
                <center>
                    <h5>Teachers' details</h5>
                    <table>
                        <tr>
                            <td id="id">Teacher ID</td>
                            <td></td>
                            <td id="name">NAME</td>
                            <td></td>
                            <td id="course">COURSE</td>
                        </tr>
                    </table>
                </center>
                <?php
                $connection = mysqli_connect("localhost", "root", "");
                $db = mysqli_select_db($connection, "sms");
                $query = "select * from teachers";
                $query_run = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($query_run)) {
                ?>
                    <center>
                        <table style="border-collapse: collapse; border:1px solid black;">
                            <tr>
                                <td id="td"><?php echo $row['t_id'] ?></td>
                                <td id="td"><?php echo $row['name'] ?></td>
                                <td id="td"><?php echo $row['courses'] ?></td>
                            </tr>
                        </table>
                    </center>
            <?php
                }
            }
            ?>
        </div>
    </div>
</body>

</html>