<?php include 'inicijalizacija.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Double I cokolade</title>

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
                        <h2>Istorija čokolade</h2>
                    </div>
                    <p>Prvi zapisi o čokoladi vode nas na jug današnjeg Meksika. Oko 4. veka n.e. ovo područje je naselilo pleme Maja. Kakao drvo koje su tamo zatekli nazvali su ''cacahuaquchtl''</p>
                    <img src="img/cokolada.jpg" class="img img-responsive mainSlika">
                    <hr>
                    <p>
                    Verovali su da drvo pripada bogovima i da su plodovi kakao drveta božiji dar ljudima. Oko 300. g. Nove ere, Maje su, u najvećem usponu svog carstva, gradeći dvorce i hramove, urezivali na ''svetim'' zidovima slike kakao ploda kao simbol života i plodnosti. U carstvu Maja nastao je prvi put napitak od kakao zrna. To je bilo piće kraljeva i gospode, služeno da uveliča svečanosti i rituale. Gorkom piću se dodavala čili paprika. Nakon misterioznog nestanka civilizacije Maja, oko 900 g. Nove ere područje naseljavaju Tolteci, i kasnije Asteci. Kralj Tolteka, Quetzalcoatl, politički prisiljen da napusti kraljevstvo, otplovio je malim čamcem, uz obećanje da će se određene godine vratiti da povrati svoje carstvo.Legenda o njegovom carstvu je postala deo mitologije. Astrolozi Asteka su predvideli da će godina njegovog povratka biti 1519. Tačno 1519. na tlo tadašnjeg carstva Asteka brodom je stigao španski konkvistador Kortez.Astečki kralj Montezuma I je poverovao da je Kortez reinkarnacija Quezalcoatla i dočekao ga je sa najvećim počastima. Priredio je slavlje na kome je kao najveća počast služen napitak od kakaovca. Kortez je odmah shvatio veliki potencijal kakao zrna. Čvrsto je verovao da je našao ''zlato'' za kojim je krenuo. Za Korteza je ovo bilo i u bukvalnom smislu. Naime, po istorijskim beleškama, Montezuma je ispijao dnevno po pedeset vrčeva kakao napitka. Uvek je pio iz zlatnog pehara i bacao pehar u jezero. Tako je Kortez i bukvalno pronašao ''zlatno jezero''.U to vreme se u imperiji Asteka za 100 zrna kakaoa mogao kupiti zdrav i jak rob, za 4 zrna zec, a mlada i zgodna devojka za zabavu naplaćivala je svoje usluge 10 zrna. Kortez je bacivši Montezumu u zatvor, ubrzo organizovao podizanje plantaža kakao drveta. Španci su podigli plantaže u Meksiku, Ekvadoru, Peruu. Godine 1580. u Španiji je osnovan prvi pogon za preradu kakao zrna.Španci su prvi put dodali šećer i cimet. ''Chocolaterias'' kuće za služenje čokolade su počele da niču širom Španije. Odatle se preko Holandije i Italije širi Evropom kao nova moda u visokim slojevima društva. Dodaju se razni začini kao čili, karanfilić, vanila, crni biber.U procesu pravljenja napitka, velike probleme je stvarao kakao buter, ostajući na površini napitka kao masna smesa. Van Houten, holandski hemičar je 1828. smislio hidrauličnu presu pomoću koje je uspeo da iz kakao zrna izdvoji kakao buter s jedne strane i tamno braon pogaču kakao praha. On je ovaj prah tretirao alkalnim solima, kako bi bio topiv u vodi. Deset godina kasnije on prodaje patent i mašina ulazi u opštu upotrebu. Ne zna se tačno ko je prvi otopio kakao buter i ponovo ga sjedinio sa kakao prahom, uz dodatak šećera. Rezultat je bio glatka smesa koja je mogla da se oblikuje. Kompanija Frey je prvi put izložila ovaj proizvod na sajmu u Birmingemu pod nazivom ''Chocolat Delicieux a Manger''. Tako je posle talasa čokolade kao napitka, Evropu zahvatio talas čokolade ''koja se jede''. Ako zelite da saznate nesto vise kliknite <a href = "https://www.history.com/topics/ancient-americas/history-of-chocolate">ovde</a>.
                    </p>
                </div>
            </div>
        </div>
        <hr>
        <div class="container" id="slike"></div>
    </section>
  <?php include 'footer.php' ?>
  <script>
        var id = '5a08cf9eff1293b0fb4d';
        var idSecret = '9780ddbd6c6ec2b936a0fc0251df4a27954db11e';
        var auto = 'Basic ' + window.btoa(id + ':' + idSecret);

            $.ajax({
              url: "https://api.shutterstock.com/v2/images/search?per_page=12&query=chocolate&view=full",
              headers: {
                Authorization: auto
              },
              success: function(result){
                  console.log(result);
                var text = '<div class="row">';
                  $.each(result.data, function (i, item) {
                    text +='<div class="col-md-4"><h4>'+item.description+'</h4><img class="img img-responsive" src="'+item.assets.preview["url"]+'"></div>';
                });
            text+= "</div>"
            $('#slike').html(text);
            }});


          </script>

</body>

</html>
