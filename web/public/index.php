<!DOCTYPE html>

<!-- Entête du site web. -->
<?php include '../app/views/shared/header.php'; ?>

<html>
<a id="top"></a>
<!-- Menu du site web. -->    
<?php include '../app/views/shared/menu.php'; ?>
<!-- Application du MVC. -->
<?php require_once "../app/init.php"; $app = new App(); ?>
<!--Lien vers le haut de page. -->
<?php include '../app/views/shared/footer.php'; ?>
</html>