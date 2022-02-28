<?php
include './Header.php';
include './Dbconnetion.php';
$qrySpe = "SELECT * FROM `specialization`";
$resSpe = mysqli_query($con, $qrySpe);

?>



<!-- banner bottom shape -->
<!--/contact-->
<section class="w3l-contact-2 py-5" id="contact">
    <div class="container py-lg-5 py-md-4 py-2">
        <div class="contact-grids d-grid">

            <div class="contact-right">
                <form method="post" class="signin-form" enctype="multipart/form-data">
                    <div class="input-grids">
                        <input type="text" name="name" id="w3lName" placeholder="Enter the Name*" class="contact-input" required=""/>
                        <input maxlength="3" type="number" name="age" id="w3lSubect" placeholder="Age*" class="contact-input" required/>
                        <select name="spec" id="" style="width: 100%; padding:10px; margin-bottom:15px; border-radius:7px; height: 60px; background-color: #f4f6f9; border:none" required>
                            <option value="" selected disabled>Select Specialization</option>
                            <?php
                            while ($rowSpe = mysqli_fetch_array($resSpe)) {
                                echo "<option value='$rowSpe[sid]' >$rowSpe[specialization]</option>";
                            }
                            ?>
                        </select>
                        <input type="text" name="contact"  id="w3lWebsite" placeholder="Contact*" class="contact-input" required pattern="[6789][0-9]{9}" maxlength="10" />
                        <input type="text" name="location" id="w3lWebsite" placeholder="Enter the location*" class="contact-input" required/>
                        <input type="email" name="email" id="w3lWebsite" placeholder="Enter the email*" class="contact-input" required/>
                        <input minlength="8" type="password" name="psw" id="w3lWebsite" placeholder="Enter the password*" class="contact-input" required/>
                        QUALIFICATION
                        <input type="file" name="qual" id="w3lWebsite" placeholder="Qualification*" class="contact-input" required/>
                        <input type="text" name="tcmid" id="w3lWebsite" placeholder="TCM ID*" class="contact-input" required/>
                        TCM CERTIFICATE
                        <input type="file" name="tcm" id="w3lWebsite" class="contact-input" required="" />
                    </div>
                    <div class="form-input">
                        <textarea name="address" id="w3lMessage" placeholder="Type the address here*" required></textarea>
                    </div>
                    <div class="w3l-submit text-lg-right">
                        <button class="btn btn-style btn-primary" name="submit">Register</button>
                    </div>
                </form>

                <?php

                if (isset($_POST['submit'])) {
                    //                            
                    $name = $_POST['name'];
                    $age = $_POST['age'];
                    $email = $_POST['email'];
                    $phone = $_POST['contact'];
                    $location = $_POST['location'];
                    $address = $_POST['address'];
                    $psw = $_POST['psw'];
                    $spec = $_POST['spec'];
                    $tmcid = $_POST['tcmid'];
                    $sel = "SELECT COUNT(*) AS COUNT FROM `doctor` WHERE `email`='$email' OR `contact`='$phone'";
                    $res = mysqli_query($con, $sel);
                    $fetch = mysqli_fetch_array($res);
                    if ($fetch['COUNT'] > 0) {
                        echo '<script>alert("Already Registered")</script>';
                    } else {
                        $folder = 'images/';
                        $file = $folder . basename($_FILES['qual']['name']);
                        move_uploaded_file($_FILES['qual']['tmp_name'], $file);
                        $file2 = $folder . basename($_FILES['tcm']['name']);
                        move_uploaded_file($_FILES['tcm']['tmp_name'], $file2);
                        $qry = "INSERT INTO `doctor`(`name`,`age`,`address`,`contact`,`email`,`location`, `sid`, `qual_cert`, `TCM_cert`, `TCM_id`)VALUES('$name','$age','$address','$phone','$email','$location', '$spec', '$file','$file2', '$tmcid')";
                        $exe = mysqli_query($con, $qry);
                        if ($exe) {
                            $qry2 = "INSERT INTO `login`(`uid`,`uname`,`psw`,`type`, `status`)VALUES((SELECT MAX(`did`) FROM `doctor`),'$email','$psw','Doctor', 0)";
                            $exe2 = mysqli_query($con, $qry2);
                            echo '<script>alert("User Registration Successfull!!!")</script>';
                        } else {
                            echo '<script>alert("Failed to Register")</script>';
                        }
                    }
                }
                ?>

            </div>
        </div>
</section>

<?php
include './Footer.php';
?>