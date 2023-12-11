#<?php
#
#namespace App\Controllers;
#
#use App\Controllers\BaseController;
#use App\Lib\Flash;
#use App\Models\User;
#
#class TrainingsCollaboratorsController extends BaseController
#{
#    public function add()
#    {
#        $this->authenticated();
#
#        $training_id = $this->params[':training_id'];
#        $user_id = $this->params['training_user']['user_id'];
#
#        $training = $this->currentUser()->trainings()->findById($training_id);
#        $training_user = $training->collaborators()->new(
#            user_id: $user_id
#        );
#
#        if ($training_user->save()) {
#            Flash::message('success', 'Colaborador adicionado com sucesso');
#            $this->redirectTo("/trainings/{$training_id}");
#        } else {
#            $users = User::all();
#            $this->render('trainings/show', compact('training', 'training_user', 'users'));
#        }
#    }
#
#    public function destroy()
#    {
#        $this->authenticated();
#
#        $training_id = $this->params[':training_id'];
#        $user_id = $this->params[':id'];
#
#        $training = $this->currentUser()->trainings()->findById($training_id);
#        $user_training = $training->collaborators()->findByUserId($user_id);
#
#        $user_training->destroy();
#
#        Flash::message('success', 'Colaborador removido com sucesso!');
#
#        $this->redirectTo("/trainings/{$training_id}");
#    }
#}