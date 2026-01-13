<?php
class Paintings{
    public static function getLast10Paintings() {
        $query = "SELECT * FROM paintings ORDER BY id DESC LIMIT 10";
        $db = new Database();
        $arr = $db->getAll($query);
        return $arr;
    }

    public static function getAllPaintings() {
        $query = "SELECT * FROM paintings ORDER BY id DESC";
        $db = new Database();
        $arr = $db->getAll($query);
        return $arr;
    }

    public static function getPaintingsByStyleID($id) {
        $query = "SELECT * FROM paintings where style_id=".(string)$id." ORDER BY id DESC";
        $db = new Database();
        $arr = $db->getAll($query);
        return $arr;
    }

    public static function getPaintingByID($id) {
        $query = "SELECT * FROM paintings where id=".(string)$id;
        $db = new Database();
        $n = $db->getOne($query);
        return $n;
    }
}
?>