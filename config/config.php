<?php

define("ROOT", $_SERVER['DOCUMENT_ROOT']);
define("CONTROLLER_PATH", ROOT . "/controllers/");
define("MODEL_PATH", ROOT . "/models/");
define("VIEW_PATH", ROOT . "/views/");
define("PAYMENTS_URL", "/payments/");
define("ERROR_PAGE", "/views/error.tpl.php");
define("SUCCESS_PAGE", "/views/success.tpl.php");

require_once("db.php");
require_once("route.php");
require_once MODEL_PATH . 'Model.php';
require_once VIEW_PATH . 'View.php';
require_once CONTROLLER_PATH . 'Controller.php';

Routing::buildRoute();