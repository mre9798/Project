<?php
session_start();
include '../Header.php';
?>



<!-- banner bottom shape -->
<!--/contact-->
<section class="w3l-contact-2 py-5" id="contact">
    <div class="container py-lg-5 py-md-4 py-2">
        <div class="contact-grids d-grid">

            <div class="contact-right">
                <form method="post" class="signin-form">
                    <div class="input-grids">
                        Date:
                        <input type="date" name="date" id="w3lName" class="contact-input" required="" />
                        Start Time:
                        <input type="time" name="stime" id="w3lName" class="contact-input" required="" />
                        End Time:
                        <input type="time" name="etime" id="w3lName" class="contact-input" required="" />
                        No.of Tokens:
                        <input type="number" name="tokens" id="w3lName" class="contact-input" required="" />
                    </div>
                    <div class="w3l-submit text-lg-right">
                        <button class="btn btn-style btn-primary" name="submit">Add</button>
                    </div>
                </form>


                <?php
                include '../Dbconnetion.php';
                if (isset($_POST['submit'])) {
                    //                            
                    $date = $_POST['date'];
                    $stime = $_POST['stime'];
                    $etime = $_POST['etime'];
                    $tokens = $_POST['tokens'];
                    $did = $_SESSION['USERID'];

                    $qry = "INSERT INTO `schedule` (`date`,`start_time`,`end_time`,`tokens`,`did`) VALUES ('$date','$stime','$etime','$tokens','$did')";
                    $exe = mysqli_query($con, $qry);
                    if ($exe) {
                        echo '<script>alert("Successfull!!!")</script>';
                    } else {
                        echo '<script>alert("Failed to Register")</script>';
                    }
                }
                ?>

            </div>
        </div>
        <div class="col-lg-12 whybox-wrap-left mt-5">
            <?php
            $did = $_SESSION['USERID'];
            $qry = mysqli_query($con, "SELECT * FROM `schedule` WHERE `did`='$did' ORDER BY `sched_id` DESC");

            if (mysqli_fetch_array($qry) > 0) {
            ?>
                <table id="customers">
                    <tr>
                        <th>Date</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Tokens</th>
                    </tr>

                    <?php
                    $qry = mysqli_query($con, "SELECT * FROM `schedule` WHERE `did`='$did' ORDER BY `sched_id` DESC");

                    while ($row = mysqli_fetch_array($qry)) {
                    ?>

                        <tr>
                            <td><?php echo $row['date'] ?></td>
                            <td><?php echo $row['start_time'] ?></td>
                            <td><?php echo $row['end_time'] ?></td>
                            <td><?php echo $row['tokens'] ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            <?php
            } else {
            ?>

                

            <?php
            }
            ?>


        </div>
</section>

<?php
include '../Footer.php';
?>