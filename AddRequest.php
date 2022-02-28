<?php
session_start();
include '../Header.php';
$did = $_GET['id'];
?>



<!-- banner bottom shape -->
<!--/contact-->
<section class="w3l-contact-2 py-5" id="contact">
    <div class="container py-lg-5 py-md-4 py-2">
        <div class="contact-grids d-grid">

            <div class="contact-right">
                <form action="AddBooking.php" method="get" class="signin-form" enctype="multipart/form-data">
                    <div class="input-grids">
                        Select Date:
                        <input type="date" name="date" id="w3lName" class="contact-input" required/>
                        <input type="hidden" name="id" id="w3lName" class="contact-input" value="<?php echo $did ?> " />
                    </div>
                    <div class="w3l-submit text-lg-center">
                        <button class="btn btn-style btn-primary" name="submit">Submit</button>
                    </div>
                </form>


            </div>
        </div>
</section>

<?php
include '../Footer.php';
?>