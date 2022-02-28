<?php
session_start();
include '../Header.php';
?>
<div class="w3l-content-2 py-5">
    <div class="container py-md-5 py-2">
        <div class="row whybox-wrap">
            <div class="col-lg-12 whybox-wrap-left">
                <?php
                include '../Dbconnetion.php';
                $uid = $_SESSION['USERID'];
                $qry = mysqli_query($con, "SELECT * FROM `booking`,`schedule`,`patient`,`doctor` WHERE `booking`.`status`='Pending' AND `booking`.`did`=$uid AND `booking`.`pid`=`patient`.`pid` AND `schedule`.`sched_id`=`booking`.`sid` AND `booking`.`did`=`doctor`.`did`");
                if (mysqli_fetch_array($qry) > 0) {
                ?>
                    <table id="customers">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Conatct</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Status</th>
                            <th colspan="2"></th>
                        </tr>

                        <?php
                        $qry = mysqli_query($con, "SELECT * FROM `booking`,`schedule`,`patient`,`doctor` WHERE `booking`.`status`='Pending' AND `booking`.`did`=$uid AND `booking`.`pid`=`patient`.`pid` AND `schedule`.`sched_id`=`booking`.`sid` AND `booking`.`did`=`doctor`.`did`");

                        while ($row = mysqli_fetch_array($qry)) {
                        ?>

                            <tr>
                                <td><?php echo $row[13] ?></td>
                                <td><?php echo $row[19] ?></td>
                                <td><?php echo $row[18] ?></td>
                                <td><?php echo $row['date'] ?></td>
                                <td><?php echo $row['token'] ?></td>
                                <td><?php echo $row['status'] ?></td>
                                <td><a href="changeStatus.php?id=<?php echo $row['bid'] ?>&status=Visited">Visited</a></td>
                                <td><a href="changeStatus.php?id=<?php echo $row['bid'] ?>&status=Rejected">Remove</a></td>

                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                <?php
                } else {
                    echo '<script>alert("Patients are not Booked the schedule")</script>';
                ?>

                    <img src="../noData.png" width="30%" height="30%" style=" margin-left: auto; margin-right: auto;">

                <?php
                }
                ?>


            </div>

        </div>
    </div>



    <?php
    include '../Footer.php';
    ?>
