<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 24.05.2017
 * Time: 14:30
 */

namespace Model;


class PrieteniModel
{
    public static function loadById(int $id)
    {
        return Mysql::getOne("snPrieteni", ['id' => $id]);
    }

    public static function getAllFriendsByUserId(int $userId)
    {
        return Mysql::getAll("snPrieteni", ["id_utilizator" => $userId]);
    }

    public static function create(int $userId, int $friendId)
    {


        $result = Mysql::insert("snPrieteni", [
            "id_utilizator" => $userId,
            "id_prieten" => $friendId
        ]);

        return $result;
    }


    public static function update(array $data, array $where)
    {
        return Mysql::update("snPrieteni", $data, $where);
    }
}