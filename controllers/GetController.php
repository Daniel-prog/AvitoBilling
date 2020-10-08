<?php

//Контроллер вывода платежей из БД за определённое время

class GetController extends Controller {

	public function __construct() {
        $this->model = new GetModel();
    }

    //Отдаёт платежи в формате JSON
    public function action() {
    	header("Access-Control-Allow-Origin: *");
    	header("Content-Type: application/json; charset=UTF-8");
		header("Access-Control-Allow-Methods: POST");
		header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

		$decode = json_decode(file_get_contents("php://input"), true);

		// YYYY-MM-DD HH:MM:SS
		if (isset($decode['from']) && isset($decode['to'])
			&& !empty($decode['from']) && !empty($decode['to'])
			&& preg_match("/^[\d]{4}-[\d]{2}-[\d]{2} [\d]{2}:[\d]{2}:[\d]{2}$/", $decode['from'])
			&& preg_match("/^[\d]{4}-[\d]{2}-[\d]{2} [\d]{2}:[\d]{2}:[\d]{2}$/", $decode['to'])) {

			echo $this->model->getPayments($decode['from'], $decode['to']);

		} else { die("Некорректные данные!"); }

    }
}