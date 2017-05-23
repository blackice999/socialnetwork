<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 22.05.2017
 * Time: 17:10
 */

namespace Model;


class ArticleModel
{
    public static function loadById(int $id)
    {
        return Mysql::getOne("snArticol", ['id' => $id]);
    }

    public static function getAllArticlesByUserId(int $userId) {
        return Mysql::getAll("snArticol", ['id_utilizator' => $userId]);
    }

    public static function loadByAlias(string $name)
    {
        return Mysql::getOne("snArticol", ["nume" => $name]);
    }

    public static function create(string $userId, int $categoryId, string $content)
    {
        $result = Mysql::insert("snArticol", [
            "id_utilizator" => $userId,
            "id_categorie" => $categoryId,
            "data" => date("Y-m-d"),
            "continut" => $content
        ]);

        return $result;
    }
}