<?php

namespace App\Services;

use App\Models\Training;
use App\Models\TrainingUser;
use App\Models\User;
use Core\Db\Database;
use PDO;

class TrainingUsersService
{

/*     public function __construct(
        private Training $training
    ) {
    }

    public function all(): array
    {
        $users = [];
        $sql = <<<SQL
            SELECT users.id, users.name, users.email
            FROM  users, trainings_users
            WHERE users.id = trainings_users.user_id AND
                  trainings_users.training_id = :training_id;
        SQL;

        $pdo = Database::getDBConnection();
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue('training_id', $this->training->getId());

        $stmt->execute();
        $resp = $stmt->fetchAll(PDO::FETCH_NUM);

        foreach ($resp as $row) {
            $users[] = new User(...$row);
        }


        return $users;
    }

    public function findByUserId($user_id): TrainingUser | null
    {
        return TrainingUser::findBy(
            [
                'training_id' => $this->training->getId(),
                'user_id' => $user_id
            ]
        );
    }

    public function new($user_id): TrainingUser
    {
        return new TrainingUser(
            training_id: $this->training->getId(),
            user_id: $user_id
        );
    } */
}
