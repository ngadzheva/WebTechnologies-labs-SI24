<?php
    require_once 'testInputUtility.php';
    require_once 'tokenUtility.php';
    require_once 'user.php';

    header('Content-Type', 'application/json');

    session_start();

    $server_errors = [];
    $errors = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $userData = isset($_POST['data']) ? json_decode($_POST['data'], true) : '';

        if ($userData) {
            $username = isset($userData['username']) ? testInput($userData['username']) : '';
            $password = isset($userData['password']) ? testInput($userData['password']) : '';
            $remember = isset($userData['remember']) ? $userData['remember'] : false;

            if ($username && $password) {
                $user = new User($username, $password);
                $userData = $user->exists();

                if ($userData["success"] && $userData["data"]) {
                    $isPasswordValid = $user->isValid($password, $userData["data"]["password"]);

                    if ($isPasswordValid) {
                        $_SESSION['username'] = $username;
                        $_SESSION['email'] = $userData['data']['email'];

                        if ($remember) {
                            $token = bin2hex(random_bytes(8));
                            $expires = time() + 24 * 60 * 60 * 30;
                            $tokenUtility = new TokenUtility();
                            $tokenResult = $tokenUtility->createToken($token, $userData['data']['id'], $expires);

                            if ($tokenResult['success']) {
                                setcookie('remember', $token, $expires);
                            }
                        }
                    } else {
                        $errors[] = "Username or password is incorrect";
                    }
                } else {
                    $errors[] = "Username or password is incorrect";
                }
            } else {
                $errors[] = "Username and password are required";
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