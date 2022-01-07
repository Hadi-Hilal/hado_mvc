<?php
class Home extends Controller{
    public function __construct()
    {
        
    }
    public function index(){
        if (strpos($_SERVER['HTTP_USER_AGENT'], 'dd') !== FALSE) {
            echo 'You are using Chrome.<br />';
        }
    }
}