<?php
session_start();
include '../Header.php';
?>



<!-- banner bottom shape -->
<!--/contact-->
<section class="w3l-contact-2 py-5" id="contact">
    <div class="container py-lg-5 py-md-4 py-2">
        <div class="contact-grids d-grid">

            <div class="contact-right">
                <form method="post" class="signin-form" >
                    <div class="input-grids">
                        <input type="Doctors fee" name="fee" id="w3lName" placeholder="Enter the Fee*" class="contact-input"
                               required="" />
                    </div>
                    <div class="form-input">
                        <textarea name="prescription" id="w3lMessage" placeholder="Type the prescription here*" required=""></textarea>
                    </div>
                    <div class="w3l-submit text-lg-right">
                        <button class="btn btn-style btn-primary" name="submit">Send</button>
                    </div>
                </form>

                <?php
                include '../Dbconnetion.php';
                if (isset($_POST['submit'])) {
//                            
                    $fee = $_POST['fee'];
                    $prescription = $_POST['prescription'];
                    $pid = $_GET['uid'];
                    $did = $_SESSION['USERID'];
                    $date = date('y/m/d');
                    
                    $folder1 = '../images/';
                    $file1 = $folder1 . basename($_FILES['img']['name']);
                    move_uploaded_file($_FILES['img']['tmp_name'], $file1);
                    $folder1 = 'images/';
                    $file1 = $folder1 . basename($_FILES['img']['name']);
                    $qry = "INSERT INTO `bill`(`pid`,`did`,`fee`,`presc`,`date`)VALUES('$pid','$did','$fee','$prescription','$date')";
                    $exe = mysqli_query($con, $qry);
                    if ($exe) {
                        echo '<script>alert("Successfull!!!")</script>';
                    } else {
                        echo '<script>alert("Failed to Register")</script>';
                    }
                }
                ?>

            </div>
        </div>
</section>

<?php
include '../Footer.php';
?>