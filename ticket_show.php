<?php
session_start();
if (!isset($_SESSION['uname'])) {
  header("location:index.php");
}
?>
<html>
<head>
	<meta charset="utf-8">
	<title>Ticket</title>

<link href='css/bootstrap.min.css' rel='stylesheet'>
<!-- https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/ -->

<!--<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap" rel="stylesheet"> / https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/-->
    <link href="css/bootstrap.min.css">
    <link href="css/fontawesome.min.css">
 
</head>
<body>

 <div class="container py-5">
    <!-- For demo purpose -->
    <div class="row mb-4">
        <div class="col-lg-8 mx-auto text-center">
            <h1 class="display-6">BOOKING SUMMARY</h1>
        </div>
    </div> <!-- End -->
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <div class="card ">
                <div class="card-header">
                    <center><a href="index.php"><img src="img/logo.png" style="border-radius:0.9rem" width="40%"></a>
                    <div class="mt-3"></div>
                    <?php 
                  include "Database.php";
                  $result = mysqli_query($conn,"SELECT c.movie,c.booking_date,c.show_time,c.seat,c.totalseat,c.price,c.payment_date,c.custemer_id,u.username,u.email,u.mobile,u.city,t.theater FROM customers c INNER JOIN user u on c.uid=u.id INNER JOIN theater_show t on c.show_time=t.show WHERE custemer_id = '".$_SESSION['custemer_id']."'");
                  
                  $row = mysqli_fetch_array($result);
                 
                ?>
                    <table>
                        <tr>
                        <td>+91 90332 93323</td>
                        <td style="padding: 12px 2px 12px 155px;">Customer Id: <?php echo $row['custemer_id'];?></td>
                    </tr>
                    <tr>
                        <td></td><td style="padding: 1px 2px 1px 155px;">Date: <?php echo $row['payment_date'];?></td>
                    </tr>
                    </table>
                    <hr>
                    
                    <h1 style="color:#f9bc50; background-color:#000; border-radius:0.9rem;"><?php echo $row['movie'];?></h1>
                    <div class="mt-3"></div>
                   <table>
                   	<tr>
                   	<th style="padding-left: 70px;">Name</th><th style="padding: 1px 105px;">City</th>
                   </tr>
                   <tr>
                   	<td style="padding-left: 70px"><?php echo $row['username'];?></td><td style="padding: 12px 105px;"><?php echo $row['city'];?></td>
                   </tr>
                   <tr>
                   	<th style="padding-left: 70px">Email</th><th style="padding: 1px 105px;">Phone</th>
                   </tr>
                   <tr>
                   	<td style="padding-left: 70px"><?php echo $row['email'];?></td><td style="padding: 12px 105px;"><?php echo $row['mobile'];?></td>
                   </tr>
                   <tr>
                   	<th style="padding-left: 70px">Payment Date</th><th style="padding: 1px 105px;">Amount paid</th>
               	  </tr>
               	  <tr>
               	  	<td style="padding-left: 70px"><?php echo $row['payment_date'];?></td><td style="padding: 12px 105px;">₹<?php echo $row['price'];?>/-</td>
               	  </tr>
                   </table>

                   <hr>

                   <h4>SHOW DETAILS:</h4>
                   <table>
                   	<tr>
                   	<th>Theater</th><th style="padding: 0px 2px 0px 6px">Date</th><th style="padding-left: 70px;">Time</th>
                   </tr>
                   <tr>
                   	<td>No. <?php echo $row['theater'];?></td><td style="padding: 12px 2px 12px 6px"><?php echo $row['booking_date'];?> </td><td style="padding-left: 70px;"> <?php echo $row['show_time'];?></td>
                   </tr>
                   <tr>
                   	<th>Seats</th><th style="padding: 0px 2px 0px 6px;">Total Seats</th>
                   </tr>
                   <tr>
                   	<td style="padding-right: 150px;"><?php echo $row['seat'];?></td><td style="padding: 12px 2px 12px 6px"><?php echo $row['totalseat'];?></td>
                   </tr>
                   </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>