<?php

class Repair_Record_Model extends ORM {

    var $belongs_to = array("order_repair");

    public static function findByOrderRepairId($order_repair_id) {
        return ORM::factory("repair_record")
                ->where("order_repair_id", $order_repair_id)
                ->orderby("id", "DESC")
                ->find_all();
    }

}

?>
