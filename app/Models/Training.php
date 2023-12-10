<?php

namespace App\Models;

use App\Models\Base;
use App\Lib\Validations;

class Training extends Base
{
    private const DB_PATH = '../database/trainings.txt';

    private string $name;

    public function __construct(string $name = '')
    {
        $this->name = trim($name);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function validates()
    {
        Validations::notEmpty($this->name, 'name', $this->errors);
    }

    public function save()
    {
        if ($this->isValid()) {
            file_put_contents(
                self::DB_PATH,
                $this->name . PHP_EOL,
                FILE_APPEND | LOCK_EX
            );
            return true;
        }

        return false;
    }

    public static function all()
    {
        $trainings = [];

        $trainingsFromFile = file(self::DB_PATH, FILE_IGNORE_NEW_LINES);
        foreach ($trainingsFromFile as $trainingName) {
            $trainings[] = new Training($trainingName);
        }

        return $trainings;
    }
}