<?php
ob_start();
?>

<br>

<?php
ViewPaintings::ViewPainting($n);

echo "<br>";

echo '<div class="comments-section">';
Controller::Comments($_GET['id']);
echo "<br>";
ViewComments::CommentsForm();
echo '</div>';

$content = ob_get_clean();
include_once 'view/layout.php';

?>