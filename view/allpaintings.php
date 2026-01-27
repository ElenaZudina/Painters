<?php
ob_start();
?>
<h1>All paintings </h1>
<br>

<?php
ViewPaintings::AllPaintings($arr);
$content = ob_get_clean();
include_once 'view/layout.php';

?>