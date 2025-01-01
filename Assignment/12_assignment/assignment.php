<!-- 
12.Write PHP code that will demonstrate the use of following functions of array :
a. sort()
b. rsort()
c. assort()
d. ksort()
e. arsort()
f. krsort() 
-->

<?php

    $arr = array(1, 3, 2, 4, 5, 6, 7, 8, 9, 10);

 
    echo("Original Array: ");
    print_r($arr);
    

    // sort()

    sort($arr);
    echo("<pre>");
    echo("sort() Array: ");
    print_r($arr);
    echo("</pre>");

    // rsort()

    rsort($arr);
    echo("<pre>");
    echo("sort() Array: ");
    print_r($arr);
    echo("</pre>");


    echo("****************************************************************************");

    //Associative Array

    $student = array(
        "name" => "Dipak",
        "age" => "22",
        "course" => "MCA",
        "mobile number" => "8888075197"
    );


    echo("Original Associative Array");
    echo("<pre>");
        print_r($student);
    echo("<pre>");




    echo("****************sort by value******************<br>");
    echo("asort()");

    asort($student);
    echo("<pre>");
    print_r($student);
    echo("<pre>");


    echo("arsort()");

    arsort($student);
    echo("<pre>");
    print_r($student);
    echo("<pre>");


    echo("****************sort by key******************<br>");

    echo("ksort()");

    ksort($student);
    echo("<pre>");
    print_r($student);
    echo("<pre>");


    echo("krsort()");

    krsort($student);
    echo("<pre>");
    print_r($student);
    echo("<pre>");

    





