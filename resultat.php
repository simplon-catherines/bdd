<?php


$message = $_POST['pseudo'].';'.$_POST['votre_couleur_de_yeux'].';'.$_POST['montant_de_votre_participation'];
echo $message;

$file = "extractionduformulaire";
file_put_contents ($file,$message,FILE_APPEND);

//

try

{
// connecte toi au serveur localhost , derrière dbname ajoute le nom de ta base (test)
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'ecodair');
// $bdd a mettre à chaque requete pour la base de données



}

catch(Exception $e)
// si plantage un message d'erreur s'affiche
{
        die('Une erreur est survenue : '.$e->getMessage());
}




// récuperer les données de mon formulaire pour les inserer dans la base de données

$demande = $bdd ->prepare('INSERT INTO crowdfunding(pseudo,couleuryeux,montantparticipation) VALUES(:pseudo,:couleuryeux,:montantparticipation)');
$demande ->execute(array(
'pseudo'=>$_POST['pseudo'],
'couleuryeux'=>$_POST['votre_couleur_de_yeux'],
'montantparticipation'=>$_POST['montant_de_votre_participation']));

?>
