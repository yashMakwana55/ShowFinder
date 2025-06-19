<?php

//delete task
if (isset($_GET['delete'])) {
    if ($stm = $connect->prepare('DELETE FROM todo WHERE id = ?')) {
        $stm->bind_param('i', $_GET['delete']);
        $stm->execute();

        set_message("todo has been deleted");
        header('Location: index.php');
        $stm->close();
        die();
    } else {
        echo 'could not prepare statement';
    }
}

?>

<div class="table-data">
    <div class="todo">
        <div class="head">
            <h3>Todos</h3>
            <a href="add.php?content=todo"><i class='bx bx-plus'></i></a>
        </div>
        <ul class="todo-list">
            <?php

            if ($stm = $connect->prepare('SELECT * FROM todo')) {
                $stm->execute();

                $result = $stm->get_result();


                if ($result->num_rows > 0) {
                    while ($record = mysqli_fetch_assoc($result)) {

            ?>

                        <li class="completed">
                            <p><?php echo $record['task'] ?></p>
                            <a href="index.php?delete=<?php echo $record['id']; ?>"><i class='bx bx-trash'></i></a>
                        </li>

            <?php

                    }
                } else {
                    echo '<p>Your to-do list is empty.</p>';
                }

                $stm->close();
            } else {
                echo 'could not prepare statement';
            }

            ?>
        </ul>
    </div>
</div>