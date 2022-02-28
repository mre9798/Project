

<?php
session_start();
include '../Header.php';
?>


<div class="w3l-content-2 py-5">
    <div class="container py-md-5 py-2">
        <div class="row whybox-wrap">
            <div class="col-lg-6 whybox-wrap-left">
                <?php
                include '../Dbconnetion.php';
                $uid=$_SESSION['USERID'];
                $qry = mysqli_query($con, "SELECT p.*,b.* FROM `bill` b,`patient` p,`doctor` d WHERE b.`did`=d.`did` AND b.`pid`=p.`pid` AND d.`did`='$uid'");

                if (mysqli_fetch_array($qry) > 0) {
                    ?>
                    <table id = "customers">
                        <tr>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Address</th>
                            <th>Conatct</th>
                            <th>Email</th>
                            <th>Prescription</th>
                            <th>Fee</th>
                            <th>Date</th>
                            <th>Payment</th>
                            
                        </tr>

                        <?php
                        $qry = mysqli_query($con, "SELECT p.*,b.* FROM `bill` b,`patient` p,`doctor` d WHERE b.`did`=d.`did` AND b.`pid`=p.`pid` AND d.`did`='$uid'");

                        while ($row = mysqli_fetch_array($qry)) {
                            ?>

                            <tr>
                                <td><?php echo $row['name'] ?></td>
                                <td><?php echo $row['age'] ?></td>
                                <td><?php echo $row['address'] ?></td>
                                <td><?php echo $row['phone'] ?></td>
                                <td><?php echo $row['email'] ?></td>
                                <td><?php echo $row['presc'] ?></td>
                                <td><?php echo $row['fee'] ?></td>
                                <td><?php echo $row['date'] ?></td>
                                <td><?php echo $row['payment'] ?></td>
               
                            </tr>
                            <?php
                        }
                        ?>
                    </table>
                    <?php
                } else {
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