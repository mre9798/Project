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
                $qry = mysqli_query($con, "SELECT * FROM `prescription` p, `schedule` s, `doctor` d WHERE p.`pid`=$uid AND p.did=d.did AND s.did=p.did");
                if (mysqli_fetch_array($qry) > 0) {
                ?>
                    <table id="customers">
                        <tr>
                            <th>Doctor</th>
                            <th>Date</th>
                            <th>Prescriptions</th>
                            <th>Upload Report</th>
                            
                        </tr>

                        <?php
                        $qry = mysqli_query($con, "SELECT * FROM `prescription` p, `doctor` d WHERE p.`pid`=$uid AND p.did=d.did ORDER BY `date` DESC");

                        while ($row = mysqli_fetch_array($qry)) {
                            $qryRep = "SELECT * FROM `test_report` WHERE `bid`='$row[bid]'";
                            // echo $qryRep;
                            $resRep = mysqli_query($con, $qryRep);
                            $count = mysqli_num_rows($resRep);
                            if ($count > 0) {
                                $rowRep = mysqli_fetch_array($resRep);
                                $data = $rowRep['test'];
                                $val = True;
                            } else {
                                $val = False;
                            }
                        ?>

                            <tr>
                                <td><?php echo $row['name'] ?></td>
                                <td><?php echo $row['date'] ?></td>
                                <td><?php echo $row['prescrription'] ?></td>
                                <td>
                                    <?php if ($val) {
                                    ?>

                                        <a href="<?php echo $data ?>" target="_blank">View Report</a>
                                </td>
                            <?php
                                    } else {
                                        if($row['report']==1){
                            ?>

                                <a href="AddTestReports.php?bid=<?php echo $row['bid'] ?>&did=<?php echo $row['did'] ?>">Add Report</a>
                            <?php
                                    }
                                        else{?>   
                                         <a>Report Not Required</a>
                                        <?php 
                                        }

                                    } ?>
                            </td>

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