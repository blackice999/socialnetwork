<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 21.05.2017
 * Time: 19:53
 */

namespace Model;


class UtilizatorNrTelefonModel
{

    public static function loadByUserId(int $userId)
    {
        return Mysql::getOne("snUtilizator_nr_telefon", ['id_utilizator' => $userId]);
    }

    public static function loadByName(string $tableName, array $data)
    {
        return Mysql::getOne($tableName, $data);
    }

    public static function create(int $idUtilizator, string $nrTelefon)
    {
        $result = Mysql::insert("snUtilizator_nr_telefon", [
            "id_utilizator" => $idUtilizator,
            "nr_telefon" => $nrTelefon

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

    public static function update(array $data, array $where)
    {
        return Mysql::update("snUtilizator_nr_telefon", $data, $where);
    }
}