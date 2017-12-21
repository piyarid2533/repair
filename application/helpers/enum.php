<?php

class enum {

    public static function getUserLevel() {
        return array(
            "admin" => "ผู้ดูแลระบบ",
            "manager" => "ผู้จัดการ",
            "user" => "ผู้ใช้ทั่วไป",
            "service" => "ผู้ให้การบำรุงรักษา"
        );
    }

    public static function getOrderStatus($isEmpty = false) {
        $arr = array();

        if ($isEmpty) {
            $arr[""] = "--- เลือกสถานะ ---";
        }
        $arr["wait"] = "รอการซ่อม";
        $arr["repair"] = "กำลังดำเนินการ";
        $arr["complete"] = "ซ่อมเสร็จแล้ว";

        return $arr;
    }

}

?>
