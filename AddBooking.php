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
// $currentToken = $row[0] + 1;

$sTime = $rowShe['start_time'];
$eTime = $rowShe['end_time'];
$start = strtotime($sTime);
$end = strtotime($eTime);
$mins = ($end - $start) / 60;
$slots = $mins / $token;

?>



<!-- banner bottom shape -->
<!--/contact-->
<section class="w3l-contact-2 py-5" id="contact">
    <div class="container py-lg-5 py-md-4 py-2">
        <div class="contact-grids d-grid">

            <div class="contact-right">
            

            
                <form action="" method="post">
                    <!-- Starting Time:
                    <input type="text" name="" value="<?php echo $rowShe['start_time'] ?>" id="">
                    Ending Time:
                    <input type="text" name="" value="<?php echo $rowShe['end_time'] ?>" id=""> -->
                    Time Slot:<br>
                    <select name="slotBook" id="" style="width: 100%; padding:10px; border-radius:5px">
                        <?php
                        for ($i = 1; $i <= $token; $i++) {
                            $addTime = ($slots * 60);
                            $end = $start + $addTime;
                            $startApp = date("h:i", $start);
                            $endApp = date("h:i", $end);
                            $timeSlots = $startApp . ' - ' . $endApp;
                            $qrySheCheck = "select * from `booking` where sid='$sid' and token='$timeSlots'";
                            $resSheCheck = mysqli_query($con, $qrySheCheck);
                            $count = mysqli_num_rows($resSheCheck);
                            if ($count > 0) {
                            } else {
                        ?>
                                <option value="<?php echo $timeSlots ?>"><?php echo $timeSlots  ?></option>

                        <?php
                            }
                            $start += $addTime;
                        }
                        ?>
                    </select>
                    <input style="background-color:#099bf0;" type="submit" name="confirm" value="Book">
                </form>
                <?php
                if (isset($_POST['confirm'])) {
                    $Tok = $_REQUEST['slotBook'];
                    $qryIns = "INSERT INTO `booking` (`did`,`pid`,`sid`,`token`) VALUES ('$did','$uid','$sid','$Tok')";
                    if (mysqli_query($con, $qryIns) == TRUE) {
                        echo '<script>alert("Successfull!!!"); window.location= "ViewMyReport.php"</script>';
                    }
                }
                ?>

            </div>
        </div>
</section>

<?php
include '../Footer.php';
?>