<?php
session_start();
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <?php

    include("head.php");

    ?>
</head>

<body>


    <?php

    include("header.php");

    ?>

    <div style="margin-top: 20px;"></div>
    <div class="image-container">
        <img src="image/banner.jpg" alt="banner" class="image-resize">
        <div class="image-overlay"></div>
    </div>
    <div style="margin-bottom: 50px;"></div>

    <div class="container">
        <h2 class="run_title">Running Shows</h2>
        <div class="row">
            <?php
            include_once 'Database.php';
            $result = mysqli_query($conn, "SELECT * FROM add_movie");

            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_array($result)) {
                if ($row['action'] == "running") {
                  ?>

                  <div class="col-lg-3 col-md-3 col-sm-6">
                      <div class="running-movie">
                          <img src=admin/image/<?php echo $row['image']; ?> alt="" class="image-resize2" style="width: 100%;">
                          <div class="top-right">
                              <a data-toggle="modal" data-target="#tailer_modal<?php echo $row['id']; ?>"><img
                                      src="img/icon/play.png"></a>
                          </div>
                          <h5><b><?php echo $row['movie_name']; ?></b></h5>
                          <h6>
                              <center><?php echo $row['language']; ?></center>
                          </h6>

                          <div class="book">
                              <span><a href="movie_details.php?pass=<?php echo $row['id']; ?>"></a></span>
                          </div>
                      </div>
                  </div>

                  <div class="modal fade" id="tailer_modal<?php echo $row['id']; ?>" tabindex="-1" role="dialog"
                      aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                          <div class="modal-content">
                              <embed style="width: 820px; height: 450px;" src="<?php echo $row['you_tube_link']; ?>"></embed>
                          </div>
                      </div>
                  </div>

                  <?php
                }
              }
            }
            ?>
        </div>
    </div>

    <div class="container">
        <h2 class="up_title">Upcoming Shows</h2>
        <div class="row">
            <?php
            include_once 'Database.php';
            $result = mysqli_query($conn, "SELECT * FROM add_movie");

            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_array($result)) {
                if ($row['action'] == "upcoming") {
                  ?>
                  <div class="image-box">
                      <div class="col-lg-2 col-md-3 col-sm-6">

                          <div class="card" style="width: 12rem;">
                              <img class="card-img-top image-resize4" src="admin/image/<?php echo $row['image']; ?> "
                                  alt="Card image cap">

                              <div class="card-body">
                                  <h5 class="card-title"><?php echo $row['movie_name']; ?></h5>
                                  <p class="card-text">Director: <?php echo $row['directer']; ?></p>
                              </div>
                          </div>
                      </div>
                  </div>
                  <?php
                }
              }
            }
            ?>

        </div>
    </div>

    <?php
    include("footer.php");
    ?>

</body>

</html>