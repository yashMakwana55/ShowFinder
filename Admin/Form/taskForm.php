<?php

if (isset($_POST['task'])) {
    if ($stm = $connect->prepare('INSERT INTO todo (task) VALUES (?)')) {
        $stm->bind_param('s', $_POST['task']);
        $stm->execute();

        set_message("A new task \"" . $_POST['task'] . "\" has been added!");
        header('Location: index.php');
        $stm->close();
        die();
    } else {
        echo 'could not prepare statement';
    }
}

?>

<div class="title">New Task</div>
<div class="content">
    <form method="post" action="">
        <div class="user-details">
            <div class="input-box">
                <span class="details">Task</span>
                <input type="text" id="task" name="task" placeholder="Enter a task" required>
            </div>
        </div>
</div>
<br>
<div class="center-container"><input type="submit" value="Add" class="edit-btn"></div>
</form>
</div>