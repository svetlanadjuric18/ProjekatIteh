<?php
include 'inicijalizacija.php';


if(isset($_POST['login'])){
  $username = $konekcija->real_escape_string(trim($_POST['username']));
  $password = $konekcija->real_escape_string(trim($_POST['password']));

  $user = new User();
  $user->setUsername($username);
  $user->setPassword($password);

  $uspesno = $user->login($konekcija);

  if($uspesno){
    header('Location: login.php?poruka=Uspesno ulogovan korisnik');
  }else{
    header('Location: login.php?poruka=Ne postoji korisnik sa datim podacima');
  }
}

if(isset($_POST['register'])){
  $username = $konekcija->real_escape_string(trim($_POST['username']));
  $password = $konekcija->real_escape_string(trim($_POST['password']));
  $ime = $konekcija->real_escape_string(trim($_POST['ime']));
  $prezime = $konekcija->real_escape_string(trim($_POST['prezime']));

  $user = new User();
  $user->setUsername($username);
  $user->setPassword($password);
  $user->setIme($ime);
  $user->setPrezime($prezime);

  $uspesno = $user->registruj($konekcija);

  if($uspesno){
    header('Location: registracija.php?poruka=Uspesno registrovan korisnik');
  }else{
    header('Location: registracija.php?poruka=Neuspesno registrovan korisnik');
  }
}

if(isset($_POST['noviKomentar'])){
  $komentari = $konekcija->real_escape_string(trim($_POST['komentar']));
  $idVesti = $konekcija->real_escape_string(trim($_POST['idVesti']));
  $userID = $konekcija->real_escape_string(trim($_SESSION['ulogovaniUser']->getId()));

  $komentar = new Komentar();
  $komentar->setVest($idVesti);
  $komentar->setKomentar($komentari);
  $komentar->setUser($userID);

  if($komentar->sacuvaj($konekcija)){
    header('Location: vest.php?id='.$idVesti);
  }else{
    header('Location: vesti.php');
  }
}

if(isset($_POST['novaVest'])){
  $tekst = $konekcija->real_escape_string(trim($_POST['tekst']));
  $autor = $konekcija->real_escape_string(trim($_POST['autor']));
  $naslov = $konekcija->real_escape_string(trim($_POST['naslov']));
  $datumObjave = date('Y-m-d H:i:s');

  $vest = new Vest();
  $vest->setAutor($autor);
  $vest->setNaslov($naslov);
  $vest->setTekst($tekst);
  $vest->setDatumObjave($datumObjave);

  if($vest->sacuvaj($konekcija)){
    header('Location: adminStrane.php?poruka=Uspesno sacuvana vest');
  }else{
    header('Location: adminStrane.php?poruka=Neuspesno sacuvana vest');
  }
}

if(isset($_POST['izmena'])){
  $tekst = $konekcija->real_escape_string(trim($_POST['tekst']));
  $autor = $konekcija->real_escape_string(trim($_POST['autor']));
  $naslov = $konekcija->real_escape_string(trim($_POST['naslov']));
  $datumObjave = date('Y-m-d H:i:s');
  $vestID = $konekcija->real_escape_string(trim($_POST['vestID']));

  $vest = new Vest();
  $vest->setVestID($vestID);
  $vest->setAutor($autor);
  $vest->setNaslov($naslov);
  $vest->setTekst($tekst);
  $vest->setDatumObjave($datumObjave);

  if($vest->izmeni($konekcija)){
    header('Location: adminStrane.php?poruka=Uspesno izmenjena vest');
  }else{
    header('Location: adminStrane.php?poruka=Neuspesno izmenjena vest');
  }
}


if(isset($_GET['uraditi']) && $_GET['uraditi'] === 'sortiranje'){
  $sort = $_GET['sort'];
  $cokolada = new Cokolada();
  echo json_encode($cokolada->vratiPodatkeSortirano($sort,$konekcija));
}

if(isset($_GET['uraditi']) && $_GET['uraditi'] === 'vest'){
  $vest = new Vest();
  echo json_encode($vest->vratiPodatke($konekcija));
}


  if(isset($_GET['uraditi']) && $_GET['uraditi'] === 'komentari'){
    $idVesti = $_GET['idVesti'];
    $komentar = new Komentar();
    $komentar->vest = $idVesti;
    echo json_encode($komentar->vratiPodatke($konekcija));
  }

  if(isset($_GET['uraditi']) && $_GET['uraditi'] === 'grafikA'){
    $array['cols'][] = array('label' => 'Vest','type' => 'string');
    $array['cols'][] = array('label' => 'Broj komentara', 'type' => 'number');

    $sql="SELECT v.naslov,count(k.komentarID) AS brojKomentara FROM vest v JOIN komentar k ON (v.vestID=k.vestID) GROUP BY v.vestID";
      $rezultat = $konekcija->query($sql);
      $niz = [];

      while($red = $rezultat->fetch_assoc()){
        $niz[] = $red;
      }
      foreach ($niz as $n) {
        $array['rows'][] = array('c' => array( array('v'=>$n["naslov"]),array('v'=>(int)$n["brojKomentara"])) );
      }
      $niz_json = json_encode ($array);
      echo ($niz_json);

  }

 ?>
