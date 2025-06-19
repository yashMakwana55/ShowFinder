<?php
session_start();

        include_once 'Database.php';
        $id = $_GET['pass'];
        $result = mysqli_query($conn,"SELECT * FROM add_movie WHERE id = '".$id."'");
        $row = mysqli_fetch_array($result);
        ?>

<!DOCTYPE html>
<html>
<head>
<?php
include("header.php");
?>
</head>
<body>
<?php
include("head.php");
?>

<section id="aboutUs">
  <div class="container">
<?php
        include_once 'Database.php';
        $id = $_GET['pass'];
        $result = mysqli_query($conn,"SELECT * FROM add_movie WHERE id = '".$id."'");
        
        
        if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_array($result)) {
            $id = $row['id'];
        ?>
    <div class="row feature design">
        <div class="col-lg-5"> <img src="admin/image/<?php echo $row['image']; ?>" class="resize-detail" alt="" width="100%"> </div>
      <div class="col-lg-7">
        
        <table class="content-table">
          <thead><tr>
            <th colspan="2">Details</th>
          </tr>
        </thead>
       
          <tbody>
          <tr>
            <td>Name</td><td><?php echo $row['movie_name'];?></td>
          </tr>
          <tr>
            <td>Release Date</td><td><?php echo $row['release_date'];?></td>
          </tr>
          <tr>
            <td>Directer Name</td><td><?php echo $row['directer'];?></td>
          </tr>
          <tr>
            <td>Category</td><td><?php echo $row['categroy'];?></td>
          </tr>
          <tr>
            <td>Language</td><td><?php echo $row['language'];?></td>
          </tr>
         
          <tr>
            <td>Trailer</td><td><a data-toggle="modal" data-target="#tailer_modal<?php echo $row['id'];?>">Watch Trailer</a></td>
            <div class="modal fade" id="tailer_modal<?php echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <embed style="width: 820px; height: 450px;" src="<?php echo $row['you_tube_link'];?>"></embed>
    </div>
  </div>
</div> 
          </tr>
          
          </tbody>
            
          
        </table>
        <?php  if($row['action']== "running"){?>
        <div class="tiem-link">
          <h3>Show Timings:</h3>
          <div class="mt-2"></div>
          <?php 
            $time = $row['show'];

            $movie = $row['movie_name'];
            $set_time = explode(",", $time);
            $res = mysqli_query($conn,"SELECT * FROM theater_show");

        if (mysqli_num_rows($res) > 0) {
          while($row = mysqli_fetch_array($res)) {

            if(in_array($row['show'],$set_time)){

              ?><a href="seatbooking.php?movie=<?php echo $movie; ?>&time=<?php echo $row['show'];?>"><?php echo $row['show'];?></a><?php
             
             }
           }
         }
          ?>
        
       
      </div>
      </div>
      
    </div>
    <div class="mt-5"></div>
    <div class="description">
      <h4>Description</h4>
      <p>
        
"Death of a Salesman" is a poignant exploration of the American Dream's disillusionment, portraying the tragic life of Willy Loman as he grapples with identity, success, and the harsh realities of a changing society.
      </p>
    </div>
    <?php
        }
        }
      }
         ?>
    </div>
  
</section>

<?php
include("footer.php");
?>


    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>     