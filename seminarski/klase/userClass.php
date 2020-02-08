<?php
class User {
    /**
     * PROPDESCRIPTION
     *
     * @access public
     * @var PROPTYPE
     */
    public $id;

    /**
     * PROPDESCRIPTION
     *
     * @access public
     * @var PROPTYPE
     */
    public $ime;

    /**
     * PROPDESCRIPTION
     *
     * @access public
     * @var PROPTYPE
     */
    public $prezime;

    /**
     * PROPDESCRIPTION
     *
     * @access public
     * @var PROPTYPE
     */
    public $username;

    /**
     * PROPDESCRIPTION
     *
     * @access public
     * @var PROPTYPE
     */
    public $password;

    /**
     * PROPDESCRIPTION
     *
     * @access public
     * @var PROPTYPE
     */
    public $uloga;

    /**
     * METHODDESCRIPTION
     *
     * @access public
     * @return RETURNTYPE RETURNDESCRIPTION
     */
    public function getId() {
        return $this->id;
    }

    /**
     * METHODDESCRIPTION
     *
     * @access public
     * @param ARGTYPE $id ARGDESCRIPTION
     */
    public function setId($id) {
        $this->id = $id;
    }

    /**
     * METHODDESCRIPTION
     *
     * @access public
     * @return RETURNTYPE RETURNDESCRIPTION
     */
    public function getIme() {
        return $this->ime;
    }

    /**
     * METHODDESCRIPTION
     *
     * @access public
     * @param ARGTYPE $ime ARGDESCRIPTION
     */
    public function setIme($ime) {
        $this->ime = $ime;
    }

    /**
     * METHODDESCRIPTION
     *
     * @access public
     * @return RETURNTYPE RETURNDESCRIPTION
     */
    public function getPrezime() {
        return $this->prezime;
    }

    /**
     * METHODDESCRIPTION
     *
     * @access public
     * @param ARGTYPE $prezime ARGDESCRIPTION
     */
    public function setPrezime($prezime) {
        $this->prezime = $prezime;
    }

    /**
     * METHODDESCRIPTION
     *
     * @access public
     * @return RETURNTYPE RETURNDESCRIPTION
     */
    public function getUsername() {
        return $this->username;
    }

    /**
     * METHODDESCRIPTION
     *
     * @access public
     * @param ARGTYPE $username ARGDESCRIPTION
     */
    public function setUsername($username) {
        $this->username = $username;
    }

    /**
     * METHODDESCRIPTION
     *
     * @access public
     * @return RETURNTYPE RETURNDESCRIPTION
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * METHODDESCRIPTION
     *
     * @access public
     * @param ARGTYPE $password ARGDESCRIPTION
     */
    public function setPassword($password) {
        $this->password = $password;
    }

    /**
     * METHODDESCRIPTION
     *
     * @access public
     * @return RETURNTYPE RETURNDESCRIPTION
     */
    public function getUloga() {
        return $this->uloga;
    }

    /**
     * METHODDESCRIPTION
     *
     * @access public
     * @param ARGTYPE $uloga ARGDESCRIPTION
     */
    public function setUloga($uloga) {
        $this->uloga = $uloga;
    }


    public $ulogovan = false;

    public function isAdmin()
    {
      if($this->uloga){
        return $this->uloga->nazivUloge === 'Administrator';
      }

      return false;
    }

    public function login($konekcija){
      $query = "SELECT * from User u join uloga ul on u.ulogaID = ul.ulogaID where u.username = '$this->username' and password = '$this->password'";

      $rez = $konekcija->query($query);

      $this->ulogovan = false;

      while($red = $rez->fetch_assoc()){
        $this->id = $red['userID'];
        $this->ime = $red['ime'];
        $this->prezime = $red['prezime'];

        $uloga = new Uloga();
        $uloga->setUlogaID( $red['ulogaID']);
        $uloga->setNazivUloge( $red['nazivUloge']);
        $this->uloga = $uloga;
        $this->ulogovan = true;
        $_SESSION['ulogovaniUser'] = $this;

        return true;
      }

      return false;
    }

    public function registruj($konekcija){
      $query = "INSERT INTO user VALUES (null,'$this->ime','$this->prezime','$this->username','$this->password',1)";

      if($konekcija->query($query)){
        return true;
      }
      return false;
    }
}
