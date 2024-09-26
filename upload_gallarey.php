<?php

include("conn.php");
session_start();

if (!isset($_SESSION['valid'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $userId = $_SESSION['id']; // Get the user ID from session

    if ($_FILES["image"]["error"] === 4) {
        echo "<script>alert('Image Does Not Exist');</script>";
    } else {
        $fileName = $_FILES['image']['name'];
        $fileSize = $_FILES['image']['size'];
        $tmpName  = $_FILES['image']['tmp_name'];

        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $fileName);
        $imageExtension = strtolower(end($imageExtension));

        if (!in_array($imageExtension, $validImageExtension)) {
            echo "<script>alert('Invalid Image Extension');</script>";
        } else {
            $newImageName = uniqid() . '.' . $imageExtension;
            $targetPath = 'upload-image/' . $newImageName;

            if (move_uploaded_file($tmpName, $targetPath)) {
                $query = "INSERT INTO gallarey (name, image, description, user_id) VALUES ('$name', '$newImageName', '$description', $userId)";
                mysqli_query($conn, $query);

                echo "<script>alert('Image Added Successfully'); window.location.href = 'edit_gallarey.php';</script>";
            } else {
                echo "<script>alert('Failed to upload image');</script>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add To Gallery</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="mainBody">
       <div class="left">
            <?php
                include_once('leftBar.php');
            ?>
       </div>
       <div class="right">
            <div class="Addgall">
                <h2>Add To Gallery</h2>
                <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
                   <div class="form">
                        <div class="addright">
                            <input type="text" name="name" id="name" required placeholder="Image Name:">
                            <textarea type="text" name="description" id="description" required placeholder="Image Description"></textarea>
                        </div>
                        <div class="addleft">
                            <label for="image">Select Image </label>
                            <input type="file" name="image" id="image" placeholder="Image" accept=".jpg, .png, .jpeg">
                        </div>
                   </div>

                    <button type="submit" name="submit">Upload</button> <a href="../gallarey.php">Go To Gallery</a> 
                </form>
                
            </div>
            
       </div>
   </div>
  
</body>
</html>
