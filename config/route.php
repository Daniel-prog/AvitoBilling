<?php

//Класс маршрутизации
class Routing {

    public static function buildRoute() {

        $a = explode('?', $_SERVER['REQUEST_URI']);

        $request = $a[0];
        
        switch ($request) {

        	case PAYMENTS_URL . 'register':
        		$controllerName = 'RegisterController';
        		$modelName = 'RegisterModel';
                $action = 'action';
        		break;

        	case PAYMENTS_URL . 'get_payments':
        		$controllerName = 'GetController';
                $modelName = 'GetModel';
                $action = 'action';
                break;	

            case PAYMENTS_URL . 'cards/form/check':
                $controllerName = 'CardController';
                $modelName = 'CardModel';
                $action = 'checkCard';
                break;


            case PAYMENTS_URL . 'cards/form':
                $controllerName = 'CardController';
                $modelName = 'CardModel';
                $action = 'action';
                break;  
        	
        	default:
        		die('<h1>NO SUCH METHOD</h1>');
        }

        require_once CONTROLLER_PATH . $controllerName . ".php";
        require_once MODEL_PATH . $modelName . ".php";

        $controller = new $controllerName();
        $controller->$action();

    }

}