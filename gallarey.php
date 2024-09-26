<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="constant/style.css">
    <style>
        /* Styling for the enlarged image */
        .enlarged-image {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1;
            width: 80%; /* Initial width when enlarged */
            max-height: 80vh; /* Maximum height to fit within viewport */
            border: 5px solid white; /* Example border */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); /* Example box shadow */
            background-color: rgba(0, 0, 0, 0.8); /* Example background color */
            display: none; /* Initially hidden */
        }
        .enlarged-image img {
            width: 100%; /* Ensure image fills the container */
            height: auto;
            display: block;
        }
        .icon {
            position: absolute;
            top: 10px;
            color: white;
            cursor: pointer;
            z-index: 1;
        }
        .icon.cancel {
            right: 10px;
        }
        .icon.previous {
            top:50%;
            left: 10px;
        }
        .icon.next {
            top:50%;
            right: 10px;
        }
    </style>
    <title>Gallarey</title>
</head>
<body>
    <header>
        <?php include_once("constant/header.php") ?>
    </header>

    <div class="gallarey-slideshow">
        <?php
            include_once("admin/conn.php");
            $query = "SELECT * FROM gallarey";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $imagePath = "admin/upload-image/" . $row['image'];
                    $description = $row['description'];
                    echo "<div class='gallery-item'>";
                    echo "<img src='$imagePath' alt='$description' onclick='showEnlargedImage(this.src)'>";
                    echo "<div class='description'>$description</div>";
                    echo "</div>";
                }
            } else {
                echo "No images found.";
            }
        ?>
    </div>

    <!-- Enlarged image container -->
    <div class="enlarged-image" onclick="hideEnlargedImage()">
        <div class="icon cancel" onclick="hideEnlargedImage()">X</div>
        <div class="icon previous" onclick="showPreviousImage()">Previous</div>
        <div class="icon next" onclick="showNextImage()">Next</div>
        <img id="enlarged-img" src="" alt="Enlarged Image">
    </div>

    <footer>
        <?php include_once("constant/footer.php") ?>
    </footer>

    <script>
        var images = [];
        var currentIndex = 0;

        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "images.push('admin/upload-image/" . $row['image'] . "');";
            }
        }
        ?>

        function showEnlargedImage(src) {
            var enlargedImage = document.querySelector('.enlarged-image');
            var enlargedImg = document.getElementById('enlarged-img');
            currentIndex = images.indexOf(src);
            enlargedImg.src = src; // Set the source of enlarged image
            enlargedImage.style.display = 'block'; // Show the enlarged image container
        }

        function hideEnlargedImage() {
            var enlargedImage = document.querySelector('.enlarged-image');
            enlargedImage.style.display = 'none'; // Hide the enlarged image container
        }

        function showPreviousImage() {
            currentIndex--;
            if (currentIndex < 0) {
                currentIndex = images.length - 1;
            }
            document.getElementById('enlarged-img').src = images[currentIndex];
        }

        function showNextImage() {
            currentIndex++;
            if (currentIndex >= images.length) {
                currentIndex = 0;
            }
            document.getElementById('enlarged-img').src = images[currentIndex];
        }
    </script>
</body>
</html>