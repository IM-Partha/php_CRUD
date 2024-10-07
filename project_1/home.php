
<?php

include('./config.php')
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container bg-dark text-light p-3 rounded my-4">
        <div class="d-flex align-items-center justify-content-between">
            <h2>Product Store</h2>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Add Product
            </button>
        </div>


    </div>




    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="" method="post" enctype="multipart/form-data">

                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Name</span>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Price</span>
                            <input type="number" class="form-control" name="price" required>
                        </div>


                        <div class="input-group">
                            <span class="input-group-text">Desciption</span>
                            <textarea class="form-control" required name="des"></textarea>
                        </div>

                        <div class="input-group mb-3">
                            <label class="input-group-text">Upload</label>
                            <input type="file" class="form-control" name="image" required>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Reset</button>
                        <button type="submit" name="addproduct" class="btn btn-primary">Add</button>
                    </div>
                </div>
            </form>
        </div>    
    </div >

    <table class="table container p-3 my-5 border shadow">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Describtion</th>
      <th scope="col">Image</th>
      <th scope="col">Update</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $res = "SELECT * FROM `students`";
    $result = mysqli_query($con,$res);
    if($result){
        while($row= mysqli_fetch_assoc($result)){
            $id = $row['id'];
            $name = $row['name'];
            $price = $row['price'];
            $des = $row['des'];
            $image = $row['image'];

            echo '<tr>
      <td>'.$id.'</td>
      <td>'.$name.'</td>
       <td>'.$price.'</td>
        <td>'.$des.'</td>
         <td><img style="width: 100px; height: 50px;" src="upload/'.$image.'"></td>
          <td><button class="btn btn-success"><a href="update.php?updateid='.$id.'">Update<a/></button></td>
          <td><button class="btn btn-danger"><a href="delete.php?deleteid='.$id.'">Delete<a/></button></td>
    </tr>';
        }
    }
    
    ?>
    
  </tbody>
</table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>


<?php


include('./config.php');
if(isset($_POST['addproduct'])){
    $name= $_POST['name'];
    $price = $_POST['price'];
    $des = $_POST['des'];
    $image = $_FILES['image']['name'];
    $img_loc = $_FILES['image']['tmp_name'];

    move_uploaded_file($img_loc, 'upload/'.$image);

    $qury = "INSERT INTO `students` (name, price, des, image) VALUES ('$name', $price, '$des', '$image')";


    mysqli_query($con, $qury);
    header('location:home.php');
}



?>