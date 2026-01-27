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

    /*public static function getPaintingByID($id) {
        $query = "SELECT * FROM paintings where id=".(string)$id;
        $db = new Database();
        $n = $db->getOne($query);
        return $n;
    }*/

     public static function getPaintingByID($id) {
        $query = "SELECT paintings.*, styles.name AS style_name, artists.name as artist_name, users.username from paintings, styles, artists, users
        WHERE paintings.style_id=styles.id AND paintings.artist_id=artists.id AND paintings.user_id=users.id and paintings.id=".$id;
        $db = new Database();
        $arr = $db->getOne($query);
        return $arr;
    }
}
?>