<?php
class Cokolada {
    /**
     * PROPDESCRIPTION
     *
     * @access public
     * @var PROPTYPE
     */
    public $cokoladaID;

    /**
     * PROPDESCRIPTION
     *
     * @access public
     * @var PROPTYPE
     */
    public $naziv;

    /**
     * PROPDESCRIPTION
     *
     * @access public
     * @var PROPTYPE
     */
    public $vrsta;

    /**
     * PROPDESCRIPTION
     *
     * @access public
     * @var PROPTYPE
     */
    public $cena;

    /**
     * PROPDESCRIPTION
     *
     * @access public
     * @var PROPTYPE
     */
    public $datumProizvodnje;


    public $slika;

    /**
     * METHODDESCRIPTION
     *
     * @access public
     * @return RETURNTYPE RETURNDESCRIPTION
     */
    public function getCokoladaID() {
        return $this->cokoladaID;
    }

    /**
     * METHODDESCRIPTION
     *
     * @access public
     * @param ARGTYPE $medID ARGDESCRIPTION
     */
    public function setCokoladaID($cokoladaID) {
        $this->cokoladaID = $cokoladaID;
    }

    /**
     * METHODDESCRIPTION
     *
     * @access public
     * @return RETURNTYPE RETURNDESCRIPTION
     */
    public function getNaziv() {
        return $this->naziv;
    }

    /**
     * METHODDESCRIPTION
     *
     * @access public
     * @param ARGTYPE $naziv ARGDESCRIPTION
     */
    public function setNaziv($naziv) {
        $this->naziv = $naziv;
    }

    /**
     * METHODDESCRIPTION
     *
     * @access public
     * @return RETURNTYPE RETURNDESCRIPTION
     */
    public function getVrsta() {
        return $this->vrsta;
    }

    /**
     * METHODDESCRIPTION
     *
     * @access public
     * @param ARGTYPE $vrsta ARGDESCRIPTION
     */
    public function setVrsta($vrsta) {
        $this->vrsta = $vrsta;
    }

    /**
     * METHODDESCRIPTION
     *
     * @access public
     * @return RETURNTYPE RETURNDESCRIPTION
     */
    public function getCena() {
        return $this->cena;
    }

    /**
     * METHODDESCRIPTION
     *
     * @access public
     * @param ARGTYPE $cena ARGDESCRIPTION
     */
    public function setCena($cena) {
        $this->cena = $cena;
    }

    /**
     * METHODDESCRIPTION
     *
     * @access public
     * @return RETURNTYPE RETURNDESCRIPTION
     */
    public function getDatumProizvodnje() {
        return $this->datumProizvodnje;
    }

    /**
     * METHODDESCRIPTION
     *
     * @access public
     * @param ARGTYPE $datumProizvodnje ARGDESCRIPTION
     */
    public function setDatumProizvodnje($datumProizvodnje) {
        $this->datumProizvodnje = $datumProizvodnje;
    }

    public function getSlika() {
        return $this->slika;
    }

    public function setSlika($slika) {
        $this->slika = $slika;
    }

    public function vratiPodatkeSortirano($sort,$konekcija){
      $sorting = '';
      if($sort === 'r'){
        $sorting = "order by cena asc";
      }
      if($sort === 'o'){
        $sorting = "order by cena desc";
      }

      $query = "SELECT * FROM cokolada c join vrsta v on c.vrstaID=v.vrstaID ".$sorting;
      $rez = $konekcija->query($query);
      $niz = [];

      while($red = $rez->fetch_assoc()){
        $cokolada = new Cokolada();
        $cokolada->cokoladaID = $red['id'];
        $cokolada->naziv = $red['naziv'];
        $cokolada->cena = $red['cena'];
        $cokolada->slika = $red['slika'];
        $cokolada->datumProizvodnje = $red['datumProizvodnje'];

        $vrsta = new Vrsta();
        $vrsta->setVrstaID( $red['vrstaID']);
        $vrsta->setNaziv( $red['nazivVrste']);
        $cokolada->vrsta = $vrsta;

        $niz[] = $cokolada;
      }

      return $niz;
    }

    public function save($konekcija){
        $query = "INSERT INTO cokolada VALUES (null,'$this->naziv',$this->vrsta,$this->cena,'$this->datumProizvodnje','$this->slika')";
        if($konekcija->query($query)){
          return true;
        }

        return false;
    }
}
