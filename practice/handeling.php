
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Select Course</h1>
    <form action="#" method="post">
        <label>Course</label><br>
        <input type="radio" value="BCA" name="course">BCA <br>
        <input type="radio" value="MCA" name="course">MCA   <br>
        <input type="radio" value="BBA" name="course">BBA<br>
        <input type="radio" value="MBA" name="course">MBA <br>
        <input type="submit" name="submit">
    </form>
</body>
</html>


<?php
if(isset($_POST['submit'])){
    if(isset($_POST['course'])){
        
        $course = $_POST['course'];
    if($course ==='BCA'){
        echo "You Select BCA course";
    }
    elseif($course === 'MCA'){
        echo "You Select MCA course";
    }
    elseif($course === 'BBA'){
        echo "You Select BBA course";
    }
    elseif($course === 'MBA'){
        echo "You Select MBA course";
    }
    }
    
}
?>