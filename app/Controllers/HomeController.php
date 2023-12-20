<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class HomeController extends BaseController
{
    public function index()
    {
        $this->currentUser() ? $this->render('home/index') : $this->redirectTo('/login');
    }
}
