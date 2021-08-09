<?php
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, "sms");
    $query = "insert into student values($_POST[roll_no], '$_POST[name]', '$_POST[father_name]','$_POST[mobile]', $_POST[sem], '$_POST[email]',
                '$_POST[pass]')";
    $query_run = mysqli_query($connection, $query);
?>

<script type="text/javascript">
    alert("Details edited successfully");
    window.location.href = "admin_dashboard.php";
</script>