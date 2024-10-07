<?php

/// Variable Number of Arguments


function myFun(...$number){
    $temp = 0;
    foreach($number as $value){
        $temp += $value;

       
    }
     return $temp;
};
echo myFun(1,2,3,4);