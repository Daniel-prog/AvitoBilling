<?php

class CardController extends Controller {

    private $pageTpl = '/views/card.tpl.php';

	public function __construct() {
        $this->model = new CardModel();
        $this->view = new View();
    }

    public function action() {
    	session_start();

        if (isset($_SESSION['startTime']) && (time() - $_SESSION['startTime'] > 1800)) {
            session_unset();
            session_destroy();
            $this->view->render(ERROR_PAGE, 'Время сессии истекло! Отправьте запрос снова.');
            die();
        }

        if (!isset($_SESSION['count'])) {
            $_SESSION['startTime'] = time();
            $_SESSION['count'] = 0;
        }

    	if (!empty($_GET['sessionId']) 
    		&& ($_GET['sessionId'] == session_id()) 
    		&& isset($_SESSION['payData'])) {

            $this->view->render($this->pageTpl);
        }
    		
    	else {
            $this->view->render(ERROR_PAGE, 'Некорректный ID сессии! Возможно, вы уже совершили оплату.');
    		die();
        }

    }

    public function checkCard() {
        session_start();

        if (isset($_SESSION['startTime']) && (time() - $_SESSION['startTime'] > 1800)) {
            session_unset();
            session_destroy();
            $this->view->render(ERROR_PAGE, 'Время сессии истекло! Отправьте запрос снова.');
            die();
        }

        if (isset($_POST['cardNumber']) && !empty($_POST['cardNumber'])
            && isset($_POST['name']) && !empty($_POST['name'])) {

            //Алгоритм Луна
            $number = strrev(preg_replace('/[^\d]+/', '', $_POST['cardNumber']));
            $sum = 0;

            for ($i = 0, $j = strlen($number); $i < $j; $i++) {
                if (($i % 2) == 0) {
                    $val = $number[$i];
                } else {
                    $val = $number[$i] * 2;
                    if ($val > 9)  {
                        $val -= 9;
                    }
                }
                $sum += $val;
            }

            if (($sum % 10) === 0) {
                $this->model->insert($_POST['name'], $_SESSION['payData']['amount'], $_SESSION['payData']['paymentPurpose']);
                $this->view->render(SUCCESS_PAGE);
                session_unset();
                session_destroy();
            } else {
                $this->view->render(ERROR_PAGE, 'Введены некорректные данные!', true);
            }

        } else {
            $this->view->render(ERROR_PAGE, 'Введены некорректные данные!', true);
        }
    }
}