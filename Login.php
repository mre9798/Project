<?php session_start(); ?>
<!DOCTYPE html>
<html lang="zxx">

    <head>
        <title>MediHelp</title>
        <!-- Meta tag Keywords -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8" />
        <meta name="keywords"
              content="Hotair Login Form Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <!-- //Meta tag Keywords -->
        <link href="//fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@400;600;700;900&display=swap" rel="stylesheet">
        <!--/Style-CSS -->
        <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
        <!--//Style-CSS -->

        <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" media="all">
        
      
<style>
    body{
        background-image:url('bg1.jpg');
        background-repeat:no-repeat;
    }
    #divhead
{
    width:500px;margin-left:700px;margin-top:30px;
}
.devil
{
    background-color:transparent;
    padding: 3em 3em;
    box-shadow: 2px 9px 49px -17px rgba(0, 0, 0, 0.1);
    width:500px;
    height: 400px;
    margin-left:800px;
    margin-top:100px;
    text-align:center;
}
    </style>
    </head>

    <body>
    <div id="divhead">
            <h1>MediHelp</h1>
           
    <!-- //form section start -->
</div>

<div class="devil">
                            <h2 >Log In</h2><br>
                            <p>To Your Account</p><br>
                            <form method="post">
                                <input type="text" class="text" name="uname" placeholder="User Name" required style="height:40px;text-align:center;"><br><br>
                                <input type="password" class="password" name="psw" placeholder="User Password" required style="height:40px;text-align:center;"><br><br>
                                <button class="btn" type="submit" name="submit" style="height:40px;width:100px;">Log In</button><br><br>
                            </form>
                            <?php
                            include '../Dbconnetion.php';

                            if (isset($_POST['submit'])) {

                                $Username = $_POST['uname'];
                                $password = $_POST['psw'];
                                $qry = "SELECT * FROM `login` WHERE `uname`='$Username' AND `psw`='$password' ";

                                $check = mysqli_query($con, $qry);
                                if (mysqli_num_rows($check) == 0) {
                                    echo "<script> alert('invalid user or password');</script>";
                                } else {
                                    $row = mysqli_fetch_assoc($check);
                                    $_SESSION["USERID"] = $row["uid"];
                                    $val=$row["uid"];
                                    if ($row["status"] == 1) {
                                        if ($row["type"] == "Admin") {
                                            echo "<script> window.location='../Admin/AdminHome.php'</script>";
                                        } elseif ($row["type"] == "Patient") {
                                            echo "<script> window.location='../Patient/PatientHome.php'</script>";
                                        } elseif ($row["type"] == "Doctor") {
                                            
                                            echo "<script> window.location='../Doctor/DoctorHome.php?id=$val' </script>";                      
                                        } else {
                                            echo "<script> alert ('please check your password');</script>";
                                        }
                                    } else {
                                        echo "<script> alert('Not Approved By Admin');</script>";
                                    }
                                }
                            }
                            ?>

</div>

    <script src="js/jquery.min.js"></script>
    

</body>

</html>