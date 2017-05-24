<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 24.05.2017
 * Time: 14:41
 */

include "config.php";
session_start();
$errors = [];
if (isset($_POST['add_friend'])) {
    $email = \Utils\StringUtils::sanitizeString($_POST['email']);

    if (empty($email)) {
        $errors[] = "Email is not valid";
    }

    if (!\Model\UtilizatorEmailModel::loadByEmail($email)) {
        $errors[] = "User does not exist";
    }
    $friendModel = \Model\UtilizatorEmailModel::loadByEmail($email);

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo $error;
        }
    } else {
        \Model\PrieteniModel::create($_SESSION['userId'], $friendModel['id_utilizator']);
        header("Location: profile.php");
    }
}