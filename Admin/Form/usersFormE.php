<?php

$mime_types = ["image/jpeg", "image/png", "image/webp"];

if (isset($_POST['username'])) {
    if (!empty($_FILES["picture"]["name"])) {
        if (!in_array($_FILES["picture"]["type"], $mime_types)) {
            $invalid = "invalid file type";
        } else {
            $filename = $_FILES["picture"]["name"];
            $destination = dirname(__DIR__) . "\\image\\" . $filename;
            $picture = $filename;

            if (!move_uploaded_file($_FILES["picture"]["tmp_name"], $destination)) {
                echo "can't move uploaded file" . $_FILES["picture"]["error"];
            } else {
                if ($stm = $connect->prepare('UPDATE user    SET image = ? WHERE id = ?')) {
                    $stm->bind_param('si', $picture, $_GET['id']);
                    $stm->execute();
                    $stm->close();
                } else {
                    echo 'could not prepare picture update statement';
                }
            }
        }
    }//username, email, mobile, city, password, image
    if ($stm = $connect->prepare('UPDATE user SET username = ?, email = ?, mobile = ?, city = ?, password = ?, image = ? WHERE id = ?')) {
                         $stm->bind_param('ssssssi', $_POST['username'], $_POST['email'], $_POST['mobile'], $_POST['city'], $_POST['password'], $picture, $_GET['id']);
                         $stm->execute();
        $stm->close();
    } else {
        echo 'could not prepare update statement';
    }
    set_message("User \"" . $_POST['name'] . "\" has been updated");
    header('Location: users.php');
    die();
}

if (isset($_GET['id'])) {
    if ($stm = $connect->prepare('SELECT * FROM user WHERE id = ?')) {
        $stm->bind_param('i', $_GET['id']);
        $stm->execute();

        $result = $stm->get_result();
        $user = $result->fetch_assoc();

        if ($user) {
?>

<div class="title">Edit user</div>
<?php echo isset($invalid) ? "<div class='invalid'>$invalid</div>" : ""; ?>
<div class="content">
    <form method="post" enctype="multipart/form-data">
        <div class="user-details">
            <div class="input-box">
                <span class="details">Username</span>
                <input type="text" id="username" name="username" placeholder="Enter username" value="<?php echo $user['username'] ?>" required>
            </div>
            <div class="input-box">
                <span class="details">Email</span>
                <input type="email" id="email" name="email" placeholder="Enter email" value="<?php echo $user['email'] ?>" required>
            </div>
            <div class="input-box">
                <span class="details">Mobile</span>
                <input type="text" id="mobile" name="mobile" placeholder="Enter mobile" value="<?php echo $user['mobile'] ?>" minlength="10" required>
            </div>
            <div class="input-box">
                <span class="details">City</span>
                <input type="text" id="city" name="city" placeholder="Enter city" value="<?php echo $user['city'] ?>" required>
            </div>
            <div class="input-box">
                <span class="details">Password</span>
                <input type="password" id="password" name="password" placeholder="Enter password" value="<?php echo $user['password'] ?>" required>
            </div>
            <div class="input-box">
                <span class="details">Picture</span>
                <input type="file" name="picture" id="picture">
            </div>
        </div>
        <br>
        <div class="center-container"><input type="submit" value="Update" class="edit-btn"></div>
    </form>
</div>

<?php

        }
        $stm->close();
    } else {
        echo 'could not prepare statement';
    }
} else {
    echo "No user selected!";
}

?>