<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="constant/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header>
        <?php
            include_once("constant/header.php")
        ?>
    </header>
    <div class="one-section v">
        <h2>Contact Us</h2>
        <p>For more information about our services, get in touch with us and we’ll respond to you as soon as possible.</p>
    </div>
    <div class="dot">
        <div class="form">
            <div class="text">
                <h2>Get in touch with us & send us message today!</h2>
                <div class="mail details">
                    <img src="media\email-2.png" alt="">
                    <a href="mailto:ourcompany@construction.com">ourcompany@construction.com</a>
                </div>
                <div class="location details">
                    <img src="media\location-pin-1.png" alt="">
                    <a href="https://www.google.com/maps/place/Lagos+Airport+Hotel+Ikeja/@6.6062985,3.3441543,17z/data=!3m1!4b1!4m9!3m8!1s0x103b922d922f6b59:0xe1ef546f9143bf71!5m2!4m1!1i2!8m2!3d6.6062932!4d3.3467292!16s%2Fg%2F1tg0h0tx?entry=ttu" target="_blank">
                        111 Obafemi Awolowo Way, Ikeja, 101233, Lagos
                    </a>
                </div>
                <div class="call details">
                    <i aria-hidden="true" class="fas fa-phone"></i>
                    <a href="tel:+">(+234) 8149570768</a>
                </div>
            </div>
            <div class="formss">
                <form action="">
                    <input type="text" name="" id="" placeholder="Name">
                    <input type="email" name="" id="" placeholder="Email">
                    <textarea name="" id="" cols="30" rows="10" placeholder="Message" ></textarea>
                    <button>Send Message</button>
                </form>
            </div>
        </div>
        <div class="maps">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.351614868313!2d3.3488660740464318!3d6.603153322234548!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b93947259aab5%3A0x81fa6fedfbdce3a!2sAptech%20Computer%20Education!5e0!3m2!1sen!2sng!4v1711801910680!5m2!1sen!2sng" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
    <footer>
        <?php
            include_once("constant/footer.php")
        ?>
    </footer>
</body>
</html>