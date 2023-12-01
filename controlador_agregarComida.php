<?php

include "Auth.php";
$comida=$_POST['busqueda'];

$Auth = new Auth();

$Auth->buscarAlimentos($comida);

?>