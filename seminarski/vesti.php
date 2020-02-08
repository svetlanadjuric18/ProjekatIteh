<?php include 'inicijalizacija.php' ?>
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
            <div id="vesti" class="row">

            </div>
        </div>
    </div>
  <?php include 'footer.php' ?>
<script>
function sortiraj(sortiranje){
  $.ajax({
    url: 'kontroler.php?uraditi=vest',
    success: function(data){
        var output = '';
      $.each(JSON.parse(data),function(i,podatak){

        var skraceno = podatak.tekst.substring(200,0);
        skraceno += "...";

        output += '<div class="col-12 col-lg-6">';
        output += '<div class="post-title">>';
        output += '<a href="vest.php?id='+podatak.vestID+'"><h4>'+podatak.naslov+'</h4></a>';
        output += '</div>';
        output += '<p>'+skraceno+'</p>';
        output += '<a href="vest.php?id='+podatak.vestID+'"> <i>nastavi citanje</i> <i class="fa fa-angle-right"></i></a>';
        output += '</div>';
        output += '</div>';
        output += '</div>';
      });


      $("#vesti").html(output);
    }
  });
}

sortiraj('r');
</script>
</body>

</html>
