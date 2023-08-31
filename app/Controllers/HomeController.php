<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\User;
class HomeController extends Controller
    {
        public function index()
        {
            $user = User::all();
            $this->view('index', ['user' => $user]);
        }
    }
