    <?php

    $serveur="localhost";
    $login="root";
    $pass="facesimplon";

    //Les champs du formulaire de contact 
    
    $nom =$_POST['nom'];
    $prenom=$_POST['prenom'];
    $email=$_POST['email'];
    $metier=$_POST['metier'];
    $message=$_POST['message'];
    //$resultat;

    //Variable pour les compteur
    $compteurMax = array (
                        [BackEnd]=>10,
                        [FrontEnd]=>10,
                        [BigData]=>10,
                        [Designer]=>10,
    $compteurs = [];
     $compteurs['dev']

    try{
    	$connexion= new PDO("mysql:host=$serveur;dbname=hackathon",$login,$pass);
    	$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		echo 'Connexion à la base de données réussie! <br>';
		$tableau_result = select($connexion);

        genereMesCompteurs($tableau_result);
            --> global $compteurs;
            --> compteurs[$row['metier']] ++;

        add($tableau_result,$connexion);
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
        //3EME ETAPE : vérifier si il n'existe pas encore :
        // foreach($resultat as $row){
        //     $bd_nom = $row['nom'];
        //     $bd_prenom = $row['prenom'];
        //     $bd_mail = $row['mail'];
        //     var_dump($bd_nom);
        //                 }
         //print_r($resultat);
        
                        
        return $resultat;
	}


    function genereMesCompteurs($tableau_result){
            global $compteurs;
            $compteurs[$row['metier']] ++;
    }
      


    function add($tableau_result,$connexion){

        global $nom, $prenom, $email, $metier, $message;
        echo $nom."<br>";
        echo $prenom."<br>";
        echo $email."<br>";
        echo $metier."<br>";
        echo $message."<br>";
        // 1ERE ETAPE : vérifier que tous les champs sont complétés (hors message)
        if($nom != null && $prenom != null && $email != null && $metier != "je suis?"){
            echo "le formulaire est completé! YOUPI!!!!<br>"; 
            // 2EME ETAPE : vérifier la validité du mail :

            if(isset($email)){
                $email = htmlspecialchars($email); // On rend inoffensives les balises HTML que le visiteur a pu rentrer

                if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email)){
                    echo "Adresse mail valide !!!<br>";

                    //3EME ETAPE : vérifier si il n'existe pas encore :
                    foreach($tableau_result as $row){
                        $bd_nom = $row['nom'];
                        $bd_prenom = $row['prenom'];
                        $bd_mail = $row['email'];
                        $bd_metier = $row['metier'];
                        echo "<pre>";
                        print_r($tableau_result);
                        echo "</pre>";

                        if($bd_nom != $nom && $bd_prenom!= $prenom && $bd_mail!= $email) {
                            //enregister le participant en pensant a incrementer un compteur.
                            echo "ce participant n'existe pas! YOUPI!!!!<br>";

                                $compteurDev=10;
                                if($metier = "Developpeur web" && $compteurDev > 0) {
                                   $compteurDev--;
                                   $sql = "INSERT INTO Inscrits(id, nom, prenom, email, metier, message) VALUES (null,:nom,$prenom,$email,$metier,$message)";

                                   $requete2= $connexion->prepare($sql);

                                   $params = array("nom"=>$nom, );
                                   $requete2->execute($params);
                                   
                                    print_r($connexion->errorInfo());

        // $requete=$connexion->prepare("SELECT * FROM Inscrits");
        // $requete->execute();
        // $resultat=$requete->fetchall();



                                }
                        }
                        else{
                            echo 'Votre participation est déja enregistrée';
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