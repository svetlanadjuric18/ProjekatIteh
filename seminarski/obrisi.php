<?php
include 'inicijalizacija.php';
$vestID= $_GET['id'];

$vest = new Vest();
$vest->obrisi($vestID,$konekcija);
header('Location: adminStrane.php');
 ?>
