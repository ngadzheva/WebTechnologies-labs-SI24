<?php
    require_once 'tokenUtility.php';

    header('Content-Type', 'application/json');

    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (isset($_SESSION) && isset($_SESSION['username'])) {
            http_response_code(200);
            echo json_encode('Success');
        } else {
            if (isset($_COOKIE) && isset($_COOKIE['remember'])) {
                $tokenUtility = new TokenUtility();
                $isTokenValid = $tokenUtility->checkToken($_COOKIE['remember']);

                if ($isTokenValid) {
                    // Create session for user
                    http_response_code(200);
                    echo json_encode('Success');
                } else {
                    http_response_code(401);
                    echo json_encode('Unauthorized');
                }
            } else {
                http_response_code(401);
                echo json_encode('Unauthorized');
            }
        }
    }
?>