<?php
include('./config.php');
$newid = '';
if (isset($_GET['updateid'])) {
    $newid = $_GET['updateid'];
    $query = "SELECT * FROM `students` WHERE id=$newid";

    $result = mysqli_query($con, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);
    } else {
        echo "Product not found.";
        exit; 
    }
}

if (isset($_POST['updateproduct'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $des = $_POST['des'];
    $image = $_FILES['image']['name'];

    if (!empty($image)) {
        $img_loc = $_FILES['image']['tmp_name'];
        move_uploaded_file($img_loc, 'upload/' . $image);
        $query = "UPDATE `students` SET name='$name', price='$price', des='$des', image='$image' WHERE id='$newid'";
    } else {
        
        $query = "UPDATE `students` SET name='$name', price='$price', des='$des' WHERE id='$newid'";
    }

    $res = mysqli_query($con, $query);
    if ($res) {
        header("Location: home.php");
        exit; 
    } else {
        echo "Error updating product: " . mysqli_error($con);
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>Update Data</h1>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="update.php?updateid=<?php echo $newid; ?>" method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Product</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Name</span>
                            <input type="text" class="form-control" value="<?php echo htmlspecialchars($product['name']); ?>" name="name" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Price</span>
                            <input type="number" class="form-control" value="<?php echo htmlspecialchars($product['price']); ?>" name="price" required>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text">Description</span>
                            <textarea class="form-control" name="des" required><?php echo htmlspecialchars($product['des']); ?></textarea>
                        </div>

                        <div class="input-group mb-3">
                            <label class="input-group-text">Upload Image</label>
                            <input type="file" class="form-control" name="image">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Reset</button>
                        <button type="submit" name="updateproduct" class="btn btn-primary">Update Product</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Automatically open the modal on page load -->
<script>
    window.onload = function () {
        var updateModal = new bootstrap.Modal(document.getElementById('staticBackdrop'));
        updateModal.show();
    };
</script>
</body>
</html>
