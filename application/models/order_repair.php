<?php

class Order_Repair_Model extends ORM {

    var $belongs_to = array("user");

    public static function findNoCompleteByUserId($user_id) {
        return ORM::factory("order_repair")
                ->where("user_id", $user_id)
                ->where("order_repair_status !=", "complete")
                ->orderby("id", "DESC")
                ->find_all();
    }

    public static function findNoComplete() {
        return ORM::factory("order_repair")
                ->where("order_repair_status", "wait")
                ->orderby("id", "DESC")
                ->find_all();
    }

    public static function findRepair($service_id = null) {
        $order_repairs = ORM::factory("order_repair")
                        ->where("order_repair_status", "repair")
                        ->orderby("id", "DESC");

        if (!empty($service_id)) {
            $order_repairs = $order_repairs->where("service_id", $service_id);
        }

        return $order_repairs->find_all();
    }

    public static function findComplete($service_id = null) {
        $order_repairs = ORM::factory("order_repair")
                        ->where("order_repair_status", "complete")
                        ->orderby("id", "DESC");

        if (!empty($service_id)) {
            $order_repairs = $order_repairs->where("service_id", $service_id);
        }

        return $order_repairs->find_all();
    }

    public static function findById($id) {
        return ORM::factory("order_repair")->find($id);
    }

    public static function findByComputerName($computer_name) {
        return ORM::factory("order_repair")
                ->where("order_repair_computer_name", $computer_name)
                ->orderby("id", "DESC")
                ->find_all();
    }

    public static function findByUserIdAndYear($user_id, $year) {
        $sql = "
            SELECT *
                FROM order_repairs
            WHERE
                user_id = $user_id
                AND YEAR(order_repair_created_date) = $year
            ORDER BY id DESC";
        return Database::instance()->query($sql);
    }

    public static function countByMonth($m) {
        $sql = "
        SELECT COUNT(id) AS total FROM order_repairs
        WHERE MONTH(order_repair_created_date) = $m";

        $rs = Database::instance()->query($sql)->as_array();
        return $rs[0]->total;
    }

    public static function countCompleteByMonth($m) {
        $sql = "
        SELECT COUNT(id) AS total FROM order_repairs
        WHERE MONTH(order_repair_created_date) = $m
        AND order_repair_status != 'complete'";

        $rs = Database::instance()->query($sql)->as_array();
        return $rs[0]->total;
    }

    public static function countNoCompleteByMonth($m) {
        $sql = "
        SELECT COUNT(id) AS total FROM order_repairs
        WHERE MONTH(order_repair_created_date) = $m
        AND order_repair_status = 'complete'";

        $rs = Database::instance()->query($sql)->as_array();
        return $rs[0]->total;
    }

    public static function countRepairByMonth($m) {
        $sql = "
        SELECT COUNT(id) AS total FROM order_repairs
        WHERE MONTH(order_repair_created_date) = $m
        AND order_repair_status = 'repair'";

        $rs = Database::instance()->query($sql)->as_array();
        return $rs[0]->total;
    }

}

?>
