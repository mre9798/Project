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
                <table id="customers">
                        <tr>
                            <th>Medicine Name</th>
                            <th>Dose</th>
                            <th>Duration</th>
                        </tr>
                </table>
                    <div class="form-input">
                        <textarea name="medicine" id="w3lMessage" required=""></textarea>
                    </div>
                    <div class="w3l-submit text-lg-right">
                        <button class="btn btn-style btn-primary" name="submit">Send</button>
                    </div>
                </form>

                <?php
                include '../Dbconnetion.php';
                if (isset($_POST['submit'])) {
                    //                            
                    $medicine = $_POST['medicine'];
                    $pid = $_GET['pid'];
                    $bid = $_GET['bid'];
                    $date = $_GET['date'];
                    $did = $_SESSION['USERID'];

                    $qry = "INSERT INTO `medicine` (`bid`,`did`,`pid`,`medicines`,`date`) VALUES ('$bid','$did','$pid','$medicine','$date')";
                    $exe = mysqli_query($con, $qry);
                    if ($exe) {
                        echo '<script>alert("Medicine Added!!!"); window.location="ViewMyPatient.php"</script>';
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