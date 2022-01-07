<?php
class Myhome extends Controller
{
    public function __construct()
    {
        $this->user = $this->model('User');
    }
    public function index()
    {
        $myuser = $this->user->all();
        $this->view('index', ['user' => $this->user->all()]);
    }
}
