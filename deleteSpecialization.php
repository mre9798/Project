<?php

include "../Dbconnetion.php";
$sid = $_GET['id'];
$qry = "DELETE FROM `specialization` WHERE `sid`='$sid'";
if (mysqli_query($con, $qry) == TRUE) {
    echo '<script>alert("Specialization Removed...");window.location="AddSpecialization.php"</script>';
}
