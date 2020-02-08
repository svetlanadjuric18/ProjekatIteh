<?php include 'inicijalizacija.php';
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

    <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

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
                      <label for="naslov">Naslov</label>
                      <input type="text" name="naslov" id="naslov" class="form-control" placeholder="Unesite naslov">
                      <label for="autor">Autor</label>
                      <input type="text" name="autor" id="naslov" class="form-control" placeholder="Unesite autora">
                      <label for="tekst">Tekst</label>
                      <textarea type="text" name="tekst" id="tekst" class="form-control" placeholder="Unesite tekst"></textarea>
                      <br/>
                      <input type="submit" value="Unesite vest" name="novaVest" class="btn btn-success" >
                    </form>
                    <?php
                          if(isset($_GET['poruka']) &&  $_GET['poruka']){
                            echo '<h2>'.$_GET['poruka'].'</h2>';
                          }
                      ?>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                  <table id="tabela" class="table table-hover">
                    <thead>
                      <tr>
                        <th>Naslov</th>
                        <th>Autor</th>
                        <th>Datum objave</th>
                        <th>Opcije</th>
                      </tr>
                    </thead>
                    <?php
                        $vest = new Vest();
                        $vesti = $vest->vratiPodatke($konekcija);
                        foreach ($vesti as $v) {
                          ?>
                          <tr>
                            <td><?= $v->getNaslov() ?></td>
                            <td><?= $v->getAutor() ?></td>
                            <td><?= $v->getDatumObjave() ?></td>
                            <td><a href="obrisi.php?id=<?= $v->getVestID()?>" class="btn btn-danger">Obrisi </a>
                              <a href="izmeni.php?id=<?= $v->getVestID()?>" class="btn btn-success">Izmeni </a> </td>
                          </tr>
                          <?php
                        }
                    ?>
                    <tbody>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <form action="upload.php" method="post" enctype="multipart/form-data">
                    <label for="naziv">Naziv</label>
                    <input type="text" name="naziv" id="naziv" class="form-control" placeholder="Unesite naziv">
                    <label for="cena">Cena</label>
                    <input type="number" name="cena" id="cena" class="form-control" placeholder="Unesite cenu">
                    <label for="datumProizvodnje">Datum proizvodnje</label>
                    <input type="text" name="datumProizvodnje" id="datumProizvodnje" class="form-control" placeholder="Unesite datum proizvodnje u formatu (yyyy-MM-dd)">
                    <label for="vrsta">Vrsta</label>
                    <select id="vrsta" name="vrsta" class="form-control">
                      <?php
                        //$vrste = Vrsta::vratiSveVrste($konekcija);
                        $zahtev = curl_init("http://localhost/cokolade/flight/vrste");
                        curl_setopt($zahtev, CURLOPT_RETURNTRANSFER, true);
                        $odgovor = curl_exec($zahtev);
                        $vrste=json_decode($odgovor, true);
                        curl_close($zahtev);
                        foreach($vrste as $vrsta){

                          ?>
                          <option value="<?= $vrsta['vrstaID'] ?>"><?= $vrsta['nazivVrste'] ?></option>
                          <?php
                        }
                      ?>
                    </select>
                    <br/>
                    <label for="fileToUpload">Slika</label>
                    <input type="file" name="fileToUpload" class="form-control" id="fileToUpload">
                    <input type="submit" value="Sacuvaj cokoladu" name="submit" class="btn btn-success">
                  </form>
                </div>
              </div>

              <div class="row">
                <div class="col-12">
                  <div id="grafik"> </div>
                </div>
              </div>
        </div>

    </section>
  <?php include 'footer.php' ?>
  <script type="text/javascript" src="https://www.google.com/jsapi"></script>
  <script type="text/javascript">
       google.load('visualization', '1', {'packages':['corechart']});
       google.setOnLoadCallback(crtajGrafikA);

        function crtajGrafikA() {
          var jsonData = $.ajax({
          url: "kontroler.php?uraditi=grafikA",
          dataType:"json",
          async: false
        }).responseText;
        var data = new google.visualization.DataTable(jsonData);
        console.log(jsonData);
        var options = {'title':'Broj komentara po vesti',
         backgroundColor: { fill:'transparent' },
          titleTextStyle: {
              textAlign: 'center',
              color: 'black',
              fontSize: 24},
            'width':600,
            'height':600,
        pieHole: 0.1,
        };

        var chart = new google.visualization.PieChart(document.getElementById('grafik'));
        function selectHandler() {
            var selectedItem = chart.getSelection()[0];
            if (selectedItem) {
              alert( data.getValue(selectedItem.row,0));
            }
          }
          google.visualization.events.addListener(chart, 'select', selectHandler);

        chart.draw(data,  options);

        }

      </script>

      <script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
      <script>
      $(document).ready( function () {
        $('#tabela').DataTable();
      } );
      </script>
</body>

</html>
