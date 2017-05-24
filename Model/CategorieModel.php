<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 24.05.2017
 * Time: 15:05
 */

namespace Model;


class CategorieModel
{
    public static function loadById(int $id)
    {
        return Mysql::getOne("snCategorie", ['id' => $id]);
    }

    public static function getAllCategories()
    {
        return Mysql::getAll("snCategorie");
    }

    public static function create(string $categoryName)
    {
        $result = Mysql::insert("snCategorie", [
            "categorie" => $categoryName
        ]);

        return $result;
    }
}