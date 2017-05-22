<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 22.05.2017
 * Time: 16:55
 */

ob_start();
session_start();

echo "<p> Logged out, redirecting to home page in 5 seconds </p>";
//Wait 5 seconds then redirect to home page
header("Refresh: 5; URL=index.php");
session_destroy();
die();

