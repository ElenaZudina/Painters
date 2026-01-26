<?php
class controllerAdminPaintings {
    //list Paintings
    public static function PaintingsList() {
        $arr=modelAdminPaintings::getPaintingsList();
        include_once 'viewAdmin/paintingsList.php';
    }
    //--------add
    public static function paintingAddForm() {
        $styles = modelAdminStyle::getStyleList();
        $artists = modelAdminPaintings::getArtistList();
        include_once('viewAdmin/paintingAddForm.php');
    }

    public static function paintingAddResult() {
        $test = modelAdminPaintings::getPaintingAdd();
        include_once('viewAdmin/paintingAddForm.php');
    }
    //------------edit
    public static function paintingEditForm($id) {
        $styles = modelAdminStyle::getStylelist();
        $artists = modelAdminPaintings::getArtistList();
        $detail = modelAdminPaintings::getPaintingDetail($id);
        include_once('viewAdmin/paintingEditform.php');
    }
    public static function paintingEditResult($id) {
        $test = modelAdminPaintings::getPaintingEdit($id);
        include_once('viewAdmin/paintingEditForm.php');
    }/*
    //-------delete
    public static function newsDeleteForm($id) {
        $arr = modelAdminCategory::getCategoryList();
        $detail = modelAdminNews::getNewsDetail($id);
        include_once('viewAdmin/newsDeleteForm.php');
    }
    public static function newsDeleteResult($id) {
        $test = modelAdminNews::getNewsDelete($id);
        include_once('viewAdmin/newsDeleteForm.php');
    }*/
}
