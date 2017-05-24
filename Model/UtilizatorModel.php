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

    public static function loadById(int $id)
    {
        return Mysql::getOne("snUtilizator", ['id' => $id]);
    }

    public static function loadByName(string $name)
    {
        return Mysql::getOne("snUtilizator", ["nume" => $name]);
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

    public static function userExists(string $alias): bool
    {
        try {
            self::loadByName($alias);
            return true;
        } catch (NoResultsException $e) {
            return false;
        }
    }

    public static function update(array $data, array $where)
    {
        return Mysql::update("snUtilizator", $data, $where);
    }

}