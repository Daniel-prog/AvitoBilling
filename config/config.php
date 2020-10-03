<?php

define("ROOT", $_SERVER['DOCUMENT_ROOT']);
define("CONTROLLER_PATH", ROOT . "/avito/controllers/");
define("MODEL_PATH", ROOT . "/avito/models/");
define("VIEW_PATH", ROOT . "/avito/views/");
define("PAYMENTS_URL", "/avito/payments/");
define("ERROR_PAGE", "/avito/views/error.tpl.php");
define("SUCCESS_PAGE", "/avito/views/success.tpl.php");

require_once("db.php");
require_once("route.php");
require_once MODEL_PATH . 'Model.php';
require_once VIEW_PATH . 'View.php';
require_once CONTROLLER_PATH . 'Controller.php';

Routing::buildRoute();