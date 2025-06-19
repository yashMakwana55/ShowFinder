<?php

include('includes/conn.php');
include('includes/config.php');
include('includes/functions.php');

if (!isset($_SESSION['admin'])) {
    header("location:login.php");
}

//delete record
if (isset($_GET['delete'])) {
    if ($stm = $connect->prepare('DELETE FROM customers WHERE id = ?')) {
        $stm->bind_param('i', $_GET['delete']);
        $stm->execute();

        set_message("Booking ID:" . $_GET['delete'] . " has been deleted");
        header('Location: bookings.php');
        $stm->close();
        die();
    } else {
        echo 'could not prepare statement';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- bootstrap icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="../icon/favicon.ico" />
    <!-- My CSS -->
    <link rel="stylesheet" href="css/style.css">

    <title>Admin</title>
</head>

<body>


    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="index.php" class="brand">
            <img src="../img/logo.png" height="80" />
        </a>
        <ul class="side-menu top">
            <li>
                <a href="index.php">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="movies.php">
                    <i class='bx bxs-movie-play'></i>
                    <span class="text">Shows</span>
                </a>
            </li>
            <li class="active">
                <a href="bookings.php">
                    <i class='bx bx-calendar-event'></i>
                    <span class="text">Bookings</span>
                </a>
            </li>
            <li>
                <a href="screens.php">
                    <i class='bx bxs-camera-movie'></i>
                    <span class="text">Theatres</span>
                </a>
            </li>
            <li>
                <a href="users.php">
                    <i class='bx bxs-group'></i>
                    <span class="text">Users</span>
                </a>
            </li>
            <li>
                <a href="feedback.php">
                    <i class='bx bxs-chat'></i>
                    <span class="text">Feedback</span>
                </a>
            </li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="logout.php" class="logout">
                    <i class='bx bx-log-out'></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- SIDEBAR -->

    <!-- CONTENT -->
    <section id="content">

        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Bookings</h1>
                </div>
            </div>

            <div class="table-data">
                <div class="todo">
                    <div class="head">
                        <h3>Details</h3>
                        <!--<a href="add.php?content=bookings"><i class='bx bx-plus'></i></a>-->
                    </div>

                    <!-- Template Table -->
                    <div class="table-wrapper">
                        <table class="fl-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Movie</th>
                                    <th>Theater</th>
                                    <th>Show</th>
                                    <th>Seats</th>
                                    <!--<th>Total Seats</th>-->
                                    <th>Amount</th>
                                    <th>Payment Date</th>
                                    <th>Booking Date</th>
                                    <th>Booking ID</th>
                                    <!--<th>Action</th>-->
                                </tr>
                            </thead>
                            <?php

                            if ($stm = $connect->prepare('SELECT c.id,c.movie,c.booking_date,c.show_time,c.seat,c.totalseat,c.price,c.payment_date,c.custemer_id,u.username,t.theater FROM customers c INNER JOIN user u on c.uid = u.id INNER JOIN theater_show t on c.show_time = t.show')) {
                                $stm->execute();

                                $result = $stm->get_result();


                                if ($result->num_rows > 0) {
                                    while ($record = mysqli_fetch_assoc($result)) {

                                        ?>

                            <tbody>
                                <tr>
                                    <td><?php echo $record['id'];?></td>
                                    <td><?php echo $record['username'];?></td>
                                    <td class="no-ellipsis"><?php echo $record['movie'];?></td>
                                    <td><?php echo $record['theater'];?></td>
                                    <td><?php echo $record['show_time'];?></td>
                                    <td><?php echo $record['seat'];?></td>
                                    <!--<td><?php //echo $record['totalseat'];?></td>-->
                                    <td><?php echo $record['price'];?></td>
                                    <td><?php echo $record['payment_date'];?></td>
                                    <td><?php echo $record['booking_date'];?></td>
                                    <td><?php echo $record['custemer_id'];?></td>
                                    <!-- <td class="no-ellipsis"><a
                                            href="edit.php?id=<?php //echo $record['id']; ?>&content=bookings"><button><i
                                                    class='bx bxs-edit'></i></button></a>
                                        <a href="bookings.php?delete=<?php //echo $record['id']; ?>"><button
                                                class='delete-btn'><i class='bx bxs-trash'></button></a></i>
                                    </td> -->
                                </tr>
                            </tbody>

                            <?php

                                    }
                                } else {
                                    echo '<tbody>
                                            <tr>
                                                <th colspan="5" >No bookings found!</td>
                                            </tr>
                                           </tbody>';
                                }

                                $stm->close();
                            } else {
                                echo 'could not prepare statement';
                            }

                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->

    <footer>
        <?php include('includes/footer.php'); ?>
    </footer>
    <script src="js/admin.js"></script>
</body>

</html>