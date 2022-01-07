<?php
/* this app powered by hadi hilal 2021 */


// load config 
@require_once  __Dir__."/config.php";
// autoload composer 
@require_once  __Dir__."/../vendor/autoload.php";
// include database config
@require_once  __Dir__."/database.php";
// include bootstrap
@require_once  __Dir__."/conect.php";
// include mailer
@require_once  __Dir__."/mailer.php";


// include functions
@require_once  __Dir__."/functions.php";
// include app 
@require_once  __Dir__."/core/App.php";
// include controller instance
@require_once  __Dir__."/core/Controller.php";

$app = new App();
