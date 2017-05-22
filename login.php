<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/foundation.css">
</head>
<body>

</body>
</html>

<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 22.05.2017
 * Time: 16:22
 */


include "menu.php";
include "config.php";
include "Utils/StringUtils.php";
include "Model/Mysql.php";
include "Model/Exceptions/QueryException.php";
include "Model/Exceptions/NoResultsException.php";
include "Model/Exceptions/ConnectionException.php";
include "Model/UtilizatorModel.php";
include "Model/UtilizatorDatePersonaleModel.php";
session_start();

$errors = [];

if (isset($_POST['login'])) {
    $alias = \Utils\StringUtils::sanitizeString($_POST['alias']);
    $password = \Utils\StringUtils::sanitizeString($_POST['password']);

    if (empty($alias) || strlen($alias) < 4) {
        $errors[] = "Alias should be longer than 4 characters";
    }

    if (empty($password) || strlen($password) < 6) {
        $errors[] = "Password should be longer than 6 characters";
    }


    if (!\Model\UtilizatorModel::userExists($alias)) {
        $errors[] = "User does not exist";
    }


    $userModel = \Model\UtilizatorModel::loadByAlias($alias);
    $userDatePersonaleModel = \Model\UtilizatorDatePersonaleModel::loadByUtilizatorId($userModel['id']);

    if (!password_verify($password, $userDatePersonaleModel['parola'])) {
        $errors[] = "Password does not match";
    }

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo $error . "<br />";
        }
    } else {
        $_SESSION['userId'] = $userModel['id'];
        echo "<p> Successfully logged in. Redirecting to homepage in 5 seconds";
        header("Refresh: 5; URL=index.php");
    }
}