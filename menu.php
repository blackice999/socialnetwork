<?php session_start(); ?>

<div class="row">
    <div class="large-10 columns">
        <ul class="menu">
            <li><a href="index.php">Homepage</a></li>
            <?php

            if (isset($_SESSION['userId'])) {
                echo "<li><a href='logout.php'>Log out</a>";

                $user = \Model\UtilizatorModel::loadById($_SESSION['userId']);
                $userName = $user['nume'];
                echo "<li><a href='edit_user.php'>" . $userName . "</a></li>";
            }
            ?>
        </ul>
    </div>
</div>