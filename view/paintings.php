<?php
class ViewPaintings{
    public static function PaintingsByStyle($arr) {
        foreach($arr as $value) {
            echo '<img src="data:image/jpeg;base64,'.base64_encode( $value['picture'] ).'" width=150 /><br>';
            echo "<h2>".$value['title']."</h2>";
            Controller::CommentsCount($value['id']);
            echo "<a href='paintings?id=".$value['id']."'>Edasi</a><br>";
        }
    }

    public static function AllPaintings($arr) {
        foreach($arr as $value) {
            echo "<li>".$value['title'];
            Controller::CommentsCount($value['id']);
            echo "<a href='paintings?id=".$value['id']."'>Edasi</a></li><br>";
        }
    }

    public static function ViewPainting($n) {
        echo "<h2>".$n['title']."</h2>";
        Controller::CommentsCountWithAncor($n['id']);
        echo '<br><img src="data:image/jpeg;base64,'.base64_encode( $n['picture'] ).'" width=150 /><br>';
        echo "<p>".$n['description']."</p>";
    }

    // добавить методы вывода для других представленных новостей


}

?>