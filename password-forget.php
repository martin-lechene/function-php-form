<?php 
    include_once("./include/fonction_form.php"); // n'inclure qu'une fois.
    // In $post_email = isset($_POST["email"]) ? filter_inpput(INPUT_POST, 'login', FILTER_SANITIZE_SPECIAL_CHARS) : null; 
    $post_email     = isset($_POST["email"])    ? is_mail(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL, FILTER_VALIDATE_EMAIL, FILTER_SANITIZE_SPECIAL_CHARS)) : null;
    
    $input = []; // Instancier tableau de la var $input 
    $input[] = addLayout("<h3> Password forget ? </h3>"); // Ajouter via modèle addLayout("TITLE OF PAGE");
    $input[] = addLayout("<div class=\"row\">");
    $input[] = addInput("Your email for found your password", ["type" => "email", "value" => $post_email, "name" => "email", "class" => "u-full-width"], true, "five columns");
    $input[] = addSubmit(["value" => "send", "type" => "submit"], "<br/>", "two columns");
    $input[] = addLayout("<div class=\"return home page\"><a href=\"login.php\">Return home page</a>");
    
    $input[] = addLayout("</div>");


    // In $show_form < crée form ("form_contact", "login.php", "post", $input);
    $show_form = form("form_contact", "login.php", "post", $input);



?> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//FR"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DOGANDDEV - Password forget</title>
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
    if($show_form != false){ // Si $show_form est différent de faux
        // affichage du formulaire
        echo $show_form;
    }else{ // SINON 
        // AJOUT IN DB
    }
    ?>
</div>
</body>
</html>