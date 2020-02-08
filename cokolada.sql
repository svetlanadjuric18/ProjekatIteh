-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2019 at 12:53 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cokolada`
--

-- --------------------------------------------------------

--
-- Table structure for table `cokolada`
--

CREATE TABLE `cokolada` (
  `id` int(11) NOT NULL,
  `naziv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vrstaID` int(11) NOT NULL,
  `cena` double NOT NULL,
  `datumProizvodnje` date NOT NULL,
  `slika` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cokolada`
--

INSERT INTO `cokolada` (`id`, `naziv`, `vrstaID`, `cena`, `datumProizvodnje`, `slika`) VALUES
(1, 'Adore', 2, 800, '2017-08-01', 'adore.jpg'),
(2, 'Milka', 1, 700, '2019-08-03', 'milka.jpg'),
(3, 'Najlepse zelje', 3, 900, '2018-08-04', 'zelje.jpg'),
(5, 'Eugen', 3, 1200, '2019-01-14', 'eugen.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `vestID` int(11) NOT NULL,
  `komentarID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `komentar` text COLLATE utf8_unicode_ci NOT NULL,
  `vremeKomentarisanja` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`vestID`, `komentarID`, `userID`, `komentar`, `vremeKomentarisanja`) VALUES
(16, 9, 1, 'Nije više Mars, sad je Snickers najprodavanija!', '2020-02-08 08:47:15'),
(10, 10, 1, 'Hvala na savetima!', '2020-02-07 08:47:49'),
(11, 11, 1, 'Cokolada je ljubav <3', '2020-02-08 08:49:40'),
(11, 12, 2, 'Cokolada je ljubav <3', '2020-02-08 08:49:50'),
(9, 13, 1, 'Divan tekst :)', '2020-02-07 08:52:33'),
(14, 14, 3, 'Za pola kliograma Chocopologie možes da platiš dve školarine na FONu :O', '2020-02-08 08:57:25'),
(11, 15, 3, 'Sad cu još više cokolade da jedem :D', '2020-02-07 09:00:03');

-- --------------------------------------------------------

--
-- Table structure for table `uloga`
--

CREATE TABLE `uloga` (
  `ulogaID` int(11) NOT NULL,
  `nazivUloge` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `uloga`
--

INSERT INTO `uloga` (`ulogaID`, `nazivUloge`) VALUES
(1, 'Korisnik'),
(2, 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `ime` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ulogaID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `ime`, `prezime`, `username`, `password`, `ulogaID`) VALUES
(1, 'Petar', 'Jeremic', 'pera', 'pera', 2),
(2, 'Aelksa', 'Ivanovic', 'alek', 'alek', 1),
(3, 'Svetlana', 'Djuric', 'svetla', 'svetla', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vest`
--

CREATE TABLE `vest` (
  `vestID` int(11) NOT NULL,
  `naslov` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tekst` text COLLATE utf8_unicode_ci NOT NULL,
  `datumObjave` date NOT NULL,
  `autor` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vest`
--

INSERT INTO `vest` (`vestID`, `naslov`, `tekst`, `datumObjave`, `autor`) VALUES
(9, 'Rekli su o čokoladi', '„Postoje četiri osnovne skupine hrane: mlečna čokolada, tamna čokolada, bela čokolada i čokoladni tartufi“. – nepoznat autor\r\n\r\n „Nisam probao čokoladu koja mi se nije svidela“. - Deanna Troi (Marina Sirtis) u Zvezdanim stazama\r\n\r\n„Sve što nam treba je ljubav, ali malo čokolade tu i tamo ne škodi! “ - Lucy Van Pelt\r\n\r\n„Hemijski gledano, čokolada je zaista svetski savršena hrana“. - Michael Levine, istraživač hrane\r\n\r\n\"Malo čokolade dnevno drži lekara podalje.\" - Marcia Carringto\r\n\r\n\"Sve je dobro ako je napravljeno od čokolade.\" - Jo Brand\r\n\r\n\"Karamele su samo hir. Čokolada je trajna stvar. \"- Milton Hershey Snavely\r\n\r\n\"Čokolada je savršena hrana, zdrava kao što je ukusna, blagotvorna je za iscrpljenu snagu ... najbolji je prijatelj onih koji se bave književnim težnjama.\" - Justus Liebig\r\n\r\n\"Čokolada je jedina aromaterapija koja mi treba.\" - Jasmin Heiler\r\n\r\n\"Čokolada je nevolja za lek.\" - Jareb Teague\r\n\r\n\"Čokolada kaže:\" Žao mi je \", tako puno bolje od reči.\" - Rachel Vincent\r\n\r\n\"Kafa i čokolada-izumitelj moke treba biti proglašen za sveca.\" - Cherise Sinclair\r\n\r\n\"Ako umrem jedući čokoladu, umreću srećan.\" - Cailey Sims\r\n\r\n\"Ako nema čokolade u Raju, ne idem.\" - Jane Seabrook\r\n\r\n\"Nema metafizike na zemlji poput čokolade.\" - Fernando Pessoa\r\n\r\n\"Devet od deset ljudi voli čokoladu. Deseta osoba uvek laže. \"- John Q. Tulije\r\n\r\n\"Ostale stvari su samo hrana. Ali Čokolada je čokolada. \"- Patrick Skene\r\n\r\n\"Najveće tragedije su napisali Grci i Šekspir ... nisu znali za čokoladu.\" - Sandra Boynton\r\n\r\n\"Ne postoji ništa bolje od prijatelja, osim prijatelj sa čokoladom.\" - Linda Grayson\r\n\r\n\"Ono što vidite pred vama, moji prijatelji, je rezultat čokolade.\" - Katharine Hepburn\r\n\r\n\"Koga briga za zaljubljivanje. Radije ću pasti u čokoladu. \"-Tori Mason', '2020-02-07', 'Petar Jeremic'),
(10, 'Kako prepoznati kvalitetnu tamnu čokoladu', 'Najvažniji sastojaci su kakao masa i kakao maslac. Tamna čokolada je kvalitetnija čim ima veći udio kakao mase. Neki tvrde da je prava tamna čokolada ona koja sadrži više od 75% kakao mase. Drugi tvrde da je za tamnu čokoladu dovoljno samo 50% kakao mase. Na Vama je za koju čokoladu ćete se odlučiti no prilikom izbora imajte na umu postotak kakaa jer je ona sigurno zdravija. Vrlo je važna i kvaliteta samog kakaa, no mi kao kupci na to nemamo utjecaja. Dobro je znati da najbolji i najfiniji kakao dolazi s plantaža u Latino Americi.\r\n\r\nKakao maslac je drugi važni sastojak koji doprinosi većoj kvaliteti tamne čokoade. Proizvođači čokolade dobivaju kakao maslac od plodova kakaovca što je dugotrajan proces. Iz tog razloga kod manje kvalitetnih čokolada kakao maslac se uvelike zamjenjuje običnim maslacem. Prirodni obični maslac ima više zasićenih masnpća koje nisu najbolje za zdravlje,a i sama čokolada dobiva drugačiji okus.\r\n\r\nMogi kupci posežu za tamnom čokoladom s dodacima. Tako na policama možemo naći tamnu čokoladu s komadićima narančne, jagoda i drugog voća. Kod kvalitetne tamne čokolade svi sastojci moraju biti prirodni i svježi. Ponekad se dogodi da prodavač, kako bi smanjio troškove proizvodnje, u čokoladu umiješa umjetne atome i pojačivače okusa što nikako ne doprinosi odvajanju takve čokolade u viši kvalitetni rang.\r\n\r\nSvi sastojci čokolade moraju biti jasno označeni na ambalaži. Ponekad je teško razumjeti iz napisanog, a ponekad popis sastojaka u potpunosti nedostaje. Zato poznavatelji tamne čokolade znaju trik koji će im jednostavno pokazati da li se radi o pravoj i čistoj čokoladi ili čokoladi kojoj su dodane biljne ili životinjske masnoće.\r\n\r\nAko čokolada sadržo životinjske ili biljne masnoče i veće količine šećera, nakon kušanja prvog komadića čokolade ostat će Vam sitne grudice. Imate osjećaj kao da ustima imate komadiće mrvljenog pijeska koji se netom otapa. Takav osjećaj kod kvalitetne tamne čokolade nećete osjetiti. S obzirom da kvalitetna tamna čokolada sadrži manje od 3g/100g  masnoća , veliki udio čokolade čini upravo kakao masa.', '2020-02-07', 'Petar Jeremic'),
(11, '11 razloga zašto je čokolada zdrava', 'Pri odabiru čokolade opredelite se za onu sa 70% kakao mase, bez dodatka drugih biljnih masti, za aromu pomorandžine kore, a ne armou karamele i nugata. Ovakav odabir ukusa omogućiće vam užitak, ali i zdrave sastoje iz čokolade. Evo 11 razloga zašto možete bez griže savesti da uživate u ovoj ukusnoj poslastici koja je, dokazali naučnici, vrlo zdrava za vas!\r\n\r\n1. Čokolada pomaže da se opustite\r\nJedna švajcerska studija utvrdila je da ko jede 40g tamne čokolade dnevno znatno smanjuje nivo hormona stresa kortizola.\r\n\r\n2. Čokolada poboljšava koncentraciju\r\nVeoma tamna čokolada izaziva povećanje protoka krvi do određenih delova mozga i povećava budnost.\r\n\r\n3. Čokolada pomaže u borbi protiv raka\r\nVisok nivo antioksidansa polifenola koji se nalazi u tamnoj čokoladi smanjuje štetu koju prave slobodni radikali u organizmu. Biohemičari sa London\'s King\'s College utvrdili su da 17 čaša soka od pomorandže ima isto dejstvo na slobodne radikale kao 50g tamne čokolade.\r\n\r\n4. Čokoladadeluje kao lek protiv kašlja\r\nCrna čokolada bogata je teobrominom koji potiskuje aktivnost kašlja.\r\n\r\n5. Čokolada pomaže sprečavanju bolesti srca\r\nDevetogodišnja švajcerska studija koja je u ispitivanje uključila 31.000 žena koje su jele jednu do dve porcije tamne čokolade nedeljno, smanjile su rizik od kardovaskularnih oboljenja. Zbog antiinflamatornih svojstva, kao i činjenici da sadrži visok nivo flavonoida i služi kao snažan antioksidans tamna čokolada smanjuje rizik srčanih oboljenja.\r\n\r\n6. Tamna čokolada će vas spasiti od grickalica\r\nDa, stvarno! Visok sadržaj vlakana u tamnoj čokoladi učiniče da manje žudite za masnom i kaloričnom hranom.\r\n\r\n7. Čokolada vas štiti od sunca\r\nIstraživanja sprovedena u Londonu uključilo je ljude koji su jeli čokoladu sa visokim nivoom flavonoida tri meseca. Na suncu je nihova koža dvostruko duže bila otpornija na crvenilo kože. Čokolada ipak nije zamena za kreme za sunčanje, ali pomaže da koža sporije pocrveni.\r\n\r\n8. Konzumacija čokolade pomaže u kontroli dijabetesa\r\nAzot-oksid, koji pomaže da se kontroliše osetljivost na insulin, unapređen je flavonoidima u čokoladi, što znači da redovna konzumacija tamne čokolade može smanjiti pojavu insulinske rezistencije na pola.\r\n\r\n9. Čokolada podiže nivo raspoloženja\r\nČokolada povećava nivo seratonina, hormona sreće u krvi, pa će vas pauza uz kocku čokolade učiniti srećnijima.\r\n\r\n10. Čokolada poboljšava protok krvi\r\nRazređivačka svojstva krvi tamne čokolade su pokazala da pomažu cirkulaciji, poboljšavaju protok krvi, izgled kože i utiču na smanjenje celulita.\r\n\r\n11. Čokolada popravlja vaš vid\r\nIstraživanje sprovedeno na Univerzitetu Riding sugeriše da tamna čokolada poboljšava protok krvi na mrežnjači, što doprinosi janijem vidu.', '2020-02-06', 'Svetlana Djuric'),
(12, 'Četiri osnovne vrste čokolade', 'Čokolada za kuvanje ili nezaslađena čokolada ne sadrži dodatke poput mleka ili šećera.\r\n \r\n\r\nCrna čokolada sadrži veći procenat kakao zrna (minimum 50% kakao delova). Ostali sastojci su šećer, vanila, soja lecitin. Smatra se najkvalitetnijom i najzdravijom vrstom čokolade. Crna čokolada se može podeliti prema procentu kakaa, kakao butera i šećera. Ukoliko sadrži najmanje 15% tečnog kakaa i isto toliko kakao butera, a minimum ukupne količine kakao delova je 60%, onda spada u slatke čokolade. Ukoliko je procenat tečnog kakaa najmanje 35% i isto toliko kakao butera i šećera, onda spada u gorke čokolade.\r\n \r\n\r\nMlečna čokolada sadrži iste sastojke kao i crna, ali se dodaje i mleko u prahu, čiji kvalitet zajedno sa procentom kakao delova određuje kvalitet. Smatra se da mora imati minimum 30% kakao delova.\r\n \r\n\r\nBela čokolada sadrži sve sastojke kao i mlečna osim što ima kakao buter, a ne kakao masu. Kvalitetna bela čokolada mora imati minimum 26% kakao delova, odnosno kakao butera.', '2020-02-06', 'Krmelj Krpelj'),
(14, 'Top 5 najskupljih čokolada na svetu', '0\r\n  \r\nSkoro sve što natera ženu da slasno obliže usne košta, u ovom slučaju kao zlato. Braon zlato. Ako ste mislili da su one bombonjere po samoposlugama basnoslovno skupe, pa – slatki ste. Samo za sladokusce “Alo.rs” vam predstavlja top 5 najskupljih čokolada na planeti.\r\nChocopologie - Kraljica među čokoladama\r\nSviđa vam se kako ovo izgleda? Naravno da vam se sviđa. Jedan kilogram ove čokolade košta više od većine frižidera, a za 50 tabli ove čokolade mogli biste da kupite garsonjeru u Beogradu. Pravi je kompanija “Knipschildt”, a pola kilograma košta neverovatnih 2600 dolara. Ova basnoslovno skupa poslastica ujedno je i najskuplja na svetu, a za njenu cenu krivi su vrhunski sastojci. Recept se sastoji iz 70 postotne Valrhona čokolade i slatke pavlake, pa se ova smesa 24 sata namače u vanilu i čisto ulje od tartufa, dok se kakao dodaje ručno.\r\nNoka - Čista egzotika\r\nOva poslastica je prava egzotična lepotica. Nokine čokolade prave se od najboljeg kaka iz Venecuele, Trinidada, Obale Slonovače i Ekvadora. Sačinjena je od 75 odsto kaka i ostalih uobičajenih sastojaka, sa jednom bitnom razlikom – potpuno je prirodna. U ovaj slatkiš se ne dodaju aditivi, kao ni aroma vanile, čime se njen proizvođač Noka Vintages Collection posebno ponosi, do te mere, zapravo, da je cena za pola kilograma 854 dolara.\r\n\r\nDelafee - \"Začinjeno\" zlatom\r\nPošto ćete ovu čokoladu platiti suvim zlatom, red je da malo njega i pojedete – možda je bila ideja švajcarske kompanije Delfee,  kada je smislila ovaj slatkiš. Ako vam nešto krcne pod zubima dok žvaćete ovaj slatki užitak to neće biti lešnici ili bademi već jestivo 24-karatno zlato! Naravno, slatkiš sadrži i šećer, mleko i ulje, ali kao da je bitno, pobogu – napravljena je od zlata! Cena  je, pogađate, “skromna” i iznosi 504 dolara za 500 grama. Poređenja radi, za te pare možete naći više nego solidan verenički prsten od čistog zlata. Znate… onog koje se ne topi.\r\nRichart - Na francuski način\r\nIako nema mesto na postolju 3 najskuplje čokolade, francuski Richart se sastoji od 70% Kriolo kakaa iz Venecuele koji se smatra najkvalitetnijim na svetu. Pored toga na ukusu, ali i skupoći  dodaju najbolje vrste badema, kupina, jagoda i egzotični začini. Cena? Čak 120 dolara za 500 grama.\r\nGodiva G - Belgijska tradicija\r\nBelgija je zemlja čokolade i Herkula Poaroa! Ne možete da pričate o belgijskoj čokoladi, a da ne pomenete Godivu, a posebno njenu “G” kolekciju. U sastav ovog slatkiša ulaze retki sastojci poput  tasmanijskog meda ili specijalne meksičke ljute mešavine. Godiva G kolekcija je, pored toga najjeftinija među eletnim poslasticama i košta \"samo\" 107 dolara za pola kilograma. Sitnica.', '2020-02-08', 'Aleksa Ivanovic'),
(16, 'Ovo su najprodavanije čokoladice', 'Pariz -- Američka konditorska kompanija Mars je, po visini prihoda od prodaje, prva među najvećim proizvođačima čokolada, na listi magazina Kendi Industriz.\r\nMars je u 2012. godini ostvario prihode od 16,8 milijardi dolara, piše francuski Figaro.\r\n\r\nGrupa zapošljava 32.000 ljudi u ukupno 51 pogonu, a njene najpoznatije marke, pored čokoladica Mars, jesu Baunti, Tviks, Snikers i druge.\r\n\r\nNa drugom mestu je nemački proizvođač Mondelez Internešenal, sa popularnom Milka čokoladom. U prošloj godini, ova kompanija ostvarila je prihode od 15,48 milijardi dolara. \r\n\r\nManje poznat Barsel SA, filijala meksičke Grupe Bimbo, takođe je međunarodni \"čokoladni\" gigant, s prihodima od 14 milijardi dolara u 2012. Švajcarska kompanija Nestle nalazi se na četvrtom mestu, s prihodima od 12,8 milijardi dolara u prošloj godini, a najbolji rezultat ostvarila je marka KitKat. \r\n\r\nSledi japanska kompanija Meiji, koja je realizovala 12,42 milijarde dolara prihoda, a posle nje je američka firma Herši, sa 6,46 milijardi dolara ukupne vrednosti prodaje u prošloj godini. Italijanski Ferero zauzeo je sedmo mesto na listi, s prošlogodišnjim prihodima od 5,62 milijarde dolara, a uspeh uglavnom duguje markama Nutela i Kinder. \r\n\r\nNa osmom mestu je švajcarska grupa Lind&Springli sa 2,97 milijardi dolara prihoda u 2012, dok je na devetom mestu nemački Stork , zahvaljujući pre svega bombonama i crnim čokoladama. Grupa je ostvarila prihod od 2,27 milijardi dolara u prošloj godini. \r\n\r\nListu zaključuje turska Grupa Jildiz sa 2,2 milijarde dolara prihoda, koja u ponudi ima 83 različita proizvoda, od biskvita do čokolada, pod brendom Ulker.', '2020-02-07', 'Petar Jeremic');

-- --------------------------------------------------------

--
-- Table structure for table `vrsta`
--

CREATE TABLE `vrsta` (
  `vrstaID` int(11) NOT NULL,
  `nazivVrste` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vrsta`
--

INSERT INTO `vrsta` (`vrstaID`, `nazivVrste`) VALUES
(1, 'Belgijska'),
(2, 'Svajcarska'),
(3, 'Srpska');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cokolada`
--
ALTER TABLE `cokolada`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vrstaID` (`vrstaID`),
  ADD KEY `vrstaID_2` (`vrstaID`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`komentarID`),
  ADD KEY `vestID` (`vestID`,`userID`),
  ADD KEY `vestID_2` (`vestID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `uloga`
--
ALTER TABLE `uloga`
  ADD PRIMARY KEY (`ulogaID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `ulogaID` (`ulogaID`);

--
-- Indexes for table `vest`
--
ALTER TABLE `vest`
  ADD PRIMARY KEY (`vestID`);

--
-- Indexes for table `vrsta`
--
ALTER TABLE `vrsta`
  ADD PRIMARY KEY (`vrstaID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cokolada`
--
ALTER TABLE `cokolada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `komentarID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `uloga`
--
ALTER TABLE `uloga`
  MODIFY `ulogaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vest`
--
ALTER TABLE `vest`
  MODIFY `vestID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `vrsta`
--
ALTER TABLE `vrsta`
  MODIFY `vrstaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cokolada`
--
ALTER TABLE `cokolada`
  ADD CONSTRAINT `cokolada_ibfk_1` FOREIGN KEY (`vrstaID`) REFERENCES `vrsta` (`vrstaID`);

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`vestID`) REFERENCES `vest` (`vestID`),
  ADD CONSTRAINT `komentar_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`ulogaID`) REFERENCES `uloga` (`ulogaID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
