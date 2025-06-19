<?php

function secure() {
    if (!isset($_SESSION['id']) ) {
        header('Location: index.php');
        die();
    }
}

function secureU() {
    if (!isset($_SESSION['uid']) ) {
        header('Location: login.php');
        die();
    }
}

function set_message($message) {
    $_SESSION['message'] = $message;
}

function get_message() {
    if(isset($_SESSION['message'])) {
        echo '<h3>' . $_SESSION['message'] . '</h3> <hr>';
        unset($_SESSION['message']);
    }
} 

?>