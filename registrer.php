<?php
include_once("include/fonction_form.php");

// récupération des données envoyées par le formulaire
// deux solutions :
// soit de façon dynamique en créant un array avec les name (en key) des champs à récupérer et la valeur à leur donner par défaut (en value)
//      puis boucler sur ce tableau pour générer les récupérations (création de variables dynamiques)
// soit la façon classique pour tout récupérer les uns après les autres
$nameTags = array(
    "nom" => null,
    "prenom" => null,
    "rue" => null,
    "num" => null,
    "cp" => null,
    "ville" => null,
    "pays" => null,
    "email" => null,
    "sex" => null,
    "hobby" => null,
    "statut" => null,
    "passw" => null,
    "description" => null
);
// création de variables dynamiques à partir du array $nameTages
$data = array();
foreach($nameTags as $key => $value){
    ${"post_".$key} = $data["$key"] = isset($_POST["$key"]) ? $_POST["$key"] : $value;
}
/*
// OU deuxième solution
// est la même chose que de faire :
$post_nom       = isset($_POST["nom"])      ? filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_SPECIAL_CHARS)     : null;
$post_prenom    = isset($_POST["prenom"])   ? filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_SPECIAL_CHARS)  : null;
// etc... pour les autres champs
*/

$input = array();
$input[] = addLayout("<h4>Données personnelles</h4>");
$input[] = addLayout("<div class='row'>");
$input[] = addSelect('Civilité', ["name" => "sex", "class" => "u-full-width"], ["" => "=== choix ===", "M" => "Monsieur", "Mme" => "Madame", "Melle" => "Mademoiselle", "O" => "Autre"], $post_sex, true, "four columns");
$input[] = addInput('Votre nom', ["type" => "text", "value" => $post_nom, "name" => "nom", "class" => "u-full-width"], true, "four columns");
$input[] = addInput('Votre prénom', ["type" => "text", "value" => $post_prenom, "name" => "prenom", "class" => "u-full-width"], true, "four columns");
$input[] = addLayout("</div>");
$input[] = addLayout("<h5>Adresse postale</h5>");
$input[] = addLayout("<div class='row'>");
$input[] = addInput('Rue', array("type" => "text", "value" => $post_rue, "name" => "rue", "class" => "u-full-width"), true, "eight columns");
$input[] = addInput('Numéro', array("type" => "text", "value" => $post_num, "name" => "num", "class" => "u-full-width"), true, "four columns");
$input[] = addLayout("</div>");
$input[] = addLayout("<div class='row'>");
$input[] = addInput('Code postal', array("type" => "text", "value" => $post_cp, "name" => "cp", "class" => "u-full-width"), true, "four columns");
$input[] = addInput('Localité', array("type" => "text", "value" => $post_ville, "name" => "ville", "class" => "u-full-width"), true, "eight columns");
$input[] = addLayout("</div>");
$input[] = addSelect('Pays', array("name" => "pays", "class" => "u-full-width"), array("" => "=== choix ===", "BE" => "Belgique", "FR" => "France", "LU" => "Luxembourg"), $post_pays, true);
$input[] = addLayout("<h5>Qui êtes-vous ?</h5>");
$input[] = addRadioCheckbox('Quels sont vos hobbies', array("name" => "hobby[]"), array("1" => "php", "2" => "js", "3" => "html/css"), $post_hobby, true, "checkbox");
$input[] = addRadioCheckbox('Quel est votre statut', array("name" => "statut[]"), array("1" => "marié", "2" => "célibataire", "3" => "en couple"), $post_statut, true, "radio");
$input[] = addTextarea('Parlez-nous de vous', array("name" => "description", "class" => "u-full-width"), $post_description, true);
$input[] = addLayout("<h4>Création du compte</h4>");
$input[] = addInput('Votre adresse e-mail', array("type" => "email", "value" => $post_email, "name" => "email", "class" => "u-full-width"), true);
$input[] = addInput('Choisissez un mot-de-passe', array("type" => "password", "value" => $post_passw, "name" => "passw", "class" => "u-full-width"), true);

$input[] = addSubmit(["value" => "OK", "name" => "submit"], "\t\t<br />\n");

$show_form = form("form_contact", "form_04.php", "post", $input, "");
$input[] = addLayout("</div>");






?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr" xml:lang="fr">

<head>
    <title></title>
    <meta name="description" content="" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="language" content="fr" />
    <meta name="revisit-after" content="7 days" />
    <meta name="robots" content="index, follow" />
    <link rel="stylesheet" type="text/css" href="css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="css/skeleton.css" />
    <link rel="stylesheet" type="text/css" href="css/skeleton_collapse.css" />
    <link rel="stylesheet" type="text/css" href="css/custom.css" />

</head>
<body>
<div class="container">
    <?php
    if($show_form != false){
        // affichage du formulaire
        echo $show_form;
    }else{
        // insertion dans la DB par exemple
        // ...
    }
    ?>
</div>
</body>
</html>