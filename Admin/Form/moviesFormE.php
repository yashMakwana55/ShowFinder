<?php

$mime_types = ["image/jpeg", "image/png", "image/webp"];

if (isset($_POST['name'])) {
    if (!empty($_FILES["poster"]["name"])) {
        if (!in_array($_FILES["poster"]["type"], $mime_types)) {
            $invalid = "invalid file type";
        } else {
            $filename = $_FILES["poster"]["name"];
            $destination = dirname(__DIR__) . "\\image\\" . $filename;
            $poster = $filename;

            if (!move_uploaded_file($_FILES["poster"]["tmp_name"], $destination)) {
                echo "can't move uploaded file" . $_FILES["poster"]["error"];
            } else {
                if ($stm = $connect->prepare('UPDATE add_movie SET image = ? WHERE id = ?')) {
                    $stm->bind_param('si', $poster, $_GET['id']);
                    $stm->execute();
                    $stm->close();
                } else {
                    echo 'could not prepare poster update statement';
                }
            }
        }
    }
    if ($stm = $connect->prepare('UPDATE add_movie SET movie_name = ?, directer = ?, release_date = ?, categroy = ?, language = ?, you_tube_link = ?, `show` = ?, `action` = ?, decription = ?, image = ? WHERE id = ?')) {
                         $stm->bind_param('ssssssssssi', $_POST['name'], $_POST['director'], $_POST['release'], $_POST['category'], $_POST['language'], $_POST['link'], $_POST['show'], $_POST['status'], $_POST['description'], $poster, $_GET['id']);
                         $stm->execute();
        $stm->close();
    } else {
        echo 'could not prepare update statement';
    }
    set_message("Video \"" . $_POST['name'] . "\" has been updated");
    header('Location: movies.php');
    die();
}

if (isset($_GET['id'])) {
    if ($stm = $connect->prepare('SELECT * FROM add_movie WHERE id = ?')) {
        $stm->bind_param('i', $_GET['id']);
        $stm->execute();

        $result = $stm->get_result();
        $movies = $result->fetch_assoc();

        if ($movies) {
?>

<div class="title">Edit Show</div>
<?php echo isset($invalid) ? "<div class='invalid'>$invalid</div>" : ""; ?>
<div class="content">
    <form method="post" enctype="multipart/form-data">
        <div class="user-details">
            <div class="input-box">
                <span class="details">Name</span>
                <input type="text" name="name" id="name" placeholder="Enter name" value="<?php echo $movies['movie_name'] ?>" required>
            </div>
            <div class="input-box">
                <span class="details">Author</span>
                <input type="text" name="director" id="director" placeholder="Enter director" value="<?php echo $movies['directer'] ?>" required>
            </div>
            <div class="input-box">
                <span class="details">Release Date</span>
                <input type="text" name="release" id="release" placeholder="Enter director" value="<?php echo $movies['release_date'] ?>" required>
            </div>
            <div class="input-box">
                <span class="details">Category</span>
                <input type="text" name="category" id="category" placeholder="Enter category" value="<?php echo $movies['categroy'] ?>" required>
            </div>
            <div class="input-box">
                <span class="details">Language</span>
                <input type="text" name="language" id="language" placeholder="Enter language" value="<?php echo $movies['language'] ?>" required>
            </div>
            <div class="input-box">
                <span class="details">Shows</span>
                <input type="text" name="show" id="show" placeholder="Enter shows" value="<?php echo $movies['show'] ?>" required>
            </div>
            <div class="input-box">
                <span class="details">Trailer</span>
                <input type="text" name="link" id="link" placeholder="Enter trailer link" value="<?php echo $movies['you_tube_link'] ?>" required>
            </div>
            <div class="input-box">
                <span class="details">Status</span>
                <input type="text" name="status" id="status" placeholder="Enter status" value="<?php echo $movies['action'] ?>" required>
            </div>
            <div class="input-box">
                <span class="details">Poster</span>
                <input type="file" name="poster" id="poster" value="<?php echo $movies['image'] ?>">
                <?php //echo "current poster - " . $movies['image']; ?>
            </div>
            <div class="input-box">
                <span class="details">Description</span>
                <textarea class="textarea" name="description" id="description" placeholder="Enter a short description" required><?php echo $movies['decription'] ?></textarea>
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