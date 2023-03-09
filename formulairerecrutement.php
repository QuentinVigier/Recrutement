<?php

	$nom = htmlspecialchars($_POST["nom"]);
	$prenom = htmlspecialchars($_POST["prenom"]);
	$mail = htmlspecialchars($_POST["mail"]);
	$entreprise = htmlspecialchars($_POST["entreprise"]);
	$tech = htmlspecialchars($_POST["tech"]);
    $autre = htmlspecialchars($_POST["autre"]);
    $date = htmlspecialchars($_POST["date"]);
    $heure = htmlspecialchars($_POST["heure"]);
    $tel = htmlspecialchars($_POST["tel"]);

	echo 'Au plaisir de vous parler pour notre entreteien Mr ' . $nom . ' !';

	// 1 : on ouvre le fichier
	$monfichier = fopen('donneesformulaire.txt', 'a+');
	fputs($monfichier, "==================================\n"); 
	fputs($monfichier, $nom."\n"); 
	fputs($monfichier, $prenom."\n"); 
	fputs($monfichier, $mail."\n"); 
	fputs($monfichier, $entreprise."\n");
    fputs($monfichier, $tech."\n"); 
    fputs($monfichier, $autre."\n"); 
    fputs($monfichier, $date."\n"); 
    fputs($monfichier, $heure."\n"); 
    fputs($monfichier, $tel."\n"); 
    
	// 3 : quand on a fini de l'utiliser, on ferme le fichier
	fclose($monfichier);


?>