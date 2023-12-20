<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Lib\Flash;
use App\Models\Training;
use App\Models\TrainingUser;
use App\Models\User;

class TrainingUserController extends BaseController
{
    public function index()
    {
        $this->authenticated();
        $this->isAdmin();

        $user = User::all();
        $training = Training::all();
        $trainingUser = TrainingUser::all();

        $this->render('trainingUser/index', compact('user', 'training', 'trainingUser'));
    }

    public function show()
    {
        $this->authenticated();

        $user_id = $this->currentUser()->getId();

        $training = TrainingUser::where(['user_id' => $user_id]);

        $this->render('trainingUser/show', compact('training'));
    }

    public function create()
    {
        $this->authenticated();
        $this->isAdmin();

        $user_id = isset($this->params['user']['user_id']) ? $this->params['user']['user_id'] : null;
        $training_id = isset($this->params['training']['training_id']) ? $this->params['training']['training_id'] : null;

        if ($user_id === null || $training_id === null) {
            Flash::message('danger', 'Por favor, selecione um colaborador e um treinamento.');
            $this->redirectTo('/trainingUser');
        }

        if (TrainingUser::isAlreadyTrainingUser($user_id, $training_id)) {
            Flash::message('danger', 'Treinamento já vinculado a este colaborador.');
            $this->redirectTo('/trainingUser');
        }

        $trainingUser = new TrainingUser(-1, $training_id, $user_id);

        if ($trainingUser->save()) {
            Flash::message('success', 'Colaborador vinculado com sucesso.');
        } else {
            Flash::message('danger', 'Erro ao vincular colaborador.');
        }

        $this->redirectTo('/trainingUser');
    }

    public function destroy()
    {
        $this->authenticated();
        $this->isAdmin();

        $trainingUser_id = $this->params['training_user']['id'];
        $trainingUser = TrainingUser::findById($trainingUser_id);

        $trainingUser->destroy();

        Flash::message('success', 'Vínculo removido com sucesso.');

        $this->redirectTo('/trainingUser');
    }

    public function edit()
    {
        $this->authenticated();

        $training = Training::findById($this->params[':id']);

        $this->render('trainingUser/edit', compact('training'));
    }

    public function update()
    {
        $this->authenticated();
        $trainingUser = TrainingUser::findById($this->params[':id']);
        if ($this->params['trainings_users']['status'] === "Pendente" || $this->params['trainings_users']['status'] === "Em andamento" || $this->params['trainings_users']['status'] === "Concluído") {
            $trainingUser->setStatus($this->params['trainings_users']['status']);
            if ($trainingUser->save()) {
                Flash::message('success', 'Status atualizado com sucesso!');
                $this->redirectTo('/trainingUser/show');
            } else {
                Flash::message('danger', 'Erro ao atualizar status!');
                $this->redirectTo('/trainingUser/show');
            }
        } else {
            Flash::message('danger', 'Status inválido!');
            $this->redirectTo('/trainingUser/show');
        }
    }
}
