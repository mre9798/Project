<?php
session_start();
include '../Header.php';
include '../Dbconnetion.php';

//                            
$date = $_GET['date'];
$did = $_GET['id'];
$uid = $_SESSION['USERID'];
$qryShe = "SELECT * FROM `schedule` WHERE `did`='$did' AND `date`='$date'";
$resShe = mysqli_query($con, $qryShe);
$rowShe = mysqli_fetch_array($resShe);
$sid = $rowShe['sched_id'];
$token = $rowShe['tokens'];
$qryTok = "SELECT MAX(`token`) FROM `booking` WHERE `sid`='$sid'";
$resTok = mysqli_query($con, $qryTok);
$row = mysqli_fetch_array($resTok);
$currentToken = $row[0] + 1;
?>



<!-- banner bottom shape -->
<!--/contact-->
<section class="w3l-contact-2 py-5" id="contact">
    <div class="container py-lg-5 py-md-4 py-2">
        <div class="contact-grids d-grid">

            <div class="contact-right">
                <form method="post" class="signin-form" enctype="multipart/form-data">
                    <div class="input-grids">
                        Select Date:
                        <input type="date" name="date" id="w3lName" class="contact-input" required="" />
                    </div>
                    <div class="w3l-submit text-lg-center">
                        <button class="btn btn-style btn-primary" name="submit">Submit</button>
                    </div>
                </form>

                <?php

                ?>
                <form action="" method="post">
                    Starting Time:
                    <input type="text" name="" value="<?php echo $rowShe['start_time'] ?>" id="">
                    Ending Time:
                    <input type="text" name="" value="<?php echo $rowShe['end_time'] ?>" id="">
                    <input type="submit" name="confirm" value="Book">
                </form>
                <?php
                if (isset($_POST['confirm'])) {
                    if ($currentToken <= $token) {
                        $qryIns = "INSERT INTO `booking` (`did`,`pid`,`sid`,`token`) VALUES ('$did','$uid','$sid','$currentToken')";
                        if (mysqli_query($con, $qryIns) == TRUE) {
                            echo '<script>alert("Successfull!!!"); window.location= "ViewMyReport.php"</script>';
                        }
                    } else {
                        // echo '<script>alert("Booking is Full...")</script>';
                        echo $currentToken <= $token;
                    }
                }
                ?>

            </div>
        </div>
</section>

<?php
include '../Footer.php';
?>