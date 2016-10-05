


//Pour vérifier que tous les champs obligatoire sont complétés

if ($nom != null || $prenom != null || $mail != null || metier != "Je suis ?") {
        # code...
    }
    else {
        $alerte='Vous n\'avez pas rempli tous les champs';
    }











// pour vérifier la validité du mail :





    if (isset($_POST['mail'])){
    $_POST['mail'] = htmlspecialchars($_POST['mail']); // On rend inoffensives les balises HTML que le visiteur a pu rentrer

        if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['mail']))

        {

        }

        else

        {
            echo 'L\'adresse ' . $_POST['mail'] . ' n\'est pas valide, recommencez !';
        }
    }


$compteurDevWeb = 0;
$compteurRefMetier =0;
Designer
Big Data

if ($metier== Developpeur web){
    $compteurDevWeb = +1;
}

?>


