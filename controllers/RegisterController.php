<?php

class RegisterController extends Controller {

	public function __construct() {
        $this->view = new View();
    }

    public function action() {
    	
    	header("Access-Control-Allow-Origin: *");
    	header("Content-Type: application/json; charset=UTF-8");
		header("Access-Control-Allow-Methods: POST");
		header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

		session_start();

		//Значение, используемое в CardController, удаляем для корректной работы удаления сессии в зависимости от времени
		if (isset($_SESSION['count']))
			unset($_SESSION['count']);

		$decode = json_decode(file_get_contents("php://input"));

		//Проверка значений из JSON и их запись в сессию
		if (isset($decode->amount) && isset($decode->paymentPurpose) 
			&& !empty($decode->amount) && !empty($decode->paymentPurpose)
			&& preg_match("/^[0-9]+(\.[0-9]{1,2})?$/m", $decode->amount)) {

			$_SESSION['payData']['amount'] = floatval($decode->amount);

			if (mb_strlen(htmlentities(trim($decode->paymentPurpose))) <= 200) {
				$_SESSION['payData']['paymentPurpose'] = htmlentities(trim($decode->paymentPurpose));
			} else { 
				die("Переданы некорректные данные!");
			}

			//При успехе выдаём ссылку с ID сессии
			echo "http://localhost" . PAYMENTS_URL . "cards/form?sessionId=" . session_id();

		} else { 
			die("Переданы некорректные данные!");
		}
	}
}