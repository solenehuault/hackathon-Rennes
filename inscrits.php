<?php

	//fichier contenant les identifiants de la base de données: $serveur, $login, $pass
	require 'config.php';
	
	//Recuperation des champs du formulaire de contact 
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$email = $_POST['email'];
	$metier = $_POST['metier'];
	$message = $_POST['message'];
	
	//Declaration de mes variables en global
	// tableau qui contient le nombre max de place dispo par metier
	$tabmax = array(
		'Developpeur web' => 10,
		'Big Data'=> 10,
		'Designer'=> 10,
		'Referenciel metier'=>10
	);
	// tableau compteur initialisé a 0
	$tabcompteur = array(
		'Developpeur web' => 0,
		'Big Data'=> 0,
		'Designer'=> 0,
		'Referenciel metier'=> 0
	);
	
	//Connexion
	try {
		$connexion= new PDO("mysql:host=$serveur;dbname=hackathon",$login,$pass);
		$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		echo 'Connexion à la base de données réussie! <br>';
		//Appel de la fonction select
		$tableau_result = select($connexion);
		add($tableau_result,$connexion);
		echo "nombre total d'inscripts ", count($tableau_result), " results <br>";
		
	}
	catch (PDOException $e) {
		echo 'Echec de la connexion : '.$e->getMessage();
	}
	
	
	// Fonction select pour recupérer les données dans ma bdd
	function select(PDO $connexion){
		$requete = $connexion->prepare("SELECT * FROM Inscrits");
		$requete->execute();
		$resultat = $requete->fetchall();     
		return $resultat;
	}

	function add($tableau_result,$connexion){
		//Je recupère mes variables globales pour pouvoir les utiliser dans cette fonction
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
			if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email)){
				echo "Adresse mail valide !!!<br>";
				$trouve = false;
				
				//3EME ETAPE : vérifier si il n'existe pas encore :
				foreach($tableau_result as $row){				
					if(($row['nom'] == $nom && $row['prenom'] == $prenom) || $row['email'] == $email) {
						$trouve = true;
						echo 'Votre participation est déja enregistrée <br>';
					}
				}
				if (!$trouve) {
					echo "ce participant n'existe pas! YOUPI!!!!<br>";
					
					// C'est ici que je rappelle la fonction compteur dans la fonction add
					compteur();
					
					if ($tabmax[$metier]>$tabcompteur[$metier]) {
						// Insertion dans la BD du nouveau parcipant
						$sql = "INSERT INTO Inscrits(nom, prenom, email, metier, message) VALUES (:nom,:prenom,:email,:metier,:message)";
						// Envoi des données
						$requete2 = $connexion->prepare($sql);
						$params = array('nom'=>$nom, 'prenom'=>$prenom, 'email'=>$email, 'metier'=>$metier, 'message'=>$message);
						$requete2->execute($params);
						echo "Inscription reussi !!! ";
					}
					else
						echo 'Nous avons déja assez de '.$metier. '<br>';
				}
			}
			else
				echo 'L\'adresse mail ' .$email. ' n\'est pas valide, recommencez ! <br>';
		}
		else
			echo 'Vous n\'avez pas rempli tous les champs <br>';
	}
	
	// fonction pour verifier si il reste de la place pour le metier de l'inscription en cours
	function compteur() {
		//Je recupère mes variables globales pour pouvoir les utiliser dans cette fonction
		global $tableau_result;
		global $tabmax;
		global $tabcompteur;
		// Par rapport au nombre d'inscripts sur un metier 
		foreach ($tableau_result as $key => $row) {
			$tabcompteur[$row['metier']]++;
		}	
	}
?>