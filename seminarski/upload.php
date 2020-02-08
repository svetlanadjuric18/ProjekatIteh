<?php
include 'inicijalizacija.php';
$direktorijum = "slike/";
$fajl = $direktorijum . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = strtolower(pathinfo($fajl,PATHINFO_EXTENSION));

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Fajl nije slika";
    die();
}

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $fajl)) {
  $naziv = $konekcija->real_escape_string(trim($_POST['naziv']));
  $datumProizvodnje = $konekcija->real_escape_string(trim($_POST['datumProizvodnje']));
  $cena = $konekcija->real_escape_string(trim($_POST['cena']));
  $vrsta = $konekcija->real_escape_string(trim($_POST['vrsta']));

  $cokolada = new Cokolada();
  $cokolada->naziv = $naziv;
  $cokolada->datumProizvodnje=$datumProizvodnje;
  $cokolada->cena=$cena;
  $cokolada->vrsta = $vrsta;
  $cokolada->slika = basename($_FILES["fileToUpload"]["name"]);

  if($cokolada->save($konekcija)){
    header("Location: proizvodi.php");
  }else{
    echo "Neuspesno sacuvana cokolada, javite se adminu sajta.";
  }

} else {
    echo "Neuspesn upload slike";
    die();
}

?>
