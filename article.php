<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 22.05.2017
 * Time: 17:07
 */

include "config.php";
include "Utils/StringUtils.php";
include "Model/Mysql.php";
include "Model/Exceptions/QueryException.php";
include "Model/Exceptions/NoResultsException.php";
include "Model/Exceptions/ConnectionException.php";
include "Model/ArticleModel.php";

$errors = [];
if(isset($_POST['new_article'])) {
    $content = \Utils\StringUtils::sanitizeString($_POST['content']);
    $categoryId = \Utils\StringUtils::sanitizeString($_POST['category_id']);
    $userId = \Utils\StringUtils::sanitizeString($_POST['user_id']);

    if(empty($content)) {
        $errors[] = "Please add some content";
    }

    if(!empty($errors)) {
        foreach($errors as $error) {
            echo $error;
        }
    } else {
        \Model\ArticleModel::create($userId, $categoryId, $content);
        header("Refresh:0.1; URL=index.php");

    }
}