<?php
    echo 'Hello, world';

    $name = 'Nevena';

    function greeting() {
        // global $name;

        echo "Hello, $name!";
    }

    greeting();

    function sum($a, $d = 5) {
        $b = 6;

        if ($a + $b > 10) {
            $c = 3;
        }

        echo $a + $b + $c;
    }

    sum(5, 8);
    sum(2);
    echo($b);

    $numbers = [1, 8, 9, 5];

    echo '<br/>';

    var_dump($numbers);

    echo '<br/>';

    print_r($numbers);

    echo '<br/>';

    array_unshift($numbers, 8);
    array_shift($numbers);

    array_push($numbers, 4);
    array_pop($numbers);

    array_splice($numbers, 2, 1, 6);

    $numbers[1] = 8;

    foreach($numbers as $number) {
        echo $number;
        echo '<br/>';
    }

    $student = [
        "fisrt_name" => "Nevena",
        "last_name" => "Gadzheva",
        "age" => 27,
        "fn" => 666666
    ];

    var_dump($student);

    echo '<br/>';

    print_r($student);

    echo '<br/>';

    echo $student["last_name"];

    $student["city"] = "Sofia";

    echo '<br/>';

    print_r($student);

    echo '<br/>';

    foreach($student as $key => $value) {
        echo "$key: $value";
        echo '<br/>';
    }
?>