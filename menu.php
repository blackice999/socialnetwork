<?php session_start(); ?>

<div class="row">
    <div class="large-10 columns">
        <ul class="menu">
            <li><a href="index.php">Homepage</a></li>
            <?php

            if (isset($_SESSION['userId'])) {
                echo "<li><a href='logout.php'>Log out</a>";
            }
            ?>
        </ul>
    </div>
</div>