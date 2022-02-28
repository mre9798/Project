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

                $qry = mysqli_query($con, "SELECT l.`lid`,d.*, s.* FROM `doctor` d,`login` l, `specialization` s WHERE l.`uid`=d.`did` AND l.`type`='Doctor' AND l.`status`=1 AND d.`sid`=s.`sid`");

                if (mysqli_fetch_array($qry) > 0) {
                ?>
                    <table id="customers">
                        <tr>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Address</th>
                            <th>Location</th>
                            <th>Conatct</th>
                            <th>Email</th>
                            <th>Specialization</th>
                            <th>Qualification</th>
                            <th>TCM ID</th>
                            <th>TCM Certificate</th>
                        </tr>

                        <?php
                        $qry = mysqli_query($con, "SELECT l.`lid`,d.*, s.* FROM `doctor` d,`login` l, `specialization` s WHERE l.`uid`=d.`did` AND l.`type`='Doctor' AND l.`status`=1 AND d.`sid`=s.`sid` ORDER BY `name` ASC");

                        while ($row = mysqli_fetch_array($qry)) {
                        ?>

                            <tr>
                                <td><?php echo $row['name'] ?></td>
                                <td><?php echo $row['age'] ?></td>
                                <td><?php echo $row['address'] ?></td>
                                <td><?php echo $row['location'] ?></td>
                                <td><?php echo $row['contact'] ?></td>
                                <td><?php echo $row['email'] ?></td>
                                <td><?php echo $row['specialization'] ?></td>
                                <td> <a href="<?php echo '../' . $row['qual_cert'] ?>" target="_blank">Qualification</a> </td>
                                <td> <?php echo $row['TCM_id'] ?></td>
                                <td> <a href="<?php echo '../' . $row['TCM_cert'] ?>" target="_blank">TCM Certificate</a> </td>

                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                <?php
                } else {
                    echo '<script>alert("Doctors not Registered")</script>';
                }
                ?>


            </div>

        </div>
    </div>



    <?php
    include '../Footer.php';
    ?>