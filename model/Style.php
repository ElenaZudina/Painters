<?php
class Style {

    public static function getAllStyle() {
        $query = "SELECT * FROM styles" ;
        $db = new Database();
        $arr = $db->getAll($query);
        return $arr;
    }
}