<?php
    require_once 'user.php';

    class Student extends User {
        private $fn;
        private $first_name;
        private $last_name;

        public function __construct($username, $first_name, $last_name, $fn) {
            parent::__construct($username);

            $this->first_name = $first_name;
            $this->last_name = $last_name;
            $this->fn = $fn;
        }

        public function student_info() {
            echo parent::user_info();
            echo "<br/>";
            echo "$this->fn: $this->first_name $this->last_name";
        }
    }
?>