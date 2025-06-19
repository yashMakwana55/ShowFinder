<?php

if (isset($_POST['screen'])) {
    if ($stm = $connect->prepare('UPDATE theater_show SET `show` = ?, theater = ? WHERE id = ?')) {
        $stm->bind_param('ssi', $_POST['show'], $_POST['screen'], $_GET['id']);
        $stm->execute();

        set_message("Show \"" . $_POST['show'] . "\" has been updated!");
        header('Location: screens.php');
        $stm->close();
        die();
    } else {
        echo 'could not prepare statement';
    }
}

if (isset($_GET['id'])) {
    if ($stm = $connect->prepare('SELECT * FROM theater_show WHERE id = ?')) {
        $stm->bind_param('i', $_GET['id']);
        $stm->execute();

        $result = $stm->get_result();
        $show = $result->fetch_assoc();

        if ($show) {
            ?>

            <div class="title">Edit Screen/Show</div>
            <?php echo isset($invalid) ? "<div class='invalid'>$invalid</div>" : ""; ?>
            <div class="content">
                <form method="post" action="">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Screen</span>
                            <input type="text" id="screen" name="screen" placeholder="Enter a screen number" value="<?php echo $show['theater'] ?>" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Show</span>
                            <input type="text" id="show" name="show" placeholder="Enter a show timing" value="<?php echo $show['show'] ?>" required>
                        </div>
                    </div>
            </div>
            <br>
            <div class="center-container"><input type="submit" value="Add" class="edit-btn"></div>
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