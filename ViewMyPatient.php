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
                $qry = mysqli_query($con, "SELECT * FROM `booking` b, `doctor` d, `patient` p, `schedule` s WHERE b.`pid`=p.`pid` AND b.`did`=d.`did` AND b.`sid`=s.`sched_id` AND b.`did`=$uid AND `status`='Visited'");
                if (mysqli_fetch_array($qry) > 0) {
                ?>
                    <table id="customers">
                        <tr>
                            
                            <th>Patient</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Email</th>
                            <th>Conatct</th>
                            
                            <th>Status</th>
                            <th colspan="3"></th>
                        </tr>

                        <?php
                        $qry = mysqli_query($con, "SELECT * FROM `booking` b, `doctor` d, `patient` p, `schedule` s WHERE b.`pid`=p.`pid` AND b.`did`=d.`did` AND b.`sid`=s.`sched_id` AND b.`did`=$uid AND `status`='Visited' ORDER BY s.date DESC");

                        while ($row = mysqli_fetch_array($qry)) {
                            $qryRep = "SELECT * FROM `test_report` WHERE `bid`='$row[bid]'";
                            // echo $qryRep;
                            $resRep = mysqli_query($con, $qryRep);
                            $count = mysqli_num_rows($resRep);
                            if ($count > 0) {
                                $rowRep = mysqli_fetch_array($resRep);
                                $data = "../Patient/" . $rowRep['test'];
                                $val = True;
                            } else {
                                $val = False;
                            }
                        ?>

                            <tr>
                                <td><?php echo $row[18] ?></td>
                                <td><?php echo $row['date'] ?></td>
                                <td><?php echo $row['token']?></td>
                                <td><?php echo $row[24] ?></td>
                                <td><?php echo $row[23] ?></td>
                                
                                <td><?php echo $row['status'] ?></td>
                                <td><a href="AddPrescription.php?pid=<?php echo $row['pid'] ?>&bid=<?php echo $row['bid'] ?>&date=<?php echo $row['date'] ?>">Prescription</a></td>
                                
                                <td><a href="AddMedicine.php?pid=<?php echo $row['pid'] ?>&bid=<?php echo $row['bid'] ?>&date=<?php echo $row['date'] ?>">Medicine</a></td>
                                <td>
                                    <?php if ($val) {
                                    ?>

                                        <a href="<?php echo $data ?>" target="_blank">View Report</a>
                                </td>
                            <?php
                                    } else {
                            ?>

                                NO Report Available
                            <?php
                                    } ?>
                            </td>

                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                <?php
                } else {
                    echo '<script>alert("You have no patient history")</script>';
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