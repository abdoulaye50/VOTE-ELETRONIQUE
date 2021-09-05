<?php


class Election
{
    private $server = "localhost";
    private $username = "root";
    private $password;
    private $db = "gestionelection";
    private $conn;

    public function __construct(){
        try {
            
            $this->conn = new mysqli($this->server,$this->username,$this->password,$this->db);
        } catch (Exception $e) {
            echo "connection failed" . $e->getMessage();
        }
    }

    public function inscrire()
    {

        if (isset($_POST['submit'])) {
            if(isset($_POST['numelecteur']) && 
            isset($_POST['cni']) && 
            isset($_POST['nomelecteur']) && 
            isset($_POST['prenomelecteur']) && 
            isset($_POST['nompere']) &&
            isset($_POST['nommere']) &&
            isset($_POST['datenaissance']) &&
            isset($_POST['lieunais']) &&
            isset($_POST['mdp']) &&
            isset($_POST['departement']) &&
            isset($_POST['state']) &&
            isset($_POST['city']) &&
            isset($_POST['bureau'])) {
                if(!empty($_POST['numelecteur']) &&
                !empty($_POST['cni']) &&
                !empty($_POST['nomelecteur']) &&
                !empty($_POST['prenomelecteur']) &&
                !empty($_POST['nompere']) &&
                !empty($_POST['nommere']) &&
                !empty($_POST['datenaissance']) &&
                !empty($_POST['lieunais']) &&
                !empty($_POST['mdp']) &&
                !empty($_POST['departement']) &&
                !empty($_POST['state']) &&
                !empty($_POST['city']) &&
                !empty($_POST['bureau'])){
                    
                 $numelecteur = $_POST['numelecteur'];   
                 $cni = $_POST['cni'];
                 $nomelecteur = $_POST['nomelecteur'];
                 $prenomelecteur = $_POST['prenomelecteur'];
                 $nompere = $_POST['nompere'];
                 $nommere = $_POST['nommere'];
                 $datenaissance = $_POST['datenaissance'];
                 $lieunais = $_POST['lieunais'];
                 $mdp = $_POST['mdp'];
                 $departement = $_POST['departement'];
                 $state = $_POST['state'];
                 $city = $_POST['city'];
                 $bureau = $_POST['bureau'];

                    $query = "INSERT INTO ele (num_electeur,cni_election,nomelecteur,prenomelecteur,nompere,nommere,datenaissance,lieudenaissance,mdp,departement,arrondissement,commune,bureau) VALUES ('$numelecteur', '$cni', '$nomelecteur','$prenomelecteur','$nompere','$nommere','$datenaissance','$lieunais','$mdp','$departement','$state','$city','$bureau')";
                    if ($sql = $this->conn->query($query)) {
                        echo "<script>alert('enregistrements ajoutés avec succès');</script>";
                        echo "<script>window.location.href = 'index.php';</script>";
                    }else{
                        echo "<script>alert('Veillez completer tout les champs svp');</script>";
                        echo "<script>window.location.href = 'index.php';</script>";
                    }

                }else{
                    echo "<script>alert('vider');</script>";
                    echo "<script>window.location.href = 'index.php';</script>";
                }
            }
        }
    }
    

        public function verify()
        {
            session_start();
            if (isset($_POST['submit'])) {
                if(isset($_POST['numelecteur']) && 
                isset($_POST['mdp'])) {
                    if(!empty($_POST['numelecteur']) &&
                    !empty($_POST['mdp'])){  
                      
                        $_SESSION['numelecteur'] = $_POST['numelecteur'];
                        $_SESSION['mdp'] = $_POST['mdp'];
                        
                        $numelecteur = $_SESSION['numelecteur'];   
                        $mdp = $_SESSION['mdp'];
                       
                        
    

            $sql="SELECT * FROM ele where num_electeur='$numelecteur' and mdp='$mdp'";
            $result = mysqli_query( $this->conn, $sql);

            {
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['mdp'] === $mdp)
					{
                        session_start();
                        $_SESSION['nomelecteur'] = $user_data['nomelecteur'];
                        $_SESSION['id_electeur'] = $user_data['id_electeur'];
                        $_SESSION['datenaissance'] = $user_data['datenaissance'];
                        $_SESSION['commune'] = $user_data['commune'];
                        $_SESSION['bureau'] = $user_data['bureau'];
                        $_SESSION['prenomelecteur'] = $user_data['prenomelecteur'];


						header("Location: vote.php");

						
					}
				}else{
                    session_destroy();
                    header("Location: index.php");
                    echo "Identifiant ou Mot de passe incorrect ";
                }
			}
            }
            
             }
            }
        }
        
        
        
         public function listeElecteur()
            {
                $data = null;
        
                $query = "SELECT `id_electeur`, `num_electeur`, `nomelecteur`, `prenomelecteur`, `datenaissance`, `lieudenaissance`, `state_name` ,`commune` , `bureau` FROM `ele`FULL JOIN `state` WHERE arrondissement = id
                ";
        
                if($sql = $this->conn->query($query)){
                    while($row = mysqli_fetch_assoc($sql)){
                        $data[] = $row;
                    }
                }
                return $data;
            } 
            
            public function ajoutCandidat()
            {
                if(isset($_POST['submit'])){
                    if(isset($_POST['nom_candidat']) &&
                    isset($_POST['prenom_candidat']) &&
                    isset($_POST['nom_partie']) &&
                    isset($_POST['matricule']) &&
                    isset($_POST['photo'])){
                        if(!empty($_POST['nom_candidat']) &&
                        !empty($_POST['prenom_candidat']) &&
                        !empty($_POST['nom_partie']) &&
                        !empty($_POST['matricule']) &&
                        !empty($_POST['photo'])){
                            $nom_candidat = $_POST['nom_candidat'];   
                            $prenom_candidat = $_POST['prenom_candidat'];
                            $nom_partie = $_POST['nom_partie'];
                            $matricule = $_POST['matricule'];
                            $photo = $_POST['photo'];

                            $query = "INSERT INTO candidat (nom_candidat,prenom_candidat,nom_partie,matricule,profession) VALUES ('$nom_candidat','$prenom_candidat','$nom_partie','$matricule','$photo')";
                            if ($sql = $this->conn->query($query)) {
                                echo "<script>alert('Candidat ajouté');</script>";
                                // echo "<script>window.location.href = 'index.php';</script>";
                            }else{
                                echo "<script>alert('Candidat non ajouté');</script>";
                                // echo "<script>window.location.href = 'index.php';</script>";
                            }
                            
                        }
                    }
                }
            }

            public function listeCandidat()
            {
                $data = null;
        
                $query = "SELECT * FROM candidat";
        
                if($sql = $this->conn->query($query)){
                    while($row = mysqli_fetch_assoc($sql)){
                        $data[] = $row;
                       
                    }
                }
                return $data;
            } 
            public function vote()
            {
                if(isset($_POST['submit'])){
                    if(isset($_POST['id_candidat'])){
                        if(!empty($_POST['id_candidat'])){
                            
                            $id_candidat = $_POST['id_candidat']; 
                            
                            $nom = $_SESSION['nomelecteur'];
                            $prenom = $_SESSION['prenomelecteur'];
                            $idele = $_SESSION['id_electeur'];
                            $commune =$_SESSION['commune'];
                            $bureau = $_SESSION['bureau'];

                           
                            $query = "INSERT INTO vote (id_electeur,nom_electeur,prenom_electeur,id_candidat,commune,bureau) VALUES ('$idele','$nom','$prenom','$id_candidat','$commune','$bureau')";
                            if ($sql = $this->conn->query($query)) {
                                echo "<script>alert('votre vote est bien valider');</script>";
                                echo "<script>window.location.href = '../index.php';</script>";
                                
                                
                              
                            }else{
                                echo "<script>alert('Vous avez déjà voter');</script>";
                               
                                echo "<script>window.location.href = '../index.php';</script>";
                                session_destroy();
                            }
                            
                        }
                    }
                }
            }

            public function listeVote()
            {
                $data = null;
        
                $query = "SELECT `id_vote`, `id_electeur`, `nom_electeur`, `prenom_electeur`, `commune`, `bureau`,`nom_candidat`,`prenom_candidat` FROM `vote` INNER JOIN candidat ON vote.id_candidat = candidat.id_candidat";
        
                if($sql = $this->conn->query($query)){
                    while($row = mysqli_fetch_assoc($sql)){
                        $data[] = $row;
                       
                    }
                }
                return $data;
            }  
            public function id6(){
                $data = null;
                $query = "SELECT `id_vote`, `id_electeur`, `nom_electeur`, `prenom_electeur`, `commune`, `bureau`,`nom_candidat`,`prenom_candidat`,`matricule` FROM `vote` INNER JOIN candidat ON vote.id_candidat = candidat.id_candidat where candidat.id_candidat=6";
                if ($sql = $this->conn->query($query)) {
                    while ($row = $sql->fetch_assoc()) {
                        $data = $row; 
                    }
                }
                return $data;
            }
            public function id6V(){
                $data = null;

                $query = "SELECT * FROM vote where id_candidat = 6";
                if ($sql = $this->conn->query($query)) {
                    while ($rowv = mysqli_fetch_assoc($sql)) {
                        $data[] = $rowv;
                    }
                }
                return $data;
            }

            public function id7(){
                $data = null;
                $query = "SELECT `id_vote`, `id_electeur`, `nom_electeur`, `prenom_electeur`, `commune`, `bureau`,`nom_candidat`,`prenom_candidat`,`matricule` FROM `vote` INNER JOIN candidat ON vote.id_candidat = candidat.id_candidat where candidat.id_candidat=7";
                if ($sql = $this->conn->query($query)) {
                    while ($row = $sql->fetch_assoc()) {
                        $data = $row; 
                    }
                }
                return $data;
            }
            public function id7V(){
                $data = null;

                $query = "SELECT * FROM vote where id_candidat = 7";
                if ($sql = $this->conn->query($query)) {
                    while ($rowv = mysqli_fetch_assoc($sql)) {
                        $data[] = $rowv;
                    }
                }
                return $data;
            }

            public function id9(){
                $data = null;
                $query = "SELECT `id_vote`, `id_electeur`, `nom_electeur`, `prenom_electeur`, `commune`, `bureau`,`nom_candidat`,`prenom_candidat`,`matricule` FROM `vote` INNER JOIN candidat ON vote.id_candidat = candidat.id_candidat where candidat.id_candidat=9";
                if ($sql = $this->conn->query($query)) {
                    while ($row = $sql->fetch_assoc()) {
                        $data = $row; 
                    }
                }
                return $data;
            }
            public function id9V(){
                $data = null;

                $query = "SELECT * FROM vote where id_candidat = 9";
                if ($sql = $this->conn->query($query)) {
                    while ($rowv = mysqli_fetch_assoc($sql)) {
                        $data[] = $rowv;
                    }
                }
                return $data;
            }

            public function id10(){
                $data = null;
                $query = "SELECT `id_vote`, `id_electeur`, `nom_electeur`, `prenom_electeur`, `commune`, `bureau`,`nom_candidat`,`prenom_candidat`,`matricule` FROM `vote` INNER JOIN candidat ON vote.id_candidat = candidat.id_candidat where candidat.id_candidat=10";
                if ($sql = $this->conn->query($query)) {
                    while ($row = $sql->fetch_assoc()) {
                        $data = $row; 
                    }
                }
                return $data;
            }
            public function id10V(){
                $data = null;

                $query = "SELECT * FROM vote where id_candidat = 10";
                if ($sql = $this->conn->query($query)) {
                    while ($rowv = mysqli_fetch_assoc($sql)) {
                        $data[] = $rowv;
                    }
                }
                return $data;
            }

            public function id13(){
                $data = null;
                $query = "SELECT `id_vote`, `id_electeur`, `nom_electeur`, `prenom_electeur`, `commune`, `bureau`,`nom_candidat`,`prenom_candidat`,`matricule` FROM `vote` INNER JOIN candidat ON vote.id_candidat = candidat.id_candidat where candidat.id_candidat=11";
                if ($sql = $this->conn->query($query)) {
                    while ($row = $sql->fetch_assoc()) {
                        $data = $row; 
                    }
                }
                return $data;
            }
            public function id13V(){
                $data = null;

                $query = "SELECT * FROM vote where id_candidat = 11";
                if ($sql = $this->conn->query($query)) {
                    while ($rowv = mysqli_fetch_assoc($sql)) {
                        $data[] = $rowv;
                    }
                }
                return $data;
            }
        	public function delete($id){

                $query = "DELETE FROM candidat where id_candidat = '$id'";
                if ($sql = $this->conn->query($query)) {
                    return true;
                }else{
                    return false;
                }
            }
        
            public function edit($id){

                $data = null;
    
                $query = "SELECT * FROM candidat WHERE id_candidat = '$id'";
                if ($sql = $this->conn->query($query)) {
                    while($row = $sql->fetch_assoc()){
                        $data = $row;
                    }
                }
                return $data;
            }

            public function update($data){

                $query = "UPDATE candidat SET nom_candidat='$data[nom_candidat]', prenom_candidat='$data[prenom_candidat]', nom_partie='$data[nom_partie]', profession='$data[profession]', matricule='$data[matricule]' WHERE id_candidat='$data[id_candidat] '";
    
                if ($sql = $this->conn->query($query)) {
                    return true;
                }else{
                    return false;
                }
            }
        
}


     
   
    

?>