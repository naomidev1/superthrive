<?php
    include("links.php");
?>
<header>
    <div class="logo">
        <?php
            echo "<a href='$url_home' title='Home'><img src='' alt='logo'></a>";
        ?>
    </div>
    <div class="nav">
        <ul>
            <li>
                <?php
                    echo "<a href='$url_home' title='Home'>Home</a>";
                ?>
            </li>
            <li>
                <?php
                    echo "<a href='$url'  title='About'>About Us</a>";
                ?>
            </li>
            <li>
                <?php
                    echo "<a href='$url_project'  title='Project'>Project</a>";
                ?>
            </li>
            <li>
                <?php
                    echo "<a href='$url_gallarey'  title='Gallery'>Gallery</a>";
                ?>
            </li>
            <li>
                <?php
                    echo "<a href='$url_contact '  title='contzct'>Contact</a>";
                ?>
            </li>
        </ul>
    </div>
</header>