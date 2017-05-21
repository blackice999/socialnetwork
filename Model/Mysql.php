<?php
/**
 * Created by PhpStorm.
 * User: Adam
 * Date: 21.05.2017
 * Time: 18:55
 */

namespace Model;


class Mysql
{
    private static $connection = null;

    public static function getConnection()
    {
        if (is_null(self::$connection)) {
            self::$connection = new \mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE_NAME);

            if (self::$connection->connect_error) {
                throw new ConnectionException("Can't connect to database " . DB_DATABASE_NAME);
            }
        }

        return self::$connection;
    }

    private function query(string $sql)
    {

        $result = self::getConnection()->query($sql);

        if (self::getConnection()->errno > 0) {
            throw new QueryException(self::getConnection()->error . " " . self::getConnection()->errno);
        }

        return $result;
    }

    public static function getOne(string $tableName, array $where)
    {
        $sql = "SELECT * FROM `" . $tableName . "` WHERE ";

        foreach ($where as $columnName => $columnValue) {
            $sql .= '`' . $columnName . '` = "' . self::getConnection()->escape_string($columnValue) . '" AND ';
        }

        $sql = rtrim($sql, " AND ");

        $result = mysqli_fetch_assoc(self::query($sql));

        if (empty($result)) {
            throw new NoResultsException("No results in table " . $tableName . " by " . json_encode($where));
        }

        return $result;
    }

    public static function getAll(string $tableName, array $where = [])
    {
        $sql = "SELECT * FROM `" . $tableName . "`";

        $clauses = [];
        foreach ($where as $columnName => $columnValue) {
            $clauses[] = '`' . $columnName . '` = "' . self::getConnection()->escape_string($columnValue) . '"';
        }

        $sql .= (count($clauses) > 0) ? " WHERE " . implode(" AND ", $clauses) : '';

        $result = mysqli_fetch_all(self::query($sql), MYSQLI_ASSOC);
        return $result ?: [];
    }

    public static function insert(string $tableName, array $data)
    {
        $sql = "INSERT INTO `" . $tableName . "` (";

        $columnNames = $columnValues = [];
        foreach ($data as $columnName => $columnValue) {
            $columnNames[] = "`" . $columnName . "`";
            $columnValues[] = '"' . self::getConnection()->escape_string($columnValue) . '"';
        }

        $sql .= implode(",", $columnNames) . ")";

        $sql .= "VALUES(" . implode(",", $columnValues) . ")";

        self::query($sql);

        return self::getConnection()->insert_id;


    }
}