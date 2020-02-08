<?php
class Uloga {
    /**
     * PROPDESCRIPTION
     *
     * @access public
     * @var PROPTYPE
     */
    public $ulogaID;

    /**
     * PROPDESCRIPTION
     *
     * @access public
     * @var PROPTYPE
     */
    public $nazivUloge;

    /**
     * METHODDESCRIPTION
     *
     * @access public
     * @return RETURNTYPE RETURNDESCRIPTION
     */
    public function getUlogaID() {
        return $this->ulogaID;
    }

    /**
     * METHODDESCRIPTION
     *
     * @access public
     * @param ARGTYPE $ulogaID ARGDESCRIPTION
     */
    public function setUlogaID($ulogaID) {
        $this->ulogaID = $ulogaID;
    }

    /**
     * METHODDESCRIPTION
     *
     * @access public
     * @return RETURNTYPE RETURNDESCRIPTION
     */
    public function getNazivUloge() {
        return $this->nazivUloge;
    }

    /**
     * METHODDESCRIPTION
     *
     * @access public
     * @param ARGTYPE $nazivUloge ARGDESCRIPTION
     */
    public function setNazivUloge($nazivUloge) {
        $this->nazivUloge = $nazivUloge;
    }
}
