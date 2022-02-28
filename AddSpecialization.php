<?php
include '../Header.php';
?>



<!-- banner bottom shape -->
<!--/contact-->
<section class="w3l-contact-2 py-5" id="contact">
    <div class="container py-lg-5 py-md-4 py-2">
        <div class="contact-grids d-grid">

            <div class="contact-center">
                <form method="post" class="signin-form">
                    <div class="input-grids">
                        <input pattern='[A-Za-z]*$' type="text" name="specialization" id="w3lName" placeholder="Enter the Specialization*" class="contact-input" required>
                        
                    </div>

                    <div class="w3l-submit text-lg-right">
                        <button class="btn btn-style btn-primary" name="submit">Submit</button>
                    </div>
                </form>

                <?php
                include '../Dbconnetion.php';
                if (isset($_POST['submit'])) {
                    //                            
                    $specialization = $_POST['specialization'];

                    $qry = "INSERT INTO `specialization` (`specialization`) VALUES ('$specialization')";

                    $exe = mysqli_query($con, $qry);
                    if ($exe) {
                        echo '<script>alert("Successfull!!!")</script>';
                    } else {
                        echo '<script>alert("Failed ")</script>';
                    }
                }
                ?>

            </div>
        </div>
        <div class="col-lg-12 whybox-wrap-left mt-5">
            <?php

            $qry = mysqli_query($con, "SELECT * FROM `specialization` ORDER BY `sid` DESC");

            if (mysqli_fetch_array($qry) > 0) {
            ?>
                <table id="customers">
                    <tr>
                        <th>Specialization</th>
                        <th>Action</th>
                    </tr>

                    <?php
                    $qry = mysqli_query($con, "SELECT * FROM `specialization` ORDER BY `specialization` ASC");

                    while ($row = mysqli_fetch_array($qry)) {
                    ?>

                        <tr>
                            <td><?php echo $row['specialization'] ?></td>
                            <td>&nbsp; <a href="deleteSpecialization.php?id=<?php echo $row['sid'] ?>">Remove</a></td>

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
</section>

<?php
include '../Footer.php';
?>