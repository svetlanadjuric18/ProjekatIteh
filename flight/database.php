<?php
class Database {
	private $hostname = "localhost";
	private $username = "root";
	private $password = "";
	private $dbname = "cokolada";
	private $dblink;
	private $result = true;
	private $records;
	private $affectedRows;


	function __construct($dbname)
	{
		$this->$dbname = $dbname;
		$this->Connect();
	}

	public function getResult()
	{
		return $this->result;
	}

	function __destruct()
	{
		$this->dblink->close();
	}


	function Connect()
	{
		$this->dblink = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);
		if($this->dblink->connect_errno)
		{
			printf("Konekcija neuspesna: %s\n",  $mysqli->connect_error);
			exit();
		}
		$this->dblink->set_charset("utf8");
	}

	function ucitajVrste() {
		$mysqli = new mysqli("localhost", "root", "", "cokolada");
		$mysqli->set_charset("utf8");
		$q = 'SELECT * FROM vrsta';
		$this ->result = $mysqli->query($q);
		$mysqli->close();
	}
	function ucitajProzivode() {
		$mysqli = new mysqli("localhost", "root", "", "cokolada");
		$mysqli->set_charset("utf8");
		$q = 'SELECT * FROM cokolada m join vrsta v on m.vrstaID=v.vrstaID';
		$this ->result = $mysqli->query($q);
		$mysqli->close();
	}
	function ucitajVesti() {
		$mysqli = new mysqli("localhost", "root", "", "cokolada");
		$mysqli->set_charset("utf8");
		$q = 'SELECT * FROM vest';
		$this ->result = $mysqli->query($q);
		$mysqli->close();
	}

	function unosKorisnika($data) {
		$
		$mysqli = new mysqli("localhost", "root", "", "cokolada");

		$ime = $data['ime'];
		$prezime = $data['prezime'];
		$username = $data['username'];
		$password = $data['password'];

		$query = "INSERT INTO user VALUES (null,'$ime','$prezime','$username','$password',1)";

		if($mysqli->query($query))
		{
			$this ->result = true;
		}
		else
		{
			$this->result = false;
		}
		$mysqli->close();
	}



	function ExecuteQuery($query)
	{
		if($this->result = $this->dblink->query($query)){
			if (isset($this->result->num_rows)) $this->records         = $this->result->num_rows;
				if (isset($this->dblink->affected_rows)) $this->affected        = $this->dblink->affected_rows;
					return true;
		}
		else{
			return false;
		}
	}
}
?>
