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
                $qry = mysqli_query($con, "SELECT * FROM `medicine` m,`doctor` d WHERE pid=$uid AND m.did=d.did ");
                if (mysqli_fetch_array($qry) > 0) {
                ?>
                    <table id="customers">
                        <tr>
                            <th>Doctor</th>
                            <th>Date</th>
                            <th>Medicines</th>
                        </tr>

                        <?php
                        $qry = mysqli_query($con, "SELECT * FROM `medicine` m,`doctor` d WHERE pid=$uid AND m.did=d.did ORDER BY `date` DESC");

                        while ($row = mysqli_fetch_array($qry)) {
                        ?>

                            <tr>
                                <td><?php echo $row['name'] ?></td>
                                <td><?php echo $row['date'] ?></td>
                                <td><?php echo $row['medicines'] ?></td>

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