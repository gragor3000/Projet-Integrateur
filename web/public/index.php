<!DOCTYPE html>

<!-- Entête du site web. -->
<?php include '../app/views/shared/header.php'; ?>

<html>
<!-- Menu du site web. -->    
<?php include '../app/views/shared/menu.php'; ?>

<!-- Application du MVC. -->
<?php require_once "../app/init.php"; $app = new App(); ?>
</html>