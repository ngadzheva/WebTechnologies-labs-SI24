<?php
    class User {
        private $username;
        private $password;
        private $email;

        public function __construct($username) {
            $this->set_username($username);
        }

        public function get_username() {
            return $this->username;
        }

        public function set_username($username) {
            $this->username = $username;
        }

        public function get_password() {
            return $this->password;
        }

        public function set_password($password) {
            $this->password = $password;
        } 

        public function get_email() {
            return $this->email;
        }

        public function set_email($email) {
            $this->email = $email;
        } 

        public function user_info() {
            return "$this->username: $this->email";
        }
    }
?>