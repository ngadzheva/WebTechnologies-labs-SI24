<?php
    require_once "db.php";

    class User {
        private $username;
        private $password;
        private $email;
        private $userId;

        private $db;

        public function __construct($username, $password) {
            $this->username = $username;
            $this->password = $password;

            $this->db = new Database();
        }

        public function getUsername() {
            return $this->username;
        }

        public function getEmail() {
            return $this->email;
        }

        public function getUserId() {
            return $this->userId;
        }

        public function exists() {
            $userResult = $this->db->selectUserQuery(['username' => $this->username]);

            if ($userResult) {
                $user = $userResult->fetch();

                return ['success' => true, 'data' => $user];
            }

            return $userResult;
        }

        public function isValid($password, $passwordHash) {
        }

        public function createUser($passwordHash, $email) {
            $result = $this->db->insertUserQuery(['username' => $this->username, 'password' => $passwordHash, 'email' => $email]);
        }
    }
?>