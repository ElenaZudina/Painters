<?php
ob_start();
?>
<h1><?php echo t('top_10_paintings_title'); ?> </h1>
<br>
<?php
ViewPaintings::PaintingsByStyle($arr);

$content = ob_get_clean();

include_once 'view/layout.php';

?>