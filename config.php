<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 21.05.2017
 * Time: 18:58
 */
include "Utils/StringUtils.php";
include "Model/Mysql.php";
include "Model/Exceptions/QueryException.php";
include "Model/Exceptions/NoResultsException.php";
include "Model/Exceptions/ConnectionException.php";
include "Model/UtilizatorModel.php";
include "Model/UtilizatorEmailModel.php";
include "Model/UtilizatorNrTelefonModel.php";
include "Model/UtilizatorDatePersonaleModel.php";
include "Model/ArticleModel.php";

define("DB_HOST", "85.204.241.125");
define("DB_USERNAME", "sinfl-orban-adam");
define("DB_PASSWORD", "0tSFyzmc5pGrimvr");
define("DB_DATABASE_NAME", "sinfl_orban_adam");