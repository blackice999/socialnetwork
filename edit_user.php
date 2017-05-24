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
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 24.05.2017
 * Time: 13:58
 */

include "config.php";
include "menu.php";

$userModel = \Model\UtilizatorModel::loadById($_SESSION['userId']);
$userTelephoneNumberModel = \Model\UtilizatorNrTelefonModel::loadByUserId($userModel['id']);

$errors = [];
if (isset($_POST['edit'])) {
    $alias = \Utils\StringUtils::sanitizeString($_POST['alias']);
    $telephoneNumber = \Utils\StringUtils::sanitizeString($_POST['telephone']);
    $dateOfBirth = \Utils\StringUtils::sanitizeString($_POST['date_of_birth']);
    $address = \Utils\StringUtils::sanitizeString($_POST['address']);

    if (empty($alias) || strlen($alias) < 4) {
        $errors[] = "Alias should be longer than 4 characters";
    }

    if (empty($telephoneNumber) || strlen($telephoneNumber) < 9) {
        $errors[] = "Telephone number is not valid";
    }

    if(empty($dateOfBirth) || strlen($dateOfBirth) < 10) {
        $errors[] = "Date is not valid";
    }

    if (empty($address)) {
        $errors[] = "Address is not valid";

    }

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo $error;
        }
    } else {
        \Model\UtilizatorModel::update(['alias' => $alias], ['id' => $_SESSION['userId']]);
        \Model\UtilizatorModel::update(['data_nasterii' => $dateOfBirth], ['id' => $_SESSION['userId']]);
        \Model\UtilizatorModel::update(['adresa' => $address], ['id' => $_SESSION['userId']]);

        \Model\UtilizatorNrTelefonModel::update(['nr_telefon' => $telephoneNumber], ['id_utilizator' => $_SESSION['userId']]);

        echo "updated user";
    }
}
?>
<div class="row">
    <div class="large-6 columns">
        <h2> Edit data</h2>
        <form method="post" action="edit_user.php">

            <label>
                Alias
                <input type="text" name="alias" value="<?php echo $userModel['alias']; ?>">
            </label>

            <label>
                Telephone number
                <input type="text" name="telephone" value="<?php echo $userTelephoneNumberModel['nr_telefon']; ?>">
            </label>

            <label>
                Date of birth
                <input type="text" name="date_of_birth" value="<?php echo $userModel['data_nasterii']; ?>">
            </label>

            <label>
                Address
                <input type="text" name="address" value="<?php echo $userModel['adresa']; ?>">
            </label>
            <input type="submit" class="button" value="Edit" name="edit">
        </form>
</body>
</html>
