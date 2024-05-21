<?php
    require_once 'testInputUtility.php';
    require_once 'user.php';

    header('Content-Type', 'application/json');

    $server_errors = [];
    $errors = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $userData = isset($_POST['data']) ? json_decode($_POST['data'], true) : '';

        if ($userData) {
            $username = isset($userData['username']) ? testInput($userData['username']) : '';
            $password = isset($userData['password']) ? testInput($userData['password']) : '';
            $confirmPassword = isset($userData['confirmPassword']) ? testInput($userData['confirmPassword']) : '';
            $email = isset($userData['email']) ? testInput($userData['email']) : '';

            if (strlen($username) < 3) {
                $errors[] = 'Username must be at least 3 symbols';
            }

            if (strlen($password) < 6 || strlen($password) > 10) {
                $errors[] = 'Password must be between 6 and 10 symbols';
            }

            if (strlen($confirmPassword) < 6 || strlen($confirmPassword) > 10) {
                $errors[] = 'Confirm Password must be between 6 and 10 symbols';
            }

            if (strlen($username) >= 3 && 
                strlen($password) >= 6 && strlen($password) <= 10 &&
                strlen($confirmPassword) >= 6 && strlen($confirmPassword) <= 10) {
                
                if ($password !== $confirmPassword) {
                    $errors[] = 'Confirm password must match password';
                } else {
                    $user = new User($username, $password);
                    $userData = $user->exists();

                    if ($userData['success']) {
                        if ($userData['data']) {
                            $errors[] = 'User already exists';
                        } else {
                            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                            $user->createUser($passwordHash, $email);
                        }
                    } else {
                        $server_errors = $userData['error'];
                    }
                }
            }
        } else {
            $errors[] = 'Invalid user data';
        }
    } else {
        $server_errors[] = 'Invalid request';
    }

    if ($server_errors) {
        http_response_code(500);
        echo json_encode($server_errors);
    } else if ($errors) {
        http_response_code(400);
        echo json_encode($errors);
    } else {
        http_response_code(200);
        echo json_encode('Success');
    }
?>