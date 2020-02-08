<?php

include 'klase/ulogaClass.php';
include 'klase/userClass.php';
include 'klase/vrstaClass.php';
include 'klase/cokoladaClass.php';
include 'klase/vestClass.php';
include 'klase/komentarClass.php';

include 'konekcija.php';
session_start();
if(!isset($_SESSION['ulogovaniUser'])){
  $user = new User();
  $user->ulogovan = false;
  $_SESSION['ulogovaniUser'] = $user;
}

 ?>
