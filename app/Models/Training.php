<?php

namespace App\Models;

use App\Models\Base;
use App\Lib\Validations;

class Training extends Base
{
    protected static string $table      = 'trainings';
    protected static array  $attributes = ['name'];

    public function __construct(
        $id = -1,
        protected string $name = ''
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

    public function validates()
    {
        Validations::notEmpty($this->name, 'name', $this->errors);
    }
}
