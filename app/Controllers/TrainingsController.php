<?php

namespace App\Controllers;

use App\Lib\Flash;
use App\Models\Training;
use App\Models\TrainingUser;
use App\Models\User;
use Core\Debug\Debug;

class TrainingsController extends BaseController
{
    public function index()
    {
        $this->authenticated();

        $training = new Training();
        $trainings = $this->currentUser()->trainings()->all();

        $this->render('trainings/index', compact('training', 'trainings'));
    }

    public function show()
    {
        $this->authenticated();

        $training_user = new TrainingUser();
        $users = User::all();

        $training = $this->currentUser()->trainings()->findByTrainingId($this->params[':id']);

        $this->render('trainings/show', compact('training', 'training_user', 'users'));
    }

    public function create()
    {
        $this->authenticated();

        $training = $this->currentUser()->trainings()->new(
            name: $this->params['training']['name']
        );

        if ($training->save()) {
            Flash::message('success', 'Treinamento registrado com sucesso!');
            $this->redirectTo('/trainings');
        } else {
            Flash::message('danger', 'Dados incorretos!');

            $trainings = $this->currentUser()->trainings()->all();
            $this->render('trainings/index', [
                'training' => $training,
                'trainings' => $trainings
            ]);
        }
    }

    public function destroy()
    {
        $this->authenticated();

        $training_id = $this->params['training']['id'];
        $training = $this->currentUser()->trainings()->findByTrainingId($training_id);

        $training->destroy();

        Flash::message('success', 'Treinamento removido com sucesso!');

        $this->redirectTo('/trainings');
    }
}