<?php

include('includes/conn.php');
include('includes/functions.php');
include('includes/config.php');

if (isset($_SESSION['admin'])) {
  header('Location: index.php');
  die();
}

if (isset($_POST['username'])) {
  if ($stm = $connect->prepare('SELECT * FROM admin WHERE name = ? AND password = ?')) {
    $stm->bind_param('ss', $_POST['username'], $_POST['password']);
    $stm->execute();

    $result = $stm->get_result();
    $admin = $result->fetch_assoc();

    if ($admin) {
      $_SESSION['admin'] = $admin['id'];
      $_SESSION['username'] = $admin['username'];

      //successful login
      header('Location: index.php');
      die();
    } else {
      //invalid credentials
      $errorMessage = "Invalid credentials";
    }
    $stm->close();
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
  <!-- My CSS -->
  <link rel="stylesheet" href="css/style.css">
  <!-- bootstrap css -->
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <!-- favicon -->
  <link rel="icon" type="image/x-icon" href="../icon/favicon.ico" />
  <!-- form css -->
  <link rel="stylesheet" href="css/form.css">


  <title>Admin</title>
</head>

<body>
  <!-- Form -->
  <div class="fbody">
    <div class="container-reg">
    <img src="../img/logo.png" height="80" />
      <div class="title">Admin login</div>
      <?php echo isset($errorMessage) ? "<div class='invalid'>$errorMessage</div>":""; ?>
      <div class="content">
        <form method="post">
          <div class="user-details">
            <div class="input-box">
              <span class="details">Username</span>
              <input type="text" id="username" name="username" placeholder="Enter your username" required>
            </div>
            <div class="input-box"></div>
            <div class="input-box">
              <span class="details">Password</span>
              <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
          </div>
          <div class="text-center"><input type="submit" value="Login" class="loginbtn-a"></div><br>
        </form>
      </div>
    </div>
  </div>
  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>
  <script src="js/admin.js"></script>
</body>

</html>