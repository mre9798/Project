<?php

session_start();
include '../Dbconnetion.php';
$id = $_GET['id'];
$key = $_GET['action'];

echo $id;
$qry = "DELETE FROM `booking` WHERE `bid`='$id'";
$exe = mysqli_query($con, $qry);
if ($exe) {
    echo '<script>alert("Booking Deleted Successfull!!!")</script>';
    echo "<script>window.location = 'ViewMyReport.php'</script>";
}
?>