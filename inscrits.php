    <?php

    $serveur="localhost";
    $login="root";
    $pass="facesimplon";

    //Recuperation des champs du formulaire de contact 
   
    $nom =$_POST['nom'];
    $prenom=$_POST['prenom'];
    $email=$_POST['email'];
    $metier=$_POST['metier'];
    $message=$_POST['message'];

    $tabmax= array(
        'Developpeur web' => 10,
        'Big Data'=> 10,
        'Designer'=>10,
        'Referenciel metier'=>10
     );

    $tabcompteur= array(
        'Developpeur web' => 0,
        'Big Data'=> 0,
        'Designer'=> 0,
        'Referenciel metier'=>0
    );
   
//Connexion
    try{
    	$connexion= new PDO("mysql:host=$serveur;dbname=hackathon",$login,$pass);
    	$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		echo 'Connexion à la base de données réussie! <br>';
        //Appel de la fonction select
		$tableau_result = select($connexion);

        
        add($tableau_result,$connexion);
		echo "Found ", count($tableau_result), " results <br>'";
        
    }
    catch (PDOException $e){
    	echo 'Echec de la connexion : '.$e->getMessage();
    }

    
    // Fonction select pour recupérer les données dans ma bdd
	function select(PDO $connexion){
		$requete=$connexion->prepare("
			SELECT * FROM Inscrits");
		$requete->execute();
		$resultat=$requete->fetchall();     
                        
        return $resultat;
	}


  
      


function add($tableau_result,$connexion){

        global $nom, $prenom, $email, $metier, $message, $tabcompteur, $tabmax;
        echo $nom."<br>";
        echo $prenom."<br>";
        echo $email."<br>";
        echo $metier."<br>";
        echo $message."<br>";
        // 1ERE ETAPE : vérifier que tous les champs sont complétés (hors message)
        if($nom != null && $prenom != null && $email != null && $metier != null){
            echo "le formulaire est completé! YOUPI!!!!<br>"; 
            // 2EME ETAPE : vérifier la validité du mail :

            if(isset($email)){
               

                if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email)){
                    echo "Adresse mail valide !!!<br>";

                    $trouve = false;
                    //3EME ETAPE : vérifier si il n'existe pas encore :
                        echo "<pre>";
                        print_r($tableau_result);
                        echo "</pre>";
                    foreach($tableau_result as $row){
                        $bd_nom = $row['nom'];
                        $bd_prenom = $row['prenom'];
                        $bd_mail = $row['email'];
                        $bd_metier = $row['metier'];
                    

                        if($bd_nom == $nom && $bd_prenom== $prenom && $bd_mail== $email) {
                            $trouve=true;
                            echo 'Votre participation est déja enregistrée';
                        }
                    }

                    if(!$trouve){
                            //enregister le participant en pensant a incrementer un compteur.
                            echo "ce participant n'existe pas! YOUPI!!!!<br>";

                            // C'est ici que je rappelle la fonction compteur dans la fonction add
                        compteur();

                        if ($tabmax[$metier]>$tabcompteur[$metier]){

                        $sql = "INSERT INTO Inscrits(nom, prenom, email, metier, message) VALUES (:nom,:prenom,:email,:metier,:message)";

                        $requete2= $connexion->prepare($sql);
                        $params = array('nom'=>$nom, 'prenom'=>$prenom, 'email'=>$email, 'metier'=>$metier, 'message'=>$message);
                        $requete2->execute($params);
                        echo "Inscription reussi !!! ";

                        print_r($connexion->errorInfo());

                        }

                        else {
                          echo 'Nous avons déja assez de '.$metier;
                        }


                    }
                }
                   
               
                else{
                    echo 'L\'adresse mail ' .$email. ' n\'est pas valide, recommencez !';
                }
            }
        }

        else {
            $alerte='Vous n\'avez pas rempli tous les champs';
        }
}



function compteur() {
    global $tableau_result;
    global $tabmax;
    global $tabcompteur;

    echo "---------------------------<br>";
    var_dump($tableau_result);
    echo "---------------------------<br>";
    foreach ($tableau_result as $key => $row) {
        $tabcompteur[$row['metier']]++;
    }
     echo "---------------------------<br>";
     echo "<pre>";
     print_r($tabcompteur);  
     echo "</pre>";

     echo "===============================<br>";
     echo "<pre>";
     print_r($tabmax);  
     echo "</pre>";

}



	    
?>