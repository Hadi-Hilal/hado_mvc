<?php
class DB{
    protected $host;
    protected $username;
    protected $password;
    protected $db;
    public  $con;

    function __construct(){
               $this->host     = DB_HOST;
               $this->username = DB_USERNAME;
               $this->password = DB_PASSWORD;
               $this->db       = DB_NAME;     
               $this->conect();
       }
    private function conect(){
        $this->con = mysqli_connect($this->host , $this->username , $this->password , $this->db) or die() ;
    }
}