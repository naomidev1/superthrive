<?php
include("conn.php");

// Start session
session_start();

// Redirect to login page if user is not logged in
if (!isset($_SESSION['valid'])) {
    header("Location: login.php");
    exit();
}

if (!$conn) {
    echo("Connection failed ! ");
}

$message = ''; // Initialize message variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO login (username, password, email) VALUES ('$username', '$password', '$email')";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        echo "Error: " . $conn->error;
        exit;
    }
    if ($stmt->execute()) {
        $message = "Registration successful!";
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
                <h2>Register</h2>
                <?php if (!empty($message)): ?>
                    <div class="message"><?php echo $message; ?></div>
                <?php endif; ?>
                <form action="register.php" method="post">
                    <input type="text" id="username" name="username" required placeholder="Username" autocomplete="false" >
                    
                    <input type="password" id="password" name="password" required placeholder="Password">
                    
                    <input type="email" id="email" name="email" required placeholder="Email" autocomplete="false" >
                    
                    <button type="submit"> Register </button>
                    <button onclick="location.href= index.php;">Go to Homepage</button>
                </form> 
            </div>
       </div>
   </div>
    
</body>
</html>
