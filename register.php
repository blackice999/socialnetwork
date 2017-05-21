<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 21.05.2017
 * Time: 19:42
 */


include "Utils/StringUtils.php";
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
}