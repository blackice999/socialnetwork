<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 21.05.2017
 * Time: 19:52
 */

namespace Model;


class UtilizatorModel
{

    public static function loadById(string $tableName, array $data)
    {
        return Mysql::getOne($tableName, $data);
    }

    public static function loadByName(string $tableName, array $data) {
        return Mysql::getOne($tableName, $data);
    }

    public static function create(string $name, string $alias, string $dateOfBirth, string $address, string $userId = NULL)
    {

        if (!is_null($userId)) {
            $result = Mysql::insert("snUtilizator", [
                "nume" => $name,
                "alias" => $alias,
                "data_nasterii" => $dateOfBirth,
                "userId" => $userId,
                "address" => $address

            ]);
        } else {
            $result = Mysql::insert("snUtilizator", [
                "nume" => $name,
                "alias" => $alias,
                "data_nasterii" => $dateOfBirth,
                "adresa" => $address
            ]);
        }

        return $result;
    }

    public static function userExists(string $name) {
        try {
            self::loadById("snUtilizator", ["nume" => $name]);
            return true;
        } catch(NoResultsException $e) {
            return false;
        }
    }

}