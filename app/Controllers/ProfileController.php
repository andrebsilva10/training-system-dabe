<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ProfileController extends BaseController
{

    public function show()
    {
        $this->authenticated();

        $this->render('profile/show');
    }

    public function updateAvatar()
    {
        $this->authenticated();
        $image = $_FILES['user_avatar'];

        $this->currentUser()->avatar()->updateImage($image);
        $this->redirectTo('/profile');
    }
}
