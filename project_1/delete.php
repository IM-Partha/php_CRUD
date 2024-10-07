<?php
include('./config.php');
if(isset($_GET['deleteid'])){
    $newid = $_GET['deleteid'];

    $res = "DELETE FROM `students` WHERE id=$newid";
    $result = mysqli_query($con,$res);
    if($result){
        echo "ID Delete Successfully";
        header('location:home.php');
        exit();
    }else{
        echo"Something Error";
    }
    
}
?>