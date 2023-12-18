<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Lib\Flash;
use App\Models\Training;
use App\Models\TrainingUser;
use App\Models\User;

class AssociateTrainingsController extends BaseController
{
    public function show()
    {
        $this->authenticated();
        $user = User::all();
        $training = Training::all();
        $trainingUser = TrainingUser::all();

        $this->render('associateTrainings/show', compact('user', 'training', 'trainingUser'));
    }

    public function create()
    {
        $this->authenticated();
        $user_id = $this->params['user']['user_id'];
        $training_id = $this->params['training_user']['training_id'];

        if (TrainingUser::isAlreadyAssociateTrainingsd($user_id, $training_id)) {
            Flash::message('danger', 'Treinamento já vinculado a este colaborador.');
            $this->redirectTo('/associateTrainings');
        }

        $trainingUser = new TrainingUser(null, $training_id, $user_id);

        if ($trainingUser->save()) {
            Flash::message('success', 'Colaborador vinculado com sucesso.');
        } else {
            Flash::message('danger', 'Erro ao vincular colaborador.');
        }

        $this->redirectTo('/associateTrainings');
    }

    public function destroy()
    {
        $this->authenticated();

        $trainingUser_id = $this->params['trainings_users']['id'];
        $trainingUser = TrainingUser::findById($trainingUser_id);

        $trainingUser->destroy();

        Flash::message('success', 'Vínculo removido com sucesso.');

        $this->redirectTo('/associateTrainings');
    }
}
