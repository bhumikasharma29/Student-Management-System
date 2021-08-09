<?php
$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, "sms");
$query = "update student set Name='$_POST[name]', father_name='$_POST[father_name]', 
                Mobile='$_POST[mobile]', Semester=$_POST[semester] where roll_no = $_POST[roll_no]";
$query_run = mysqli_query($connection, $query);
?>

<script type="text/javascript">
    alert("Details edited successfully");
    window.location.href = "student_dashboard.php";
</script>