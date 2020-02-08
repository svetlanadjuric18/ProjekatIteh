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

    <section class="new_arrivals_area section-padding-80 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center">
                        <h2>Registraciona forma</h2>
                    </div>
                    <form method="POST" action="kontroler.php">
                      <label for="ime">Ime</label>
                      <input type="text" name="ime" id="ime" class="form-control" placeholder="Unesite ime">
                      <label for="prezime">Prezime</label>
                      <input type="text" name="prezime" id="prezime" class="form-control" placeholder="Unesite prezime">
                      <label for="username">Username</label>
                      <input type="text" name="username" id="username" class="form-control" placeholder="Unesite username">
                      <label for="password">Password</label>
                      <input type="password" name="password" id="password" class="form-control" placeholder="Unesite password">
                      <br/>
                      <input type="submit" value="Registruj se" name="register" class="btn btn-success" >
                    </form>
                    <?php
                          if( isset( $_GET['poruka']) && $_GET['poruka']){
                            echo '<h2>'.$_GET['poruka'].'</h2>';
                          }
                      ?>
                </div>
            </div>
        </div>
    </section>
  <?php include 'footer.php' ?>
<script>

    var success = function(data){
                var html = [];
                /* parse JSON */
                data = $.parseJSON(data);
                console.log(data);
            };
  $.ajax({
    url: 'https://www.passwordrandom.com/query?command=password&format=json&count=1',
    dataType: "jsonp",
          crossDomain: true,
          cache:false,
          success: success,
  });
</script>
</body>

</html>
