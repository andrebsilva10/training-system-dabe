<?php

namespace App\Models;

use App\Lib\Validations;
use App\Models\Base;
use Core\Db\Database;
use PDO;

class TrainingUser extends Base
{
    protected static string $table =      'trainings_users';
    protected static array  $attributes = ['training_id', 'user_id', 'status'];

    public function __construct(
        $id = -1,
        protected $training_id = -1,
        protected $user_id = -1,
        protected $status = 'Pendente'
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

    public function getStatus()
    {
        return $this->status;
    }

    public function validates()
    {
        Validations::notEmpty($this->user_id, 'user_id', $this->errors);
        Validations::uniqueness(['user_id', 'training_id'], $this);
    }

    public static function isAlreadyAssociateTrainings($user_id, $training_id)
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

    public function collaborators()
    {
        $users = [];
        $sql = <<<SQL
            use training_system_development;
            SELECT
                u.id,
                u.name,
                u.email
            FROM users u, training_users tu
            WHERE u.id = tu.user_id
            AND tu.training_id = :training_id;
        SQL;
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':training_id', $this->getTrainingId());
        $stmt->execute();
        $resp = $stmt->fetchAll(PDO::FETCH_NUM);

        foreach ($resp as $row) {
            $resp[] = new User(...$row);
        }

        return $users;
    }
}
