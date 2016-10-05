    <?php

    $serveur="localhost";
    $login="root";
    $pass="facesimplon";


    //Les champs du formulaire de contact 
    $nom=$_POST[nom];
    $prenom=$_POST[prenom];
    $email=$_POST[email];
    $metier=$_POST[metier];
    $message=$_POST[message];



    try{
    	$connexion= new PDO("mysql:host=$serveur;dbname=hackathon",$login,$pass);
    	$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		echo 'Connexion à la base de données réussie!';
		$tableau_result = select($connexion);
		echo "Found ", count($tableau_result), " results";
    }
    catch (PDOException $e){
    	echo 'Echec de la connexion : '.$e->getMessage();
    }

    

	function select(PDO $connexion){
		$requete=$connexion->prepare("
			SELECT * FROM Inscrits");
		$requete->execute();
		$resultat=$requete->fetchall();
		return $resultat;
	}
      
    	
    if ($nom != null || $prenom != null || $mail != null) {
        # code...
    }
    else {
        $alerte='Vous n\'avez pas rempli tous les champs';
    }

/*
	function Add(){
		$insertion="INSERT INTO Inscrits(nom,prenom,email,metier,message)
					VALUES ($nom,$prenom,$email,$metier,$message)";

			for ($i=0; $i < $tablenght; $i++) { 
				if ($tablenght<40) {
					
				
    				switch ($resultat) {
    					case '$email='email'':
    						 	echo 'Cette adresse mail est déjà enregistrée';
    						break;
    					case '$metier = Developpeur web || countmetier Developpeur web >= 10' :
    						 	echo 'Nous avons suffisament de Developpeur web';
    						break;
    					case '$metier = Réferenciel métier ||countmetier Réferenciel métier >= 10':
    						 	echo 'Nous avons suffisament de Réferenciel métier';
    						break;
    					case '$metier = Designer || countmetier Designer >= 10':
    						 	echo 'Nous avons suffisament de Designer';
    						break;
    					case '$metier = Big Data || countmetier Big Data >= 10':
    						 	echo 'Nous avons suffisament de Big Data';
    						break;
    					
    					default:
    						$connexion->exec($insertion);
							echo 'Nous vous remercions, votre participation est bien enregistrée, à très vite !'
    						break;
					}
				}

				
    			else{

					echo 'Nous sommes au complet !'
       			}
			}

	}*/
	    
?>