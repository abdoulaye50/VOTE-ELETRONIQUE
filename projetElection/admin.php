<?php
session_start();
include_once "database.php";

class Admin {

	public $adminTable;
	public $dbObj;
	public $con;

	public function __construct() {
	    $this->adminTable = "admin";
	    $this->dbObj = new Database();
	    $this->con = $this->dbObj->connection();
	}

	/* admin méthode d'inscription */
	public function registration() {

	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$phone = $_POST['phone'];
	$registr_date = date('Y-m-d');		

	$query ="INSERT INTO $this->adminTable (name, email, password, phone, registration_date)
		VALUES('$name', '$email', '$password', '$phone', '$registr_date')";
	if ($this->con->query($query)) {
	    return true;
	} else {
	    return false;
	    }
	}

	/* méthode de connexion Admin */
	public function login() {
	    $email = $_POST['email'];
	    $password = md5($_POST['password']);

	    $query = "SELECT * FROM $this->adminTable WHERE email = '$email' && password = '$password'";
	    $result = $this->con->query($query);
	    while ($admin_data = $result->fetch_assoc()) {
		$_SESSION['id'] = $admin_data['id'];
		$_SESSION['name'] = $admin_data['name'];
	    }
	if ($result->num_rows > 0) {
	    return true;
	} else {
	    return false;
	    }
	}

	/* vérifier si l'e-mail existe */
	public function isUserExist($email) {
    	     $query = "SELECT * FROM $this->adminTable WHERE email ='$email'";
	     $result = $this->con->query($query);
	 if ($result->num_rows > 0) {
	    return true;
	 } else {
	    return false;
	    }
	}


	/*vérifier si le numéro de téléphone existe */

	public function isUserPhoneNumberExists($phone){
	    $query = "SELECT * FROM $this->adminTable WHERE phone = '$phone'";
	    $result = $this->con->query($query);
	if ($result->num_rows > 0) {
            return true;
	}else {
            return false;
	  }
		  
	}
			
}


$adminObj = new Admin();
?>