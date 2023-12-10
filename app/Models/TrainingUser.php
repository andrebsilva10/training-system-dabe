<?php

namespace App\Models;

use App\Lib\Validations;
use App\Models\Base;

class TrainingUser extends Base
{
    protected static string $table =      'trainings_users';
    protected static array  $attributes = ['training_id', 'user_id'];

    public function __construct(
        protected $id = -1,
        protected $training_id = -1,
        protected $user_id = -1
    ) {
        parent::__construct($id);
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function getTrainingId()
    {
        return $this->training_id;
    }

    public function validates()
    {
        Validations::notEmpty($this->user_id, 'user_id', $this->errors);
        Validations::uniqueness(['user_id', 'training_id'], $this);
    }
}