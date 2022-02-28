<?php
session_start();
include '../Header.php';
include './SearchCss.php';
?>


<div class="w3l-content-2 py-5">
    <div class="container py-md-5 py-2">
        <form method="POST">

            <div style="float:left;margin-left:400px;">
            <input pattern='[A-Za-z]*$' type="text" placeholder="Search By Name or Loaction" name="search"  class="search" required>
           </div>
            <button type="submit" name="submit" class="serbutton"><i class="fa fa-search"></i></button>
          
        </form>
        

            
                <br><br><br>
                <?php
                include '../Dbconnetion.php';
                if (isset($_POST['submit'])) {
                    $search = $_POST['search'];
                    $qry = mysqli_query($con, "SELECT l.`lid`,d.* FROM `doctor` d,`login` l WHERE l.`uid`=d.`did` AND l.`type`='Doctor' AND l.`status`=1 AND d.`location` LIKE'%$search%' OR d.`name` LIKE'%$search%'");
                    if (mysqli_fetch_array($qry) > 0) {
                ?>
                <h4>Search result</h4><br>
                        <table id="customers">
                            <tr>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Address</th>
                                <th>Location</th>
                                <th>Conatct</th>
                                <th>Email</th>
                                <th>Specialization</th>
                                <th></th>
                            </tr>

                            <?php
                            $qry = mysqli_query($con, "SELECT l.`lid`,d.*, s.* FROM `doctor` d,`login` l, `specialization` s WHERE l.`uid`=d.`did` AND l.`type`='Doctor' AND l.`status`=1 AND d.`name` LIKE'%$search%' AND d.`sid`=s.`sid`");
                            
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
                                    <td></a>&nbsp; <a href="AddRequest.php?id=<?php echo $row['did'] ?>" class="ser1">BOOK APPOINTEMENT</a></td>

                                </tr>
                                <?php
                                } 
                            
                                $qry = mysqli_query($con, "SELECT l.`lid`,d.*, s.* FROM `doctor` d,`login` l, `specialization` s WHERE l.`uid`=d.`did` AND l.`type`='Doctor' AND l.`status`=1 AND d.`location` LIKE'%$search%' AND d.`sid`=s.`sid`");
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
                                    <td></a>&nbsp; <a href="AddRequest.php?id=<?php echo $row['did'] ?>" class="ser1">BOOK APPOINTEMENT</a></td>

                                </tr>
                                <?php
                                }
                            
                                ?>
                        </table>
                    <?php
                    } else {
                    ?>
                    <div style="float:left;margin-left:-250px;">
                        <h5>No result found</h5>
                        <img src="../noData.png" width="30%" height="30%" style=" margin-left: auto; margin-right: auto;">
                    </div>
                <?php
                    }
                }
                ?>


            

        
    </div>



    <?php
    include '../Footer.php';
    ?>