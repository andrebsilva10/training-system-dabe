<?php

namespace App\Services;

use App\Models\Training;
use App\Models\TrainingUser;
use App\Models\User;
use Core\Db\Database;
use PDO;

class UserTrainingsService
{

/*     public function __construct(
        private User $user
    ) {
    }

    public function all(): array
    {
        $tranings = [];
        $sql = <<<SQL
            SELECT trainings.id, trainings.name
            FROM  trainings, trainings_users
            WHERE trainings.id = trainings_users.training_id AND
                  trainings_users.user_id = :user_id;
        SQL;

        $pdo = Database::getDBConnection();
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue('user_id', $this->user->getId());

        $stmt->execute();
        $resp = $stmt->fetchAll(PDO::FETCH_NUM);

        foreach ($resp as $row) {
            $tranings[] = new Training(...$row);
        }


        return $tranings;
    }

    public function findByTrainingId($training_id): TrainingUser | null
    {
        return TrainingUser::findBy(
            [
                'user_id' => $this->user->getId(),
                'training_id' => $training_id
            ]
        );
    }

    public function new($training_id): TrainingUser
    {
        return new TrainingUser(
            user_id: $this->user->getId(),
            training_id: $training_id
        );
    } */
}
