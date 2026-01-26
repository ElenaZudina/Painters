<?php
class modelAdminStyle {
    //---------List
    public static function getStyleList() {
        $sql = "SELECT * FROM styles ORDER BY styles.name ASC";
        $db = new Database();
        //$rows = массив данных
        $rows = $db->getAll($sql);
        //--------
        return $rows;
    }
}