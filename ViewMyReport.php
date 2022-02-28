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
                $qry = mysqli_query($con, "SELECT * FROM `booking` b, `doctor` d, `patient` p, `schedule` s, `specialization` sp WHERE b.`pid`=p.`pid` AND b.`did`=d.`did` AND b.`sid`=s.`sched_id` AND b.`pid`='$uid' AND d.`sid`=sp.`sid` AND `status`='Pending'");
                if (mysqli_fetch_array($qry) > 0) {
                ?>
                    <h5>Current Booking</h5><br><br>
                    <table id="customers">
                        <tr>
                            <th>Book no</th>
                            <th>Doctor</th>
                            <th>Email</th>
                            <th>Conatct</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Specialization</th>
                            <th>Delete Booking</th>
                        </tr>

                        <?php
                        $qry = mysqli_query($con, "SELECT * FROM `booking` b, `doctor` d, `patient` p, `schedule` s, `specialization` sp WHERE b.`pid`=p.`pid` AND b.`did`=d.`did` AND b.`sid`=s.`sched_id` AND b.`pid`='$uid' AND d.`sid`=sp.`sid` AND `status`='Pending' ORDER BY `date` DESC");
                        
                        while ($row = mysqli_fetch_array($qry)) {
                            $bookid=$row['bid'];
                        ?>
                        
                            <tr><td><?php echo $bookid ?>
                                <td><?php echo $row[7] ?></td>
                                <td><?php echo $row[11] ?></td>
                                <td><?php echo $row[10] ?></td>
                                <td><?php echo $row['date'] ?></td>
                                <td><?php echo $row['token'] ?></td>
                                <td><?php echo $row['specialization'] ?></td>
                                <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="deletebooking.php?id=<?php echo $row['bid'] ?>">Delete </a></td>
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

                <br><br><br><br>

                <?php  
                $uid = $_SESSION['USERID'];
                $qry = mysqli_query($con, "SELECT * FROM `booking` b, `doctor` d, `patient` p, `schedule` s, `specialization` sp WHERE b.`pid`=p.`pid` AND b.`did`=d.`did` AND b.`sid`=s.`sched_id` AND b.`pid`='$uid' AND d.`sid`=sp.`sid` AND `status`='Visited'");
                if (mysqli_fetch_array($qry) > 0) {
                ?>
                    <h5>Previous Booking</h5>
                    <table id="customers">
                        <tr>
                            
                            
                            <th>Doctor</th>
                            <th>Email</th>
                            <th>Conatct</th>
                            <th>Date</th>
                            <th>Token</th>
                            <th>Time</th>
                            <th>Specialization</th>
                        </tr>

                        <?php
                        $qry = mysqli_query($con, "SELECT * FROM `booking` b, `doctor` d, `patient` p, `schedule` s, `specialization` sp WHERE b.`pid`=p.`pid` AND b.`did`=d.`did` AND b.`sid`=s.`sched_id` AND b.`pid`='$uid' AND d.`sid`=sp.`sid` AND b.`status`='Visited' ORDER BY `date` DESC");
                        
                        while ($row = mysqli_fetch_array($qry)) {
                            $bookid=$row['bid'];
                        ?>
                        
                            <tr>
                                <td><?php echo $row[7] ?></td>
                                <td><?php echo $row[11] ?></td>
                                <td><?php echo $row[10] ?></td>
                                <td><?php echo $row['date'] ?></td>
                                <td><?php echo $row['token'] ?></td>
                                <td><?php echo $row['start_time'] . " - " . $row['end_time']; ?></td>
                                <td><?php echo $row['specialization'] ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                <?php
                } else {
                ?>
                    <div style="float:left;margin-left:450px;">
                        <h5>No result found</h5>
                        <img src="../noData.png" width="30%" height="30%" style=" margin-left: auto; margin-right: auto;">
                    </div>
                    
                <?php
                }
                ?>

            </div>

        </div>
    </div>



    <?php
    include '../Footer.php';
    ?>