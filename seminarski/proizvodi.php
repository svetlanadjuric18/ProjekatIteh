<?php include 'inicijalizacija.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Dobule I Cokolade</title>

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
                        <h2>Nasi proizvodi</h2>
                    </div>
                    <button class="btn btn-info" onclick="sortiraj('r')">Sortiraj rastuce</button>
                    <button class="btn btn-danger"  onclick="sortiraj('o')">Sortiraj opadajuce</button>
                    <div id="tabelaProizvoda"></div>
                </div>
            </div>
        </div>
    </section>
  <?php include 'footer.php' ?>
<script>
function sortiraj(sortiranje){
  $.ajax({
    url: 'kontroler.php?uraditi=sortiranje&sort='+sortiranje,
    success: function(data){
      var output = '<table class="table table-hover">';
      output += '<thead>';
      output += '<tr>';
      output += '<th>Naziv</th>';
      output += '<th>Vrsta</th>';
      output += '<th>Cena</th>';
      output += '<th>Datum proizvodnje</th>';
      output += '<th>Slika</th>';
      output += '</tr>';
      output += '</thead>';
      output += '<tbody>';
      $.each(JSON.parse(data),function(i,podatak){
        output += '<tr>';
        output += '<td>'+podatak.naziv+'</td>';
        output += '<td>'+podatak.vrsta.naziv+'</td>';
        output += '<td>'+podatak.cena+' dinara</td>';
        output += '<td>'+podatak.datumProizvodnje+'</td>';
        output += '<td><a href="slike/'+podatak.slika+'"><img src="slike/'+podatak.slika+'" class="img img-responsive" width="100px" height="200px"></a></td>';
        output += '</tr>';
      });
      output += '</tbody>';
      output += '</table>';

      $("#tabelaProizvoda").html(output);
    }
  });
}

sortiraj('r');
</script>
</body>

</html>
