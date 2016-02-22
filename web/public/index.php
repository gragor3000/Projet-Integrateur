<!DOCTYPE html>
<?php session_start(); 
var_dump($_SESSION);
?>
<html>
    <!-- Application. -->
    <?php require_once "../app/init.php";
    $app = new App(); ?>
    
</html>
<?php var_dump($_SESSION); ?>