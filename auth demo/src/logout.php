<?php
    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        session_unset();
        session_destroy();

        setcookie('remember', '', time() - 60);

        echo json_encode('Success');
    }
?>