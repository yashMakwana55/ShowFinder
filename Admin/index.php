<?php

include('includes/conn.php');
include('includes/config.php');
include('includes/functions.php');

if (!isset($_SESSION['admin']) ) {
	header('Location: login.php');
	die();
}

//get total bookings
$bookings = "SELECT COUNT(*) AS record_count FROM customers";

$result_s = mysqli_query($connect, $bookings);

if ($result_s) {
    $count = mysqli_fetch_assoc($result_s);
    $recordCount = $count['record_count'];
} else {
    $recordCount = "error"; // Default value in case of query error
}

//get total users
$revenue = "SELECT SUM(price) AS total_price FROM customers";

$result_a = mysqli_query($connect, $revenue);

if ($result_a) {
    $count_a = mysqli_fetch_assoc($result_a);
    $total_price = $count_a['total_price'];
} else {
    $total_price = "error"; // Default value in case of query error
}

//get running movies
$movies = "SELECT COUNT(*) AS running_count FROM add_movie WHERE action = 'running'";

$result_m = mysqli_query($connect, $movies);

if ($result_m) {
    $count_m = mysqli_fetch_assoc($result_m);
    $runningMovies = $count_m['running_count'];
} else {
    $runningMovies = "error"; // Default value in case of query error
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
	<link rel="stylesheet"
  		href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"
	/>
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
			<li class="active">
				<a href="index.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="movies.php">
					<i class='bx bxs-movie-play' ></i>
					<span class="text">Shows</span>
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
					<span class="text">Theatres</span>
				</a>
			</li>
			<li>
				<a href="users.php">
					<i class='bx bxs-group' ></i>
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
					<h1>Dashboard</h1>
				</div>
			</div>

			<ul class="box-info">
				<li>
					<i class='bx bxs-user-plus'></i>
					<span class="text">
						<h3><?php echo $recordCount; mysqli_free_result($result_s); ?></h3>
						<p>Total Bookings</p>
					</span>
				</li>
				<li>
					<i class='bx bx-rupee' ></i>
					<span class="text">
						<h3><?php echo $total_price; mysqli_free_result($result_a); ?></h3>
						<p>Revenue Generated</p>
					</span>
				</li>
				<li>
                <i class='bx bx-movie-play' ></i>
					<span class="text">
						<h3><?php echo $runningMovies; mysqli_free_result($result_m); ?></h3>
						<p>Shows Running</p>
					</span>
                </li>
				
			</ul>

			<!-- to-do list -->
			<?php include('todo.php') ?>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	
	<footer>
		<?php include('includes/footer.php'); ?>
	</footer>
	<script src="js/admin.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>
</html>