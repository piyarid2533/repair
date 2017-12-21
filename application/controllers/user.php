<?php

class User_Controller extends Template_Controller {

    function index() {
        $content = new View("user/index");
        $content->set("user_username", "");

        $this->template->content = $content;
    }

    function login() {
        $user = ORM::factory("user")
                        ->where("user_username", $this->input->post("user_username"))
                        ->where("user_password", $this->input->post("user_password"))
                        ->find();

        if (!empty($user->id)) {
            // pass
            Session::instance()->set("user_id", $user->id);
            Session::instance()->set("user_level", $user->user_level);
            
            url::redirect("user/home");
        } else {
            // fail
            Session::instance()->set_flash("message", "username invalid");

            $content = new View("user/index");
            $content->set("user_username", $this->input->post("user_username"));

            $this->template->content = $content;
        }
    }

    function home() {
        $content = new View("user/home");
        $this->template->content = $content;
    }

    function logout() {
        Session::instance()->delete("user_id");
        url::redirect("user/index");
    }

    function view($id = null) {
        $content = new View("user/view");

        if (!empty($id)) {
            $content->user = User_Model::findById($id);
        }

        $content->users = User_Model::findAll();
        $content->n = 1;

        $this->template->content = $content;
    }

    function delete($id) {
        ORM::factory("user")->delete($id);
        url::redirect("user/view");
    }

    function save() {
        $fail = false;
        $id = $this->input->post("id");

        // validator
        if (empty($id)) {
            $post = Validation::factory($_POST)
                            ->add_rules("user_name", "required")
                            ->add_rules("user_email", "required", "email")
                            ->add_rules("user_tel", "required")
                            ->add_rules("user_username", "required")
                            ->add_rules("user_password", "required")
                            ->add_rules("user_password_confirm", "required");
        } else {
            $post = Validation::factory($_POST)
                            ->add_rules("user_name", "required")
                            ->add_rules("user_email", "required", "email")
                            ->add_rules("user_tel", "required")
                            ->add_rules("user_username", "required");
        }

        if ($post->validate()) {
            // pass
            if ($this->input->post("user_password") == $this->input->post("user_password_confirm")) {


                if (empty($id)) {
                    $user = new User_Model();
                    $user->user_created_date = kdate::now();
                    $user->user_password = $this->input->post("user_password");
                } else {
                    $user = User_Model::findById($id);
                    if ($this->input->post("user_password") != "") {
                        $user->user_password = $this->input->post("user_password");
                    }
                }
                $user->user_name = $this->input->post("user_name");
                $user->user_email = $this->input->post("user_email");
                $user->user_username = $this->input->post("user_username");
                $user->user_level = $this->input->post("user_level");
                $user->user_tel = $this->input->post("user_tel");
                $user->save();

                url::redirect("user/view");
            } else {
                $fail = true;
            }
        } else {
            $fail = true;
        }

        if ($fail) {
            // fail
            Session::instance()->set_flash("message", "โปรดกรอกข้อมูลให้ครบด้วย");

            $fields = array(
                "n" => 1,
                "users" => User_Model::findAll(),
                "user_name" => $this->input->post("user_name")
            );
            $content = new View("user/view");
            $content->set($fields);

            $this->template->content = $content;
        }
    }

}

?>
