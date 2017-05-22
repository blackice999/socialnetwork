<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="css/foundation.css">
</head>
<body>

</body>
</html>

<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 21.05.2017
 * Time: 19:42
 */

include "menu.php";
include "config.php";
include "Utils/StringUtils.php";
include "Model/Exceptions/QueryException.php";
include "Model/Exceptions/NoResultsException.php";
include "Model/Exceptions/ConnectionException.php";
include "Model/UtilizatorModel.php";
include "Model/UtilizatorEmailModel.php";
include "Model/UtilizatorNrTelefonModel.php";
include "Model/UtilizatorDatePersonaleModel.php";
include "Model/Mysql.php";

$errors = [];

if (isset($_POST['register'])) {
    $name = \Utils\StringUtils::sanitizeString($_POST['name']);
    $alias = \Utils\StringUtils::sanitizeString($_POST['alias']);
    $email = \Utils\StringUtils::sanitizeString($_POST['email']);
    $telephoneNumber = \Utils\StringUtils::sanitizeString($_POST['telephone']);
    $dateOfBirth = \Utils\StringUtils::sanitizeString($_POST['date_of_birth']);
    $address = \Utils\StringUtils::sanitizeString($_POST['address']);
    $gender = \Utils\StringUtils::sanitizeString($_POST['gender']);
    $password = \Utils\StringUtils::sanitizeString($_POST['password']);

    $passwordConfirm = \Utils\StringUtils::sanitizeString($_POST['confirm_password']);

    if (empty($name) || strlen($name) < 6) {
        $errors[] = "Name should be longer than 6 characters";
    }

    if (empty($alias) || strlen($alias) < 4) {
        $errors[] = "Alias should be longer than 4 characters";
    }
    if (empty($email)) {
        $errors[] = "Email is not valid";
    }

    if (empty($telephoneNumber) || strlen($telephoneNumber) < 9) {
        $errors[] = "Telephone number is not valid";
    }

    if (empty($address)) {
        $errors[] = "Address is not valid";

    }
    if ($password !== $passwordConfirm) {
        $errors[] = "Password's do not match";
    }

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo $error . "<br />";
        }
    } else {
        $password = \Utils\StringUtils::encryptPassword($password);
        $userId = \Model\UtilizatorModel::create($name, $alias, $dateOfBirth, $address);
        \Model\UtilizatorEmailModel::create($userId, $email);
        \Model\UtilizatorNrTelefonModel::create($userId, $telephoneNumber);
        \Model\UtilizatorDatePersonaleModel::create($userId, $gender, $password);

        echo "<p> Inserted user </p>";
    }

}
?>

<a href="index.php">Go back</a>
