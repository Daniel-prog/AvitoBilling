<?php 

class GetModel extends Model {

	public function getPayments($fromD, $toD) {

        $result = array();
        $sql = "SELECT * FROM payments WHERE created BETWEEN :fromD AND :toD";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":fromD", $fromD, PDO::PARAM_STR);
        $stmt->bindValue(":toD", $toD, PDO::PARAM_STR);
        $stmt->execute();
        $result = json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        return $result;
    }

}
