<?php
/* this app powered by hadi hilal 2021 */


// load config 
use App\Core\Bootsrap;

@require_once  __Dir__."/config.php";
// autoload composer 
@require_once  __Dir__."/../vendor/autoload.php";
// include database config
@require_once  __Dir__."/database.php";
// include bootstrap
@require_once  __Dir__."/DB.php";
// include mailer
@require_once  __Dir__."/Mailer.php";


// include functions
@require_once  __Dir__."/functions.php";
// include app 
@require_once  __Dir__."/Core/Bootsrap.php";
// include controller instance
@require_once  __Dir__."/Core/Controller.php";

$bot = new Bootsrap();
