<?php

class CardModel extends Model {

	function insert($name, $amount, $purpose) {
    	$sql = "INSERT INTO payments (name, amount, purpose)
                    VALUES(:name, :amount, :purpose)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":name", $name, PDO::PARAM_STR);
        $stmt->bindValue(":amount", $amount, PDO::PARAM_STR);
        $stmt->bindValue(":purpose", $purpose, PDO::PARAM_STR);
        $stmt->execute();
        
	}

}