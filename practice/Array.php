<!-- associative array -->


<?php
$students = array(
    "amit"=>"Roll 12",
    "partha" => "Roll 01",
    "Mithal"=>"Roll 24",
    "shibu" => "Roll 30"
);


// $key = array_keys($students);
// array_flip($students);
// echo $key;
// foreach( $students as $key => $value){
//     echo $key. ":".$value;
// }




///Multidimention Array///

$teachers =[
    ["name"=>"partha", "addres"=>"ranaghat"],
    ["name"=>"Amit", "addres"=>"Barasat"]
];

foreach($teachers as $value){
    echo $value;
}

?>