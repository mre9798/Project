<?php

session_start();
include '../Dbconnetion.php';
$id = $_GET['id'];
$user = $_GET['user'];
$key = $_GET['action'];
$date = date('y/m/d');


///////////////////////////////////////////////////////////////////Approve///////////////////////////////////

if ($key == "RemoveUser") {
    $qry = "DELETE FROM `login` WHERE `lid`='$id'";

    $exe = mysqli_query($con, $qry);
    if ($exe) {
        if ($user == "Doctor") {
            echo '<script>alert("Removed Succesfully")</script>';
            echo "<script>window.location = '../Admin/AdminHome.php'</script>";
    }
}
}
if ($key == "Approve") {
    $qry = "UPDATE `login` SET `status`=1 WHERE `lid`='$id'";

    $exe = mysqli_query($con, $qry);
    if ($exe) {
            echo '<script>alert("Doctor Approved..")</script>';
            echo "<script>window.location = '../Admin/ViewDoctor.php'</script>";
    } else {
        echo '<script>alert("Failed to Approve")</script>';
}
}
?>