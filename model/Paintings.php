<?php
class Paintings{
    public static function getLast10Paintings() {
        global $current_lang;
        $title_field = 'title_' . $current_lang;
        $description_field = 'description_' . $current_lang;
        $query = "SELECT id, picture, style_id, artist_id, user_id, $title_field AS title, $description_field AS description FROM paintings ORDER BY id DESC LIMIT 10";
        $db = new Database();
        $arr = $db->getAll($query);
        return $arr;
    }

    public static function getAllPaintings() {
        global $current_lang;
        $title_field = 'title_' . $current_lang;
        $description_field = 'description_' . $current_lang;
        $query = "SELECT id, picture, style_id, artist_id, user_id, $title_field AS title, $description_field AS description FROM paintings ORDER BY id DESC";
        $db = new Database();
        $arr = $db->getAll($query);
        return $arr;
    }

    public static function getPaintingsByStyleID($id) {
        global $current_lang;
        $title_field = 'title_' . $current_lang;
        $description_field = 'description_' . $current_lang;
        $query = "SELECT id, picture, style_id, artist_id, user_id, $title_field AS title, $description_field AS description FROM paintings where style_id=".(string)$id." ORDER BY id DESC";
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
        global $current_lang;
        $title_field = 'title_' . $current_lang;
        $description_field = 'description_' . $current_lang;
        $query = "SELECT
                    paintings.*,
                    styles.name AS style_name,
                    artists.name as artist_name,
                    users.username,
                    paintings.$title_field AS title,
                    paintings.$description_field AS description
                  FROM paintings, styles, artists, users
                  WHERE paintings.style_id=styles.id
                    AND paintings.artist_id=artists.id
                    AND paintings.user_id=users.id
                    AND paintings.id=".$id;
        $db = new Database();
        $arr = $db->getOne($query);
        return $arr;
    }
}
?>