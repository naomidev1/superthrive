<?php
include("conn.php");
session_start();

if (!isset($_SESSION['valid'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['edit'])) {
    // Edit image details
    $editId = $_GET['edit'];
    $query = "SELECT * FROM gallarey WHERE id = $editId";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $description = $_POST['description'];

        $query = "UPDATE gallarey SET name='$name', description='$description' WHERE id=$editId";
        mysqli_query($conn, $query);

        header("Location: edit_gallarey.php");
        exit();
    }
}

if (isset($_GET['delete'])) {
    // Delete image
    $deleteId = $_GET['delete'];
    $query = "DELETE FROM gallarey WHERE id = $deleteId";
    mysqli_query($conn, $query);

    header("Location: edit_gallarey.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit / Delete Images</title>
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
            <div class="editDelete">
                <h2>Edit / Delete Images</h2>
                <?php if (isset($editId)): ?>
                    <form action="" method="post">
                        <input type="text" name="name" value="<?php echo $row['name']; ?>" required placeholder="Image Name:">
                        <textarea name="description" required placeholder="Image Description"><?php echo $row['description']; ?></textarea>
                        <button type="submit" name="update">Update</button>
                    </form>
                <?php endif; ?>

                <table>
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM gallarey";
                        $result = mysqli_query($conn, $query);

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td><img src='upload-image/{$row['image']}' width='100'></td>";
                            echo "<td>{$row['name']}</td>";
                            echo "<td>{$row['description']}</td>";
                            echo "<td><a href='edit_gallarey.php?edit={$row['id']}'>Edit</a> | <a href='edit_gallarey.php?delete={$row['id']}' onclick=\"return confirm('Are you sure you want to delete this image?')\">Delete</a></td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
       </div>
   </div>
</body>
</html>
