<?php

$mime_types = ["image/jpeg", "image/png", "image/webp"];

if (isset($_POST['username'])) {
    if (!in_array($_FILES["picture"]["type"], $mime_types)) {
        $invalid = "invalid file type";
    } else {
        $filename = $_FILES["picture"]["name"];
        $destination = dirname(__DIR__) . "\\image\\" . $filename;
        $picture = $filename;

        if (!move_uploaded_file($_FILES["picture"]["tmp_name"], $destination)) {
            echo "can't move uploaded file" . $_FILES["picture"]["error"];
        } else {
            if ($stm = $connect->prepare('INSERT INTO user (username, email, mobile, city, password, image) VALUES (?, ?, ?, ?, ?, ?)')) {
                $stm->bind_param('ssssss', $_POST['username'], $_POST['email'], $_POST['mobile'], $_POST['city'], $_POST['password'], $picture);
                try {
                    $stm->execute();
                    set_message("A new user \"" . $_POST['fname'] . "\" has been added!");
                    header('Location: users.php');
                } catch (mysqli_sql_exception $e) {
                    if ($e->getCode() === 1062) { // Duplicate entry detected
                        $invalid = "Email already registered!";
                    } else { // Handle other exceptions
                        echo "An error occurred: " . $e->getMessage();
                    }
                }

            } else {
                echo 'could not prepare statement';
            }
        }
    }
}

?>

<div class="title">New User</div>
<?php echo isset($invalid) ? "<div class='invalid'>$invalid</div>" : ""; ?>
<div class="content">
    <form method="post" action="" enctype="multipart/form-data">
        <div class="user-details">
            <div class="input-box">
                <span class="details">Username</span>
                <input type="text" id="username" name="username" placeholder="Enter username" required>
            </div>
            <div class="input-box">
                <span class="details">Email</span>
                <input type="email" id="email" name="email" placeholder="Enter email" required>
            </div>
            <div class="input-box">
                <span class="details">Mobile</span>
                <input type="text" id="mobile" name="mobile" placeholder="Enter mobile" minlength="10" required>
            </div>
            <div class="input-box">
                <span class="details">City</span>
                <input type="text" id="city" name="city" placeholder="Enter city" required>
            </div>
            <div class="input-box">
                <span class="details">Password</span>
                <input type="password" id="password" name="password" placeholder="Enter password" required>
            </div>
            <div class="input-box">
                <span class="details">Picture</span>
                <input type="file" name="picture" id="picture">
            </div>
        </div>
        <!-- <div class="gender-details">
            <input type="radio" name="gender" id="dot-1" value="male">
            <input type="radio" name="gender" id="dot-2" value="female">
            <input type="radio" name="gender" id="dot-3" value="other">
            <span class="gender-title">Gender</span>
            <div class="category">
                <label for="dot-1">
                    <span class="dot one"></span>
                    <span class="gender">Male</span>
                </label>
                <label for="dot-2">
                    <span class="dot two"></span>
                    <span class="gender">Female</span>
                </label>
                <label for="dot-3">
                    <span class="dot three"></span>
                    <span class="gender">Other</span>
                </label>
            </div>
        </div> -->
</div>
<br>
<div class="center-container"><input type="submit" value="Add" class="edit-btn"></div>
</form>
</div>