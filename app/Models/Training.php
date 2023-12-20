<?php

namespace App\Models;

use App\Models\Base;
use App\Lib\Validations;
use Core\Db\Database;
use PDO;

class Training extends Base
{
    protected static string $table      = 'trainings';
    protected static array  $attributes = ['name', 'training_category_id'];

    public function __construct(
        $id = -1,
        protected string $name = '',
        protected int $training_category_id = -1
    ) {
        parent::__construct($id);
        $this->name = trim($name);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getTrainingCategoryId()
    {
        return $this->training_category_id;
    }

    public function getCategory()
    {
        return TrainingsCategory::findById($this->getTrainingCategoryId());
    }

    public function validates()
    {
        Validations::notEmpty($this->name, 'name', $this->errors);
    }
}
