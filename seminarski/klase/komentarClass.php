<?php
class Komentar {
    /**
     * PROPDESCRIPTION
     *
     * @access public
     * @var PROPTYPE
     */
    public $vest;

    /**
     * PROPDESCRIPTION
     *
     * @access public
     * @var PROPTYPE
     */
    public $komentarID;

    /**
     * PROPDESCRIPTION
     *
     * @access public
     * @var PROPTYPE
     */
    public $user;

    /**
     * PROPDESCRIPTION
     *
     * @access public
     * @var PROPTYPE
     */
    public $komentar;

    /**
     * PROPDESCRIPTION
     *
     * @access public
     * @var PROPTYPE
     */
    public $vremeKomentarisanja;

    /**
     * METHODDESCRIPTION
     *
     * @access public
     * @return RETURNTYPE RETURNDESCRIPTION
     */
    public function getVest() {
        return $this->vest;
    }

    /**
     * METHODDESCRIPTION
     *
     * @access public
     * @param ARGTYPE $vest ARGDESCRIPTION
     */
    public function setVest($vest) {
        $this->vest = $vest;
    }

    /**
     * METHODDESCRIPTION
     *
     * @access public
     * @return RETURNTYPE RETURNDESCRIPTION
     */
    public function getKomentarID() {
        return $this->komentarID;
    }

    /**
     * METHODDESCRIPTION
     *
     * @access public
     * @param ARGTYPE $komentarID ARGDESCRIPTION
     */
    public function setKomentarID($komentarID) {
        $this->komentarID = $komentarID;
    }

    /**
     * METHODDESCRIPTION
     *
     * @access public
     * @return RETURNTYPE RETURNDESCRIPTION
     */
    public function getUser() {
        return $this->user;
    }

    /**
     * METHODDESCRIPTION
     *
     * @access public
     * @param ARGTYPE $user ARGDESCRIPTION
     */
    public function setUser($user) {
        $this->user = $user;
    }

    /**
     * METHODDESCRIPTION
     *
     * @access public
     * @return RETURNTYPE RETURNDESCRIPTION
     */
    public function getKomentar() {
        return $this->komentar;
    }

    /**
     * METHODDESCRIPTION
     *
     * @access public
     * @param ARGTYPE $komentar ARGDESCRIPTION
     */
    public function setKomentar($komentar) {
        $this->komentar = $komentar;
    }

    /**
     * METHODDESCRIPTION
     *
     * @access public
     * @return RETURNTYPE RETURNDESCRIPTION
     */
    public function getVremeKomentarisanja() {
        return $this->vremeKomentarisanja;
    }

    /**
     * METHODDESCRIPTION
     *
     * @access public
     * @param ARGTYPE $vremeKomentarisanja ARGDESCRIPTION
     */
    public function setVremeKomentarisanja($vremeKomentarisanja) {
        $this->vremeKomentarisanja = $vremeKomentarisanja;
    }

    public function vratiPodatke($konekcija) {
      $query = "SELECT * FROM vest v join komentar k on v.vestID=k.vestID join user u on k.userID=u.userID join uloga ul on u.ulogaID = ul.ulogaID where v.vestID = ".$this->vest;

      $rez = $konekcija->query($query);
      $niz = [];

      while($red = $rez->fetch_assoc()){
        $vest = new Vest();
        $vest->vestID = $red['vestID'];
        $vest->naslov = $red['naslov'];
        $vest->tekst = $red['tekst'];
        $vest->datumObjave = $red['datumObjave'];
        $vest->autor = $red['autor'];

        $user = new User();
        $user->setId($red['userID']);
        $user->setIme($red['ime']);
        $user->setPrezime($red['prezime']);

        $uloga = new Uloga();
        $uloga->setUlogaID( $red['ulogaID']);
        $uloga->setNazivUloge( $red['nazivUloge']);
        $user->setUloga($uloga);

        $komentar = new Komentar();
        $komentar->setKomentarID($red['komentarID']);
        $komentar->setVremeKomentarisanja($red['vremeKomentarisanja']);
        $komentar->setKomentar($red['komentar']);
        $komentar->setVest($vest);
        $komentar->setUser($user);

        $niz[] = $komentar;
      }

      return $niz;
    }

    public function sacuvaj($konekcija){
      $query = "INSERT into komentar(userID,vestID,komentar) VALUES ($this->user,$this->vest,'$this->komentar')";
      var_dump($query);
      $rez = $konekcija->query($query);
      if($rez){
          return true;
      }
      return false;
    }


}
