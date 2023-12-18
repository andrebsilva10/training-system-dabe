<?php

namespace App\Models;

use App\Lib\Validations;
use App\Models\Base;
use Core\Db\Database;

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

    public function getUser()
    {
        return User::findById($this->getUserId());
    }

    public function getTrainingId()
    {
        return $this->training_id;
    }

    public function getTraining()
    {
        return Training::findById($this->getTrainingId());
    }

    public function validates()
    {
        Validations::notEmpty($this->user_id, 'user_id', $this->errors);
        Validations::uniqueness(['user_id', 'training_id'], $this);
    }

    public static function isAlreadyAssociateTrainingsd($user_id, $training_id)
    {
        $table = static::$table;
        $sql = "SELECT COUNT(*) FROM {$table} WHERE user_id = :user_id AND training_id = :training_id";

        $pdo = Database::getDBConnection();
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':user_id', $user_id);
        $stmt->bindValue(':training_id', $training_id);

        $stmt->execute();

        return ($stmt->fetchColumn() > 0);
    }
}
