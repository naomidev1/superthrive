<?php
    include("conn.php");
    
    // Start session
    session_start();
    
    if (!$conn) {
        echo("Connection failed ! ");
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $username_email = $_POST["username"];
        $password = $_POST["password"];

        // Check if the input is an email address
        if (filter_var($username_email, FILTER_VALIDATE_EMAIL)) {
            $email = $username_email;
            $username = ""; 
        } else {
            $username = $username_email;
            $email = "";
        }

        // Prepare SQL statement to retrieve user based on username or email
        $sql = "SELECT * FROM login WHERE username = ? OR email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            // Debugging: Print out hashed password
            echo "Hashed password from database: " . $row["password"] . "<br>";
            // Verify password
            if ($password == $row["password"]) {
                $_SESSION['valid'] = $row['username'];
                $_SESSION['password'] = $row['password'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['id'] = $row['id'];
                header('Location: index.php');
                exit();
            } else {
                echo "<div class='message'><p>Wrong password</p></div><br>";
            }
        } else {
            echo "<div class='message'><p>User not found</p></div><br>";
        }
        
        $stmt->close();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .message {
            color: red;
        }
    </style>
</head>
<body>
    <div class="register">
        <h2>Login</h2>
        <form action="login.php" method="post">
                <br><input type="text" id="username" name="username" placeholder="Email" required> 

                <br><input type="password" id="password" name="password" placeholder="Password" required> 
                
                <button type="submit" style="width:30%">Login </button>
        </form>
    </div>
    
</body>
</html>