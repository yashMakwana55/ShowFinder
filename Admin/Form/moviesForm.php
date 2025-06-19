<?php

$mime_types = ["image/jpeg", "image/png", "image/webp"];

if (isset($_POST['name'])) {
    if (!in_array($_FILES["poster"]["type"], $mime_types)) {
        $invalid = "invalid file type";
    } else {
        $filename = $_FILES["poster"]["name"];
        $destination = dirname(__DIR__) . "\\image\\" . $filename;
        $poster = $filename;

        if (!move_uploaded_file($_FILES["poster"]["tmp_name"], $destination)) {
            echo "can't move uploaded file" . $_FILES["poster"]["error"];
        } else {
            if ($stm = $connect->prepare('INSERT INTO add_movie (movie_name, directer, release_date, categroy, language, you_tube_link, `show`, `action`, decription, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)')) {
                $stm->bind_param('ssssssssss', $_POST['name'], $_POST['director'], $_POST['release'], $_POST['category'], $_POST['language'], $_POST['link'], $_POST['show'], $_POST['status'], $_POST['description'], $poster);
                $stm->execute();
            
                set_message("A new movie \"" . $_POST['name'] . "\" has been added!");
                header('Location: movies.php');
                $stm->close();
                die();
            } else {
                echo 'could not prepare statement';
            }
        }
    }
}

?>

<div class="title">New Show</div>
<?php echo isset($invalid) ? "<div class='invalid'>$invalid</div>":""; ?>
<div class="content">
    <form method="post" enctype="multipart/form-data">
        <div class="user-details">
            <div class="input-box">
                <span class="details">Name</span>
                <input type="text" name="name" id="name" placeholder="Enter name" required>
            </div>
            <div class="input-box">
                <span class="details">Author</span>
                <input type="text" name="director" id="director" placeholder="Enter director" required>
            </div>
            <div class="input-box">
                <span class="details">Release Date</span>
                <input type="text" name="release" id="release" placeholder="Enter director" required>
            </div>
            <div class="input-box">
                <span class="details">Category</span>
                <input type="text" name="category" id="category" placeholder="Enter category" required>
            </div>
            <div class="input-box">
                <span class="details">Language</span>
                <input type="text" name="language" id="language" placeholder="Enter language" required>
            </div>
            <div class="input-box">
                <span class="details">Shows</span>
                <input type="text" name="show" id="show" placeholder="Enter shows" required>
            </div>
            <div class="input-box">
                <span class="details">Trailer</span>
                <input type="text" name="link" id="link" placeholder="Enter trailer link" required>
            </div>
            <div class="input-box">
                <span class="details">Status</span>
                <input type="text" name="status" id="status" placeholder="Enter status" required>
            </div>
            <div class="input-box">
                <span class="details">Poster</span>
                <input type="file" name="poster" id="poster">
            </div>
            <div class="input-box">
                <span class="details">Description</span>
                <textarea class="textarea" name="description" id="description" placeholder="Enter a short description" required></textarea>
            </div>
        </div>
        <br>
        <div class="center-container"><input type="submit" value="Add" class="edit-btn"></div>
    </form>
</div>