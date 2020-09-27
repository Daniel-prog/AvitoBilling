<?php

class View {

    public function render($tpl, $errorText='Ошибка!', $button = false) {
        include ROOT . $tpl;
    }

}