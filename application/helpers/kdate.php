<?php

class kdate {

    public static function now() {
        return date("Y-m-d H:i:s");
    }

    public static function to_thai_date($date) {
        if ($date != "") {
            if ($date != "0000-00-00 00:00:00") {
                if ($date != "0000-00-00") {
                    $arr_date = explode(" ", $date);
                    $arr = explode("-", $arr_date[0]);

                    if ($arr[0] == "0000") {
                        return "&nbsp;";
                    }
                    $arr[0] += 543;
                    $arr[2] *= 1;

                    if (empty($arr_date[1])) {
                        $arr_date[1] = "";
                    }

                    $month_name = kdate::month_name($arr[1]);
                    return "{$arr[2]} {$month_name} {$arr[0]} {$arr_date[1]}";
                }
            }
        }

        return "";
    }

    public static function to_thai_day($date, $thai_year = false) {
        if ($date != "") {
            $arr = explode(" ", $date);
            $arr = explode("-", $arr[0]);
            if ($thai_year) {
                $arr[0] = ($arr[0] + 543);
            }
            if ($arr[0] == "0000") {
                return "&nbsp;";
            }
            return "$arr[2] " . kdate::month_name($arr[1]) . " $arr[0]";
        }

        return "";
    }

    public static function to_mysql_date($date) {
        $date = date("Y-m-d H:i:s", strtotime($date));
        return $date;
    }

    public static function get_month_name() {
        return array(
            "1" => "มกราคม",
            "2" => "กุมภาพันธ์",
            "3" => "มีนาคม",
            "4" => "เมษายน",
            "5" => "พฤษภาคม",
            "6" => "มิถุนายน",
            "7" => "กรกฏาคม",
            "8" => "สิงหาคม",
            "9" => "กันยายน",
            "10" => "ตุลาคม",
            "11" => "พฤศจิกายน",
            "12" => "ธันวาคม"
        );
    }

    public static function month_name($index) {
        $array = kdate::get_month_name();
        if ($index - 1 == -1) {
            $index = 1;
        }
        $index *= 1;
        return $array[$index];
    }

    public static function dropdown($id) {
        $current_year = date("Y") + 543;
        $current_month = date("m");
        $current_day = date("d");

        // selected day
        if (!empty($_POST["{$id}_day"])) {
            $current_day = $_POST["{$id}_day"];
        }
        if (!empty($_POST["{$id}_month"])) {
            $current_month = $_POST["{$id}_month"];
        }
        if (!empty($_POST["{$id}_year"])) {
            $current_year = $_POST["{$id}_year"] + 543;
        }

        $start = $current_year - 50;
        $end = $current_year + 50;

        $dd_day = form::dropdown($id . "_day", date::days($current_month, $current_year), $current_day);
        $dd_month = form::dropdown($id . "_month", kdate::get_month_name(), $current_month);
        $dd_year = form::dropdown($id . "_year", date::years($start, $end), $current_year);

        return "{$dd_day}{$dd_month}{$dd_year}";
    }

    public static function input_from_dropdown($name) {
        $_POST[$name . "_month"];
        return "{$_POST[$name . "_year"]}-{$_POST[$name . "_month"]}-{$_POST[$name . "_day"]}";
    }

    public static function ddl_month($id, $default_value = null) {
        if ($default_value == null) {
            $default_value = date("m") * 1;
        }

        return form::dropdown($id, kdate::get_month_name(), $default_value);
    }

    public static function ddl_year($id, $default_value = null, $min = 5, $max = 1) {
        if ($default_value == null) {
            $default_value = date("Y");
        }
        $current_year = date("Y");
        $arr = array();

        for ($i = $current_year - $min; $i <= ($current_year + $max); $i++) {
            $arr[$i] = $i;
        }

        return form::dropdown($id, $arr, $default_value);
    }
    
    public static function convert_to_day($date) {
        if ($date != "") {
            if ($date != "0000-00-00 00:00:00") {
                $arr_date = explode(" ", $date);
                $arr_day = $arr_date[0];
                $extract_day = explode("-", $arr_day);
                echo $date;
                return $extract_day[2];
            }
        }
        return "";
    }

}

?>
