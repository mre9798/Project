<?php
include './Header.php';
?>



<!-- banner bottom shape -->
<!--/contact-->
<section class="w3l-contact-2 py-5" id="contact">
    <div class="container py-lg-5 py-md-4 py-2">
        <div class="contact-grids d-grid">

            <div class="contact-right">
                <form method="post" class="signin-form">
                    <div class="input-grids">
                        <input type="text" name="name" id="w3lName" placeholder="Enter the patient name*" class="contact-input" required/>
                        <input pattern='[A-Za-z]*$' type="text" name="address" id="w3lName" placeholder="Enter the address*" class="contact-input" required/>
                        <input pattern='[0-9]*$' type="number" name="age" id="w3lName" placeholder="Enter the age*" class="contact-input" required/>
                        <label class="container1">Male
                            <input type="radio" checked="checked" name="gender" value="male">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container1">Female
                            <input type="radio" name="gender" value="female">
                            <span class="checkmark"></span>
                        </label>
                        <input pattern='[A-Za-z]*$' type="text" name="place" id="w3lName" placeholder="Enter the place*" class="contact-input" required/>
                        <input pattern="[6789][0-9]{9}" maxlength="10" type="text" name="phone" id="w3lName" placeholder="Enter the phone*" class="contact-input" required/>
                        <input type="email" name="email" id="w3lName" placeholder="Enter the Email*" class="contact-input" required/>
                        <input minlength="8" type="password" name="psw" id="w3lName" placeholder="Enter the Psssword*" class="contact-input" required/>

                    </div>

                    <div class="w3l-submit text-lg-right">
                        <button class="btn btn-style btn-primary" name="submit">Submit</button>
                    </div>
                </form>

                <?php
                include './Dbconnetion.php';
                if (isset($_POST['submit'])) {
                    //                            
                    $name = $_POST['name'];
                    $address = $_POST['address'];
                    $age = $_POST['age'];
                    $gender = $_POST['gender'];
                    $place = $_POST['place'];
                    $phone = $_POST['phone'];
                    $email = $_POST['email'];
                    $psw = $_POST['psw'];
                    $sel = "SELECT COUNT(*) AS COUNT FROM `patient` WHERE `email`='$email' OR `phone`='$phone'";
                    $res = mysqli_query($con, $sel);
                    $fetch = mysqli_fetch_array($res);
                    if ($fetch['COUNT'] > 0) {
                        echo '<script>alert("Already Registered")</script>';
                    } else {
                        $qry = "INSERT INTO `patient`(`name`,`address`,`age`,`gender`,`place`,`phone`,email)VALUES('$name','$address','$age','$gender','$place','$phone','$email')";

                        $exe = mysqli_query($con, $qry);
                        if ($exe) {
                            $qry2 = "INSERT INTO `login`(`uid`,`uname`,`psw`,`type`, `status`)VALUES((SELECT MAX(`pid`) FROM `patient`),'$email','$psw','Patient',1)";
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