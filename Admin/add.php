<?php

include('includes/conn.php');
include('includes/functions.php');
include('includes/config.php');

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
    <link rel="icon" type="image/x-icon" href="../icon/faviconAdmin.png" />
    <!-- My CSS -->
    <link rel="stylesheet" href="css/style.css">

    <title>Admin</title>
</head>

<body>


    <!-- SIDEBAR -->
    <section id="sidebar" class="hide">
        <a href="index.php" class="brand">
            <i class='bx bxs-home'></i>
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
                <i class='bx bxs-movie-play' ></i>
                    <span class="text">Movies</span>
                </a>
            </li>
            <li>
                <a href="bookings.php">
                <i class='bx bx-calendar-event'></i>
                    <span class="text">Bookings</span>
                </a>
            </li>
            <li>
                <a href="screens.php">
                <i class='bx bxs-camera-movie' ></i>
                    <span class="text">Screens</span>
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
                    <?php
                    $contentType = $_GET['content'] ?? '';
                    switch ($contentType) {
                        case 'users':
                            echo "<h1>Add User</h1>";
                            break;
                        case 'movies':
                            echo "<h1>Add Movie</h1>";
                            break;
                        case 'bookings':
                            echo "<h1>Add Booking</h1>";
                            break;
                        case 'screens':
                            echo "<h1>Add Screen</h1>";
                            break;
                        case 'todo':
                            echo "<h1>Add Task</h1>";
                            break;
                        default:
                            echo "<div class=title>Invalid content type</div></div>";
                    }
                    ?>
                </div>
            </div>

            <div class="table-data">
                <div class="todo">
                    <!-- edit form -->
                    <div class="fbody">
                        <div class="container-reg">
                            <?php
                            $contentType = $_GET['content'] ?? '';
                            switch ($contentType) {
                                case 'users':
                                    include 'forms/usersForm.php'; // Include the user form
                                    break;
                                case 'movies':
                                    include 'forms/moviesForm.php'; // Include the post form
                                    break;
                                case 'bookings':
                                    include 'forms/bookingsForm.php'; // Include the post form
                                    break;
                                case 'screens':
                                    include 'forms/screensForm.php'; // Include the post form
                                    break;
                                case 'todo':
                                    include 'forms/taskForm.php'; // Include the post form
                                    break;
                                default:
                                    echo "<div class=title>Invalid content type</div></div>";
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
    <script src="js/admin.js"></script>
</body>

</html>