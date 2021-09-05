<?php

class Database{	

	protected $localhost = "localhost";
	protected $servername = "root";
	protected $password = "";
	protected $database = "gestionelection";
	public $con;	
	

	public function connection(){
	    // Créer une connexion
	    $this->con = new mysqli($this->localhost, $this->servername, $this->password, $this->database);
	    // Vérifier la connexion
	    if ($this->con->connect_error) {
		die("Connection failed: " . $this->con->connect_error);
	    }
	    return $this->con;
	}


}
?>