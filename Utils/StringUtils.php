<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 21.05.2017
 * Time: 19:43
 */

namespace Utils;

class StringUtils
{
    public static function sanitizeString(string $string)
    {
        return filter_var($string, FILTER_SANITIZE_STRING);
    }

    public static function encryptPassword(string $password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }
}