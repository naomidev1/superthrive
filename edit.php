<?php

include("conn.php");
session_start();

if (!isset($_SESSION['valid'])) {
    header("Location: login.php");
    exit();
}

$id = $_SESSION['id'];
$query = mysqli_query($conn, "SELECT * FROM login WHERE id='$id'");
$user = mysqli_fetch_assoc($query);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "UPDATE login SET username='$username', email='$email', password='$password' WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // $message = "Profile updated successfully!";
        echo "<script>alert('Profile update successfully!'); window.location.href = 'index.php'; </script>";
        // header('Location: index.php');
    } else {
        $message = "Error updating profile: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <style>
        .message {
            color: green;
            text-align: center;
            font-size: 18px;
        }
    </style>
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
            <div class="register">
                <h2>Edit Profile</h2>
                <?php if (!empty($message)): ?>
                    <div class="message"><?php echo $message; ?></div>
                <?php endif; ?>
                <form action="" method="post">
                    <input type="text" name="username" value="<?php echo $user['username']; ?>" required placeholder="Username">
                    <input type="email" name="email" value="<?php echo $user['email']; ?>" required placeholder="Email">
                    <input type="text" name="password" value="<?php echo $user['password']; ?>" required placeholder="password">
                    <button type="submit">Save Changes</button>
                    <!-- <a href="index.php">Go to Homepage</a> -->
                </form>
            </div>
       </div>
   </div>
   
</body>
</html>
