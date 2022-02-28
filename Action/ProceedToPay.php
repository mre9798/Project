<?php
session_start();
include '../Dbconnetion.php';
$uid = $_SESSION['USERID'];
$qry = mysqli_query($con,"UPDATE `bill` SET `payment`='Paid' WHERE `bid`='$uid'");
if ($qry) {
    echo '<script>alert("Paid Successfully")</script>';
    echo '<script>location.href="../Patient/ViewPrescription.php"</script>';
} else {
    echo '<script>alert("Failed to Pay")</script>';
    echo '<script>location.href="../Patient/ViewPrescription.php"</script>';
}
?>