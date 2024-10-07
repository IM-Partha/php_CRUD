<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>


<?php

// class Students{
//     public $name = "partha";
    
//     function abs(){
//         echo "this is a Function";
//     }

// }


// $obj = new Students();

// echo $obj->abs();
// echo $obj->name;


// this method use 

class Employes{
    public $name;
    function person($str){
        return $this->name = $str;
    }
}

$obj2= new Employes();

$obj2->person("nitu");

echo $obj2->name;