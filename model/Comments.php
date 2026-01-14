<?php
class Comments{
    public static function insertComment($c, $id) {
        $query = "INSERT INTO `comments` (`id`, `painting_id`, `text`, `date`) VALUES (NULL, '".$id."', '".$c."',
        CURRENT_TIMESTAMP)";
        $db = new Database();
        $q = $db->executeRun($query);
        return $q;   
    }
    public static function getCommentByPaintingID($id) {
        $query = "SELECT * FROM comments WHERE painting_id=".(string)$id." ORDER BY
        id DESC";
        $db = new Database();
        $arr = $db->getAll($query);
        return $arr;
    }

    public static function getCommentsCountByPaintingID($id) {
        $query = "SELECT count(id) as 'count' FROM comments WHERE painting_id=".(string)$id;
        $db = new Database();
        $c = $db->getOne($query);
        return $c;
    }
}