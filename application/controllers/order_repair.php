<?php

class Order_Repair_Controller extends Template_Controller {

    function form($id = null) {
        $user_id = Session::instance()->get("user_id");

        $content = new View("order_repair/form");
        $content->order_repairs = Order_Repair_Model::findNoCompleteByUserId($user_id);
        $content->n = 1;

        if (!empty($id)) {
            $content->order_repair = Order_Repair_Model::findById($id);
        }

        $this->template->content = $content;
    }

    function save() {
        $user_id = Session::instance()->get("user_id");
        $id = $this->input->post("id");

        // validate
        $post = Validation::factory($_POST)
                        ->add_rules("order_repair_computer_name", "required")
                        ->add_rules("order_repair_detail", "required");

        if ($post->validate()) {
            // insert
            if (empty($id)) {
                $order_repair = new Order_Repair_Model();
                $order_repair->order_repair_status = "wait";
                $order_repair->order_repair_created_date = kdate::now();
            } else {
                $order_repair = Order_Repair_Model::findById($id);
            }
            $order_repair->order_repair_computer_name = $this->input->post("order_repair_computer_name");
            $order_repair->order_repair_detail = $this->input->post("order_repair_detail");
            $order_repair->user_id = $user_id;
            $order_repair->save();

            url::redirect("order_repair/form");
        } else {
            // fail
            Session::instance()->set_flash("message", "โปรดกรอกข้อมูลให้ครบด้วย");

            $content = new View("order_repair/form");
            $content->order_repairs = Order_Repair_Model::findNoCompleteByUserId($user_id);
            $content->n = 1;

            $this->template->content = $content;
        }
    }

    function get_order() {
        $content = new View("order_repair/get_order");
        $content->order_repairs = Order_Repair_Model::findNoComplete();
        $content->n = 1;

        $this->template->content = $content;
    }

    function get_order_form($id) {
        $content = new View("order_repair/get_order_form");
        $content->order_repair = Order_Repair_Model::findById($id);

        $this->template->content = $content;
    }

    function get_order_save() {
        $id = $this->input->post("id");

        $order_repair = Order_Repair_Model::findById($id);
        $order_repair->order_repair_reason = $this->input->post("order_repair_reason");
        $order_repair->order_repair_will_complete_date = kdate::input_from_dropdown("order_repair_will_complete_date");
        $order_repair->order_repair_get_date = kdate::now();
        $order_repair->order_repair_status = "repair";
        $order_repair->service_id = Session::instance()->get("user_id");
        $order_repair->save();

        url::redirect("order_repair/get_order");
    }

    function my_order() {
        $content = new View("order_repair/my_order");
        $content->order_repairs = Order_Repair_Model::findRepair(Session::instance()->get("user_id"));
        $content->n = 1;

        $this->template->content = $content;
    }

    function detail($id, $render_template = true) {
        $content = new View("order_repair/detail");
        $content->order_repair = Order_Repair_Model::findById($id);
        $content->service = User_Model::findById($content->order_repair->service_id);
        $content->repair_records = Repair_Record_Model::findByOrderRepairId($id);
        $content->n = 1;

        if ($render_template == "false") {
            $content->render(true);
        } else {
            $this->template->content = $content;
        }
    }

    function record($id) {
        $content = new View("order_repair/record");
        $content->order_repair = Order_Repair_Model::findById($id);
        $content->service = User_Model::findById($content->order_repair->service_id);
        $content->repair_records = Repair_Record_Model::findByOrderRepairId($id);
        $content->n = 1;

        $this->template->content = $content;
    }

    function record_save() {
        $order_repair_id = $this->input->post("order_repair_id");

        $post = Validation::factory($_POST)
                        ->add_rules("repair_record_detail", "required");

        if ($post->validate()) {
            $repair_record = new Repair_Record_Model();
            $repair_record->order_repair_id = $order_repair_id;
            $repair_record->repair_record_created_date = kdate::now();
            $repair_record->repair_record_detail = $this->input->post("repair_record_detail");
            $repair_record->save();
        } else {
            Session::instance()->set_flash("message", "โปรดกรอกข้อมูลให้ครบด้วย");
        }
        url::redirect("order_repair/record/$order_repair_id");
    }

    function complete($id) {
        $order_repair = Order_Repair_Model::findById($id);
        $order_repair->order_repair_status = "complete";
        $order_repair->order_repair_complete_date = kdate::now();
        $order_repair->save();

        url::redirect("order_repair/my_order");
    }

    function search_by_computer_name() {
        $order_repair_computer_name = $this->input->post("order_repair_computer_name");

        $content = new View("order_repair/search_by_computer_name");
        if (!empty($order_repair_computer_name)) {
            $content->order_repairs = Order_Repair_Model::findByComputerName($order_repair_computer_name);
            $content->n = 1;
        }
        $content->order_repair_computer_name = $order_repair_computer_name;

        $this->template->content = $content;
    }

    function history_user() {
        $user_id = Session::instance()->get("user_id");
        $year = $this->input->post("search_year");

        if (empty($year)) {
            $year = date("Y");
        }

        $order_repairs = Order_Repair_Model::findByUserIdAndYear($user_id, $year);
        $content = new View("order_repair/history_user");
        $content->n = 1;
        $content->order_repairs = $order_repairs;

        $this->template->content = $content;
    }

    function report_repair() {
        $search_status = $this->input->post("search_status");

        $content = new View("order_repair/report_repair");

        if (!empty($_POST)) {
            $_POST["from_date_year"] -= 543;
            $_POST["to_date_year"] -= 543;
            
            $from_date = "{$_POST['from_date_year']}-{$_POST['from_date_month']}-{$_POST['from_date_day']}";
            $to_date = "{$_POST['to_date_year']}-{$_POST['to_date_month']}-{$_POST['to_date_day']}";

            $sql = "
            SELECT 
                order_repairs.*,
                u.user_name AS user_name,
                s.user_name AS service_name
            FROM order_repairs
                INNER JOIN users u ON u.id = order_repairs.user_id
                LEFT JOIN users s ON s.id = order_repairs.service_id
            WHERE 1 > 0";

            if (!empty($search_status)) {
                $sql .= " AND order_repair_status = '{$search_status}'";
            }
            if (!empty($from_date)) {
                $sql .= " AND order_repair_created_date BETWEEN '{$from_date}' AND '{$to_date}'";
            }
            $sql .= " ORDER BY id DESC";
            $content->order_repairs = Database::instance()->query($sql);
        }
        $content->search_status = $search_status;
        $content->n = 1;

        $this->template->content = $content;
    }

    function state_repair() {
        $search_year = $this->input->post("year");

        if (empty($search_year)) {
            $search_year = date("Y");
        }

        $content = new View("order_repair/state_repair");
        $content->months = kdate::get_month_name();
        $content->search_year = $search_year;
        $content->month_index = 1;

        $this->template->content = $content;
    }

}

?>
