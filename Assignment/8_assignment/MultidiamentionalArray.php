<!-- <?php
// Scenario: Storing information about students and their grades in different subjects

$students = [
    [
        'name' => 'John Doe',
        'grades' => [
            'Math' => 85,
            'Science' => 90,
            'English' => 78
        ]
    ],
    [
        'name' => 'Jane Smith',
        'grades' => [
            'Math' => 92,
            'Science' => 88,
            'English' => 84
        ]
    ],
    [
        'name' => 'Sam Brown',
        'grades' => [
            'Math' => 75,
            'Science' => 80,
            'English' => 70
        ]
    ]
];

// Accessing and displaying the data
foreach ($students as $student) {
    echo "Name: " . $student['name'] . "\n";
    echo "Grades:\n";
    foreach ($student['grades'] as $subject => $grade) {
        echo $subject . ": " . $grade . "\n";
    }
    echo "\n";
}
?> -->


<!-- <?php


    $arr = array(
        "name" => "dipak",
        "age" => "22",
        "course" => "mca"
    );

    foreach($arr as $key => $value){
        echo("key: {$key} and value: {$value} <br>");
    }

    ?> -->

    I
    /*
    Matrix 1:
    1 2 3
    4 5 6
    7 8 9

    Matrix 2:
    9 8 7
    6 5 4
    3 2 1
    */

    $matrix1 = [
        [1, 2, 3],
        [4, 5, 6],
        [7, 8, 9]
    ];

    $matrix2 = [
        [9, 8, 7],
        [6, 5, 4],
        [3, 2, 1]
    ];

    <?php

        $arr1 = array(
            [1, 2, 3],
            [4, 5, 6],
            [7, 8, 9]
        );

        $arr2 = array(
            [9, 8, 7],
            [6, 5, 4],
            [3, 2, 1]
        );

        $twoArrysAdd = array([],[],[]);

        for($i = 0; $i<3;$i++){
            for($j =0; $j<3; $j++){
                $twoArrysAdd[$i][$j] = $arr1[$i][$j] + $arr2[$i][$j];
            }
        };

        echo("<pre>");
        print_r($twoArrysAdd);
        echo("</pre>");


        ?>


