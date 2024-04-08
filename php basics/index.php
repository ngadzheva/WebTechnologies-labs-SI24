<?php
    require_once 'user.php';
    require_once 'student.php';

    $user = new User('ivgerves');
    $user->set_email('ivgerves@gmail.com');
    echo $user->user_info();
    echo "<br/>";
    echo "<br/>";

    $student = new Student('ivgerves', 'Ivan', 'Ivanov', 6666666);
    $student->student_info();
    echo "<br/>";
    echo $student->user_info();
?>