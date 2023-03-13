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
fputs($monfichier, $nom . "\n");
fputs($monfichier, $prenom . "\n");
fputs($monfichier, $mail . "\n");
fputs($monfichier, $entreprise . "\n");
fputs($monfichier, $tech . "\n");
fputs($monfichier, $autre . "\n");
fputs($monfichier, $date . "\n");
fputs($monfichier, $heure . "\n");
fputs($monfichier, $tel . "\n");

// 3 : quand on a fini de l'utiliser, on ferme le fichier
//fclose($monfichier);


{
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

	// vérifier si il s'agit d'une vrai image
	if (isset($_POST["submit"])) {
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if ($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			echo "File is not an image.";
			$uploadOk = 0;
		}
	}

	// vérifier si le fichier existe déjà dans le dossier
	if (file_exists($target_file)) {
		echo "Désolé, ce fichier existe déja veuillez en prendre un autre.";
		$uploadOk = 0;
	}

	// vérifier le taille du fichier
	if ($_FILES["fileToUpload"]["size"] > 500000) {
		echo "Désolé, votre fichier est trop lourd.";
		$uploadOk = 0;
	}

	// autoriser un format limité pour l'upload
	if (
		$imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif"
	) {
		echo "Désolé les seuls formats autorisés sont : JPG, JPEG, PNG & GIF.";
		$uploadOk = 0;
	}

	// Vérification des erreurs codé au dessus. Si c'est égale à 0 il y aune erreur et un message s'affiche
	if ($uploadOk == 0) {
		echo "Désolé, impossible de télécharger le fichier.";
		// Si tout est bon le fichier s'upload
	} else {
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			echo "Le fichier " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " est bien téléchargé.";
		} else {
			echo "Désolé il y a eu une erreur lors du téléchargement";
		}
	}
}
