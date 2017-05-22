<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 21.05.2017
 * Time: 19:53
 */

namespace Model;


class UtilizatorEmailModel
{
    public static function loadById(string $tableName, array $data)
    {
        return Mysql::getOne($tableName, $data);
    }

    public static function loadByName(string $tableName, array $data)
    {
        return Mysql::getOne($tableName, $data);
    }

    public static function create(int $idUtilizator, string $email)
    {
        $result = Mysql::insert("snUtilizator_email", [
            "id_utilizator" => $idUtilizator,
            "email" => $email

        ]);
        return $result;
    }

    public static function userExists(string $name)
    {
        try {
            self::loadById("snUtilizator", ["nume" => $name]);
            return true;
        } catch (NoResultsException $e) {
            return false;
        }
    }

}