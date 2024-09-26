<?php

    if (!isset($_SESSION['valid'])) {
        header("Location: login.php");
        exit(); 
    }
    include("conn.php");
    
    $id = mysqli_real_escape_string($conn, $_SESSION['id']);
    $query = mysqli_query($conn, "SELECT * FROM login WHERE id='$id'");
    $username = mysqli_real_escape_string($conn,  $_SESSION['valid']);
?>

<div class="leftBar">
    <div class="logo">
        <button class="dropdown-button"><a href="edit.php"><?php echo( $username[0]);?></a></button>
    </div>
    <div class="list">
        <a href="register.php" id="addUser">Add User</a>
        <a href="edit.php">Edit profile</a>
        <a href="#">Add Project</a>
        <a href="upload_gallarey.php">Add To Gallery</a>
        <a href="edit_gallarey.php">Edits Gallery</a>
        <a href="logout.php">Log Out</a>    
    </div>
</div>