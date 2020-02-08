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
                        <h2>Login forma</h2>
                    </div>
                    <form method="POST" action="kontroler.php">
                      <label for="username">Username</label>
                      <input type="text" name="username" id="username" class="form-control" placeholder="Unesite username">
                      <label for="password">Password</label>
                      <input type="password" name="password" id="password" class="form-control" placeholder="Unesite password">
                      <br/>
                      <input type="submit" value="Uloguj se" name="login" class="btn btn-success" >
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

</body>

</html>
