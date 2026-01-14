<?php ob_start() ?>
<h2>404 Error</h2>
<article>
    <h3>404 Error - What is it?</h3>
    <p>The page you requested was not found/p>
</article>
<?php $content = ob_get_clean(); ?>

<?php include "viewAdmin/templates/layout.php";