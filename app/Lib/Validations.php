<?php

namespace App\Lib;

use Core\Db\Database;

class Validations
{
    public static function notEmpty($value, $key, &$errors)
    {
        if (empty($value)) {
            $errors[$key] = 'não pode ser vazio';
            return false;
        }

        return true;
    }

    public static function passwordConfirmation($password, $passwordConfirmation, $key, &$errors)
    {
        if ($password !== $passwordConfirmation) {
            $errors[$key] = 'as senhas devem ser idênticas';
            return false;
        }

        return true;
    }

    public static function uniqueness($columns, $model)
    {
        $table = $model::getTable();

        $conditions = [];
        foreach ($columns as $column) {
            $conditions[] = "{$column} = :{$column}";
        }

        if (!$model->newRecord()) {
            $conditions[] = "id != :id";
        }

        $sqlConditions = implode(' AND ', $conditions);

        $sql = "SELECT COUNT(*) FROM {$table} WHERE {$sqlConditions}";

        $pdo = Database::getDBConnection();
        $stmt = $pdo->prepare($sql);

        foreach ($columns as $column) {
            $propertyName = StringUtils::snakeToCamelCase($column);
            $method = "get{$propertyName}";
            $stmt->bindValue(":{$column}", $model->$method());
        }

        if (!$model->newRecord()) {
            $stmt->bindValue(":id", $model->getId());
        }

        $stmt->execute();

        return ($stmt->fetchColumn() == 0);
    }
}
