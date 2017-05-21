<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
    <link rel="stylesheet" type="text/css" href="css/foundation.css">
</head>
<body>

<?php

include "menu.php";
include "config.php";
include "Model/Mysql.php";


//if(!isset($_SESSION['userId'])) {
?>
<div class="row">
    <div class="large-6 columns float-right">
        <h2> Login</h2>
        <form method="post" action="login.php">
            <label>
                Alias
                <input type="text" name="name">
            </label>
            <label>
                Password
                <input type="password" name="password">
            </label>

            <input type="submit" class="button" value="Login" name="login">
        </form>
    </div>
</div>

<div class="row">
    <div class="large-6 columns">
        <h2> Register</h2>
        <form method="post" action="register.php">
            <label>
                Name
                <input type="text" name="name">
            </label>

            <label>
                Alias
                <input type="text" name="alias">
            </label>

            <label>
                Email
                <input type="text" name="email">
            </label>

            <label>
                Telephone number
                <input type="text" name="telephone">
            </label>

            <label>
                Date of birth
                <input type="text" name="date_of_birth">
            </label>

            <label>
                Address
                <input type="text" name="address">
            </label>

            <label>
                Gender
                <select name="gender">
                    <option value="male">Male</option>
                    <option value="male">Female</option>
                </select>
            </label>

            <label>
                Password
                <input type="password" name="password">
            </label>

            <label>
                Confirm password
                <input type="password" name="confirm_password">
            </label>

            <input type="submit" class="button" value="Register" name="register">
        </form>

    </div>
</div>
</body>
</html>
