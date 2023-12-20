<?php

namespace App\Controllers;

use App\Lib\Flash;
use App\Models\Training;
use App\Models\TrainingsCategory;
use App\Models\TrainingUser;
use Core\Debug\Debug;

class TrainingsController extends BaseController
{
    public function index()
    {
        $this->authenticated();

        $trainings = Training::all();
        $trainings_category = TrainingsCategory::all();

        $this->render('trainings/index', compact('trainings', 'trainings_category'));
    }

    public function new()
    {
        $this->authenticated();

        $trainings_category = TrainingsCategory::all();

        $this->render('trainings/new', compact('trainings_category'));
    }

    public function show()
    {
        $this->authenticated();

        $user_id = $this->currentUser()->getId();

        $trainingUsers = TrainingUser::where(['user_id' => $user_id]);

        $trainings = [];

        foreach ($trainingUsers as $trainingUser) {
            $trainings[] = $trainingUser->getTraining();
        }

        $this->render('trainings/show', compact('trainings'));
    }

    public function edit()
    {
        $this->authenticated();

        $training = Training::findById($this->params[':id']);

        $this->render('trainings/edit', compact('training'));
    }

    public function update()
    {
        $this->authenticated();
        $training = Training::findById($this->params[':id']);

        $training->setName($this->params['training']['name']);

        if ($training->save()) {
            Flash::message('success', 'Treinamento atualizado com sucesso!');
            $this->redirectTo('/trainings');
        } else {
            Flash::message('danger', 'Dados incorretos!');

            $this->render('trainings/edit', compact('training'));
        }
    }

    public function create()
    {
        $this->authenticated();

        if (!isset($this->params['training']['training_category_id'])) {
            Flash::message('danger', 'Por favor, selecione uma categoria para o treinamento.');
            $this->redirectTo('/trainings/new');
        }

        $training_category_id = $this->params['training']['training_category_id'];
        $training = new Training(
            -1,
            $this->params['training']['name'],
            $training_category_id
        );

        if ($training->save()) {
            Flash::message('success', 'Treinamento cadastrado com sucesso!');
            $this->redirectTo('/trainings');
        } else {
            Flash::message('danger', 'Dados incorretos!');
            $this->redirectTo('/trainings/new');
        }
    }

    public function destroy()
    {
        $this->authenticated();

        $training_id = $this->params['training']['id'];

        try {
            $training = Training::findById($training_id);
            $success = $training->destroy();

            if ($success) {
                Flash::message('success', 'Treinamento removido com sucesso!');
            } else {
                Flash::message('danger', 'Não foi possível remover o treinamento. Certifique-se de que não há usuários associados.');
            }
        } catch (\PDOException $e) {
            Flash::message('danger', 'Não foi possível remover o treinamento. Certifique-se de que não há usuários associados.');
        }

        $this->redirectTo('/trainings');
    }

}
