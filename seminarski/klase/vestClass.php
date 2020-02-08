<?php
class Vest {
    /**
     * PROPDESCRIPTION
     *
     * @access public
     * @var PROPTYPE
     */
    public $vestID;

    /**
     * PROPDESCRIPTION
     *
     * @access public
     * @var PROPTYPE
     */
    public $naslov;

    /**
     * PROPDESCRIPTION
     *
     * @access public
     * @var PROPTYPE
     */
    public $tekst;

    /**
     * PROPDESCRIPTION
     *
     * @access public
     * @var PROPTYPE
     */
    public $autor;

    /**
     * PROPDESCRIPTION
     *
     * @access public
     * @var PROPTYPE
     */
    public $datumObjave;

    /**
     * METHODDESCRIPTION
     *
     * @access public
     * @return RETURNTYPE RETURNDESCRIPTION
     */
    public function getVestID() {
        return $this->vestID;
    }

    /**
     * METHODDESCRIPTION
     *
     * @access public
     * @param ARGTYPE $vestID ARGDESCRIPTION
     */
    public function setVestID($vestID) {
        $this->vestID = $vestID;
    }

    /**
     * METHODDESCRIPTION
     *
     * @access public
     * @return RETURNTYPE RETURNDESCRIPTION
     */
    public function getNaslov() {
        return $this->naslov;
    }

    /**
     * METHODDESCRIPTION
     *
     * @access public
     * @param ARGTYPE $naslov ARGDESCRIPTION
     */
    public function setNaslov($naslov) {
        $this->naslov = $naslov;
    }

    /**
     * METHODDESCRIPTION
     *
     * @access public
     * @return RETURNTYPE RETURNDESCRIPTION
     */
    public function getTekst() {
        return $this->tekst;
    }

    /**
     * METHODDESCRIPTION
     *
     * @access public
     * @param ARGTYPE $tekst ARGDESCRIPTION
     */
    public function setTekst($tekst) {
        $this->tekst = $tekst;
    }

    /**
     * METHODDESCRIPTION
     *
     * @access public
     * @return RETURNTYPE RETURNDESCRIPTION
     */
    public function getAutor() {
        return $this->autor;
    }

    /**
     * METHODDESCRIPTION
     *
     * @access public
     * @param ARGTYPE $autor ARGDESCRIPTION
     */
    public function setAutor($autor) {
        $this->autor = $autor;
    }

    /**
     * METHODDESCRIPTION
     *
     * @access public
     * @return RETURNTYPE RETURNDESCRIPTION
     */
    public function getDatumObjave() {
        return $this->datumObjave;
    }

    /**
     * METHODDESCRIPTION
     *
     * @access public
     * @param ARGTYPE $datumObjave ARGDESCRIPTION
     */
    public function setDatumObjave($datumObjave) {
        $this->datumObjave = $datumObjave;
    }

    public function vratiPodatke($konekcija){
      $query = "SELECT * FROM vest";
      $rez = $konekcija->query($query);
      $niz = [];

      while($red = $rez->fetch_assoc()){
        $vest = new Vest();
        $vest->vestID = $red['vestID'];
        $vest->naslov = $red['naslov'];
        $vest->tekst = $red['tekst'];
        $vest->datumObjave = $red['datumObjave'];
        $vest->autor = $red['autor'];

        $niz[] = $vest;
      }

      return $niz;
    }

  public static function vratiVestPoIdu($id, $konekcija){
    $query = "SELECT * FROM vest where vestID=".$id;
    $rez = $konekcija->query($query);

    while($red = $rez->fetch_assoc()){
      $vest = new Vest();
      $vest->vestID = $red['vestID'];
      $vest->naslov = $red['naslov'];
      $vest->tekst = $red['tekst'];
      $vest->datumObjave = $red['datumObjave'];
      $vest->autor = $red['autor'];

      return $vest;
    }

    return null;
  }

  public function sacuvaj($konekcija){
    $query = "INSERT into vest VALUES (null,'$this->naslov','$this->tekst','$this->datumObjave','$this->autor')";
    $rez = $konekcija->query($query);
    if($rez){
        return true;
    }
    return false;
  }
  public function izmeni($konekcija){
    $query = "UPDATE vest SET naslov='$this->naslov',tekst='$this->tekst', autor='$this->autor', datumObjave='$this->datumObjave' where vestID= $this->vestID";
    echo($query);
    $rez = $konekcija->query($query);
    if($rez){
        return true;
    }
    return false;
  }
  public function obrisi($id,$konekcija){
    $query = "DELETE FROM vest where vestID= $id";
    echo($query);
    $rez = $konekcija->query($query);
    if($rez){
        return true;
    }
    return false;
  }
}
