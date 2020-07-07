<?php
try
{
    $bdd = new PDO('mysql:host=aubega.com.mysql;dbname=aubega_com', 'aubega_com', 'gDaxdNL2');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>