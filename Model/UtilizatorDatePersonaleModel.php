<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 21.05.2017
 * Time: 19:52
 */

namespace Model;


class UtilizatorDatePersonaleModel
{
    public static function loadById(string $tableName, array $data)
    {
        return Mysql::getOne($tableName, $data);
    }

    public static function loadByName(string $tableName, array $data)
    {
        return Mysql::getOne($tableName, $data);
    }

    public static function create(int $idUtilizator, string $gender, string $password)
    {
        $result = Mysql::insert("snUtilizator_date_personale", [
            "id_utilizator" => $idUtilizator,
            "sex" => $gender,
            "parola" => $password

        ]);
        return $result;
    }

    public static function loadByUtilizatorId(int $utilizatorId)
    {
        return Mysql::getOne("snUtilizator_date_personale", ['id_utilizator' => $utilizatorId]);
    }
}