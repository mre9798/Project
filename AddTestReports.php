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
                <form method="post" class="signin-form" enctype="multipart/form-data">
                    <div class="input-grids">
                    </div>
                    <div class="form-input">
                        Add the test report:
                        <input type="file" name="report" id="">
                    </div>
                    <div class="w3l-submit text-lg-right">
                        <button class="btn btn-style btn-primary" name="submit">Send</button>
                    </div>
                </form>

                <?php
                include '../Dbconnetion.php';
                if (isset($_POST['submit'])) {
                    //                     
                    $folder = 'images/';
                    $file = $folder . basename($_FILES['report']['name']);
                    move_uploaded_file($_FILES['report']['tmp_name'], $file);
                    $did = $_GET['did'];
                    $bid = $_GET['bid'];
                    $pid = $_SESSION['USERID'];

                    $qry = "INSERT INTO `test_report`(`bid`,`did`,`pid`,`test`) VALUES ('$bid','$did','$pid','$file')";
                    $exe = mysqli_query($con, $qry);
                    if ($exe) {
                        echo '<script>alert("Report Added!!!"); window.location="AddTestReports.php"</script>';
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