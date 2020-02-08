<?php include 'inicijalizacija.php';

$vestID= $_GET['id'];

$vest = new Vest();

$vestIzmena = $vest->vratiVestPoIdu($vestID, $konekcija);
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Double I Cokolade</title>

    <link rel="icon" href="img/core-img/favicon.ico">

    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <?php include 'header.php' ?>

    <section class="new_arrivals_area section-padding-80 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center">
                        <h2>Admin stranice</h2>
                    </div>
                    <form method="POST" action="kontroler.php">
                        <input type="hidden" name="vestID" value="<?php echo $vestIzmena->getVestID(); ?>" id="vestID" />
                      <label for="naslov">Naslov</label>
                      <input type="text" name="naslov" id="naslov" class="form-control" placeholder="Unesite naslov" value="<?= $vestIzmena->getNaslov() ?>">
                      <label for="autor">Autor</label>
                      <input type="text" name="autor" id="naslov" class="form-control" placeholder="Unesite autora" value="<?= $vestIzmena->getAutor() ?>">
                      <label for="tekst">Tekst</label>
                      <textarea type="text" name="tekst" id="tekst" class="form-control" placeholder="Unesite tekst"><?= $vestIzmena->getTekst() ?></textarea>
                      <br/>
                      <input type="submit" value="Izmenite vest" name="izmena" class="btn btn-success" >
                    </form>
                    <?php
                          if(isset( $_GET['poruka']) && $_GET['poruka']){
                            echo '<h2>'.$_GET['poruka'].'</h2>';
                          }
                      ?>
                </div>
            </div>
        </div>
    </section>
  <?php include 'footer.php' ?>

</body>

</html>
