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

        $trainings = Training::all();

        $this->render('trainings/index', compact('trainings'));
    }

    public function new()
    {
        $this->authenticated();

        $training = new Training();
        $this->render('trainings/new', compact('training'));
    }

    public function show()
    {
        $this->authenticated();

        $training = Training::findById($this->params[':id']);

        $this->render('trainings/show', compact('training'));
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

        if ($training->update()) {
            Flash::message('success', 'Treinamento atualizado com sucesso!');
            $this->redirectTo('/trainings');
        } else {
            Flash::message('danger', 'Dados incorretos!');

            $this->render('trainings/edit', compact('training')); // ['training' => $training]
        }
    }

    public function create()
    {
        $this->authenticated();

        $training = new Training(name: $this->params['training']['name']);

        if ($training->save()) {
            Flash::message('success', 'Treinamento registrado com sucesso!');
            $this->redirectTo('/trainings');
        } else {
            Flash::message('danger', 'Dados incorretos!');

            $this->render('trainings/new', compact('training')); // ['training' => $training]
        }
    }

    public function destroy()
    {
        $this->authenticated();

        $training_id = $this->params['training']['id'];
        $training = Training::findById($training_id);

        $training->destroy();

        Flash::message('success', 'Treinamento removido com sucesso!');

        $this->redirectTo('/trainings');
    }
}
