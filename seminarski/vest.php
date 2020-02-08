<?php include 'inicijalizacija.php';

$idVesti = intval($_GET['id']);

$vest = Vest::vratiVestPoIdu($idVesti,$konekcija);

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

    <div class="blog-wrapper section-padding-80">
        <div class="container">

                <?php
                    if($vest !== null){
                      ?>
                      <div><h1><?php echo $vest->naslov ?></h1></div>
                      <div><h5>Autor: <?php echo $vest->autor ?></h5></div>
                      <div><h5>Datum objave: <?php echo $vest->datumObjave ?></h5></div>
                      <div><p><?php echo $vest->tekst ?></p></div>

                      <?php
                    }else{
                      ?>
                        <div><h1>Ne postoji vest sa tim IDem</h1></div>
                      <?php
                    }
                 ?>
                 <div id="tabelaKomentari"></div>

                 <?php

                 if($_SESSION['ulogovaniUser']->ulogovan === true){
                    ?>
                      <form method="POST" action="kontroler.php">
                          <input type="hidden" name="idVesti" value="<?php echo $idVesti; ?>" id="idVesti" />
                          <label> Komentar</label>
                          <textarea name="komentar" class="form-control"> </textarea>
                          <input type="submit" class="btn btn-info" name="noviKomentar" value="Unesi komentar">
                      </form>
                    <?php
                 }else{
                   echo 'Morate se ulogovati da biste komentarisali';
                   ?>
                   <input type="hidden" name="idVesti" value="<?php echo $idVesti; ?>" id="idVesti" />
                   <?php
                 }

                  ?>
        </div>
    </div>
  <?php include 'footer.php' ?>
</body>
<script>
    function vratiKomentare(){
      var id = $("#idVesti").val();
      $.ajax({
        url: 'kontroler.php?uraditi=komentari&idVesti='+id,
        success: function(data){
          var output = '';
          if(data.length > 2){
            output += '<table class="table table-hover">'
            output += '<thead>';
            output += '<tr>';
            output += '<th>Napisao</th>';
            output += '<th>Vreme komentarisanja</th>';
            output += '<th>Komentar</th>';
            output += '</tr>';
            output += '</thead>';
            output += '<tbody>';
            $.each(JSON.parse(data),function(i,podatak){
              output += '<tr>';
              output += '<td>'+podatak.user.ime + ' ' + podatak.user.prezime+'</td>';
              output += '<td>'+podatak.vremeKomentarisanja+'</td>';
              output += '<td>'+podatak.komentar+' </td>';
              output += '</tr>';
            });
            output += '</tbody>';
            output += '</table>';
          }else{
            output += 'Nema komentara za datu vest';
          }


          $("#tabelaKomentari").html(output);
        }
      });
    }

    vratiKomentare();
</script>
</html>
