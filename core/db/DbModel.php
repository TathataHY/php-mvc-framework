<?php

namespace app\core\db;

use app\core\Model;
use PDOException;


abstract class DbModel extends Model
{
    public static function primaryKey(): string
    {
        return 'id';
    }

    abstract public static function tableName(): string;

    abstract public function attributes(): array;

    public function save()
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $params = array_map(fn($attr) => ":$attr", $attributes);

        $statement = self::prepare("INSERT INTO $tableName (" . implode(',', $attributes) . ")
        VALUES (" . implode(',', $params) . ")");

        try {
            foreach ($attributes as $attribute) {
                $statement->bindValue(":$attribute", $this->{$attribute});
            }
            $statement->execute();
            return true;
        } catch (PDOException $e) {
            // Manejo de la excepción
            error_log("Error al guardar en la base de datos: " . $e->getMessage());
            // Puedes lanzar una excepción personalizada si lo deseas
            // throw new Exception("No se pudo guardar el registro en la base de datos.");
            return false;
        }
    }

    public static function findOne($where)
    {
        $tableName = static::tableName();
        $attributes = array_keys($where);
        $sql = implode("AND ", array_map(fn($attr) => "$attr = :$attr", $attributes));

        $statement = self::prepare("SELECT * FROM $tableName WHERE $sql");
        foreach ($where as $key => $item) {
            $statement->bindValue(":$key", $item);
        }
        $statement->execute();

        return $statement->fetchObject(static::class);
    }
}
