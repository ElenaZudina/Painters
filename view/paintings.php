<?php
class ViewPaintings{
    public static function PaintingsByStyle($arr) {
        echo '<div class="painting-list-container">';
        foreach($arr as $value) {
            echo '<div class="painting-card">';
                echo '<div class="painting-image-wrapper">'; // Новая обертка
                    echo '<img src="data:image/jpeg;base64,'.base64_encode( $value['picture'] ).'" class="painting-image" alt="' . htmlspecialchars($value['title']) . '">'; // Изображение внутри обертки
                echo '</div>'; // Закрываем обертку
                echo '<h3>' . htmlspecialchars($value['title']) . '</h3>';
                Controller::CommentsCount($value['id']);
                echo '<a href="paintings?id=' . $value['id'] . '" class="btn-view-details">View details</a>';
            echo '</div>'; // Закрываем карточку
        }
        echo '</div>'; // Закрываем общий контейнер
    }

public static function AllPaintings($arr) {
    echo '<div class="painting-list-container">';
    foreach($arr as $value) {
        echo '<div class="painting-card">';
            echo '<div class="painting-image-wrapper">'; // Новая обертка
                echo '<img src="data:image/jpeg;base64,'.base64_encode( $value['picture'] ).'" class="painting-image" alt="' . htmlspecialchars($value['title']) . '">'; // Изображение внутри обертки
            echo '</div>'; // Закрываем обертку
            echo '<h3>' . htmlspecialchars($value['title']) . '</h3>';
            Controller::CommentsCount($value['id']);
            echo '<a href="paintings?id=' . $value['id'] . '" class="btn-view-details">View details</a>';
        echo '</div>'; // Закрываем карточку
    }
    echo '</div>'; // Закрываем общий контейнер
}
    public static function ViewPainting($n) {
        echo "<h2>".$n['title']."</h2>";
        Controller::CommentsCountWithAncor($n['id']);
        echo '<div class="painting-image-wrapper single-painting-image-wrapper">'; // Новая обертка для одиночной картины
            echo '<img src="data:image/jpeg;base64,'.base64_encode( $n['picture'] ).'" class="painting-image" alt="' . htmlspecialchars($n['title']) . '" />'; // Изображение внутри обертки
        echo '</div>'; // Закрываем обертку
        echo "<br><br>";
        echo "<p>".$n['artist_name']."</p>";
        echo "<p>".$n['year_created']."</p>";
        echo "<p>".$n['style_name']."</p>";
        echo "<p>".$n['description']."</p>";
    }
    // добавить методы вывода для других представленных новостей


}

?>