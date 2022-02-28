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
                <form method="post" class="signin-form">
                    <div class="input-grids">
                    </div>
                    <div class="form-input">
                        <textarea name="prescription" id="w3lMessage" placeholder="Type the prescription here*" required></textarea>
                    </div>
                    <label class="container1">Report is not required
                            <input type="radio" checked="checked" name="report" value="0">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container1">Report is required
                            <input type="radio" name="report" value="1">
                            <span class="checkmark"></span>
                        </label>
                    <div class="w3l-submit text-lg-right">
                        <button class="btn btn-style btn-primary" name="submit">Send</button>
                    </div>
                </form>

                <?php
                include '../Dbconnetion.php';
                if (isset($_POST['submit'])) {
                    //                            
                    $prescription = $_POST['prescription'];
                    $report=$_POST['report'];
                    $pid = $_GET['pid'];
                    $bid = $_GET['bid'];
                    $date = $_GET['date'];
                    $did = $_SESSION['USERID'];

                    $qry = "INSERT INTO `prescription`(`bid`,`did`,`pid`,`prescrription`,`report`,`date`) VALUES ('$bid','$did','$pid','$prescription','$report','$date')";
                    $exe = mysqli_query($con, $qry);
                    if ($exe) {
                        echo '<script>alert("Prescription Added!!!"); window.location="ViewMyPatient.php"</script>';
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