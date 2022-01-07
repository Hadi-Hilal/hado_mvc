<?php

function url($path){
    if($_SERVER["REQUEST_URI"] === $path){
        return dirname($_SERVER["REQUEST_URI"].'?') ;
    }else{
         return dirname($_SERVER["REQUEST_URI"].'?').$path ;
    }
   
}

function base_url($path){
      $url = dirname(__FILE__);
        $array = explode('/',$url);
        $count = count($array);
        $myarr =  $array[$count-2];
    if(!empty(BASE_URL)){
        return BASE_URL."/".$path;
    }else{
        return $_SERVER['HTTP_HOST']."/".$myarr ."/".$path;
    }
}

function trans($key){
    $lang = $_SESSION['lang'];
    @require __Dir__."/langs/".$lang.".php";
    if(array_key_exists($key , $words)){
        return $words[$key];
    }else{
        return "-";
    }
    
}