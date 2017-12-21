<?php

class User_Model extends ORM {

    public static function findAll() {
        return ORM::factory("user")->orderby("id", "DESC")->find_all();
    }

    public static function findById($id) {
        return ORM::factory("user")->find($id);
    }

}

?>
