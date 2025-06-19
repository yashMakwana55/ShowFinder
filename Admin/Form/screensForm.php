<?php

if (isset($_POST['screen'])) {
    if ($stm = $connect->prepare('INSERT INTO theater_show (`show`,theater) VALUES (?, ?)')) {
        $stm->bind_param('ss', $_POST['show'], $_POST['screen'],);
        $stm->execute();

        set_message("A new show \"" . $_POST['show'] . "\" has been added!");
        header('Location: screens.php');
        $stm->close();
        die();
    } else {
        echo 'could not prepare statement';
    }
}

?>

<div class="title">New Screen/Show</div>
<?php echo isset($invalid) ? "<div class='invalid'>$invalid</div>" : ""; ?>
<div class="content">
    <form method="post" action="">
        <div class="user-details">
            <div class="input-box">
                <span class="details">Screen</span>
                <input type="text" id="screen" name="screen" placeholder="Enter a screen number" required>
            </div>
            <div class="input-box">
                <span class="details">Show</span>
                <input type="text" id="show" name="show" placeholder="Enter a show timing" required>
            </div>
        </div>
</div>
<br>
<div class="center-container"><input type="submit" value="Add" class="edit-btn"></div>
</form>
</div>