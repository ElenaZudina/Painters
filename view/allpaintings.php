<?php
ob_start();
?>
<h1><?php echo t('all_paintings_title'); ?> </h1>
<br>

<?php
ViewPaintings::AllPaintings($arr);
$content = ob_get_clean();
include_once 'view/layout.php';

?>