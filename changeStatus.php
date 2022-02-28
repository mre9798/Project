<?php
include '../Dbconnetion.php';
$id = $_GET['id'];
$status = $_GET['status'];
$qry = "UPDATE `booking` SET `status`='$status' WHERE `bid`='$id'";

$exe = mysqli_query($con, $qry);
if ($exe) {
    echo '<script>alert("Status Updated...")</script>';
    echo "<script>window.location = 'DoctorHome.php'</script>";
} else {
    echo '<script>alert("Failed to Update...")</script>';
    echo '<script>location.href = "ViewPatientReq.php"</script>';
}
