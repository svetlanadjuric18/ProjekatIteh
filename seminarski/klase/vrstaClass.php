<?php
class Vrsta {
    /**
     * PROPDESCRIPTION
     *
     * @access public
     * @var PROPTYPE
     */
    public $vrstaID;

    /**
     * PROPDESCRIPTION
     *
     * @access public
     * @var PROPTYPE
     */
    public $naziv;

    /**
     * METHODDESCRIPTION
     *
     * @access public
     * @return RETURNTYPE RETURNDESCRIPTION
     */
    public function getVrstaID() {
        return $this->vrstaID;
    }

    /**
     * METHODDESCRIPTION
     *
     * @access public
     * @param ARGTYPE $vrstaID ARGDESCRIPTION
     */
    public function setVrstaID($vrstaID) {
        $this->vrstaID = $vrstaID;
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

    public static function vratiSveVrste($konekcija){
      $query = "SELECT * FROM vrsta";
      $rez = $konekcija->query($query);

      $niz = [];

      while($red = $rez->fetch_assoc()){
        $vrsta = new Vrsta();
        $vrsta->vrstaID = $red['vrstaID'];
        $vrsta->naziv = $red['nazivVrste'];
        $niz[] = $vrsta;
      }
      return $niz;
    }
}
