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

include "config.php";
include "menu.php";


if (!isset($_SESSION['userId'])) {
?>
<div class="row">
    <div class="large-6 columns float-right">
        <h2> Login</h2>
        <form method="post" action="login.php">
            <label>
                Alias
                <input type="text" name="alias">
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
                    <option value="Masculin">Male</option>
                    <option value="Feminin">Female</option>
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

<?php } else { ?>

    <?php
    $user = \Model\UtilizatorModel::loadById($_SESSION['userId']);
    $userName = $user['nume'];
    ?>

    <h3> Hello <?php echo $userName; ?></h3>
    <h2> Add a new article</h2>
    <form method="post" action="article.php">
        <label>
            Content
            <textarea rows="4" cols="50" name="content"></textarea>
        </label>
        <label>
            Category
            <select name="category_id">

                <!--            To fill out with category data-->
                <option value="1">Sport</option>
            </select>
        </label>

        <input type="hidden" name="user_id" value="<?php echo $_SESSION['userId']; ?>">

        <input type="submit" class="button" name="new_article" value="Post new article">
    </form>

    <h2> Your articles</h2>
    <?php
    if (empty(\Model\ArticleModel::getAllArticlesByUserId($_SESSION['userId']))) {
        echo "<p>No articles found</p>";
    } else {
        ?>

        <?php foreach (\Model\ArticleModel::getAllArticlesByUserId($_SESSION['userId']) as $article) { ?>
            <div class="callout ">
                <small><p><?php echo $article['data']; ?></p></small>

                <div class="callout secondary">
                    <p> <?php echo $article['continut']; ?></p>
                </div>
            </div>
        <?php } ?>
    <?php }
} ?>

</body>
</html>
