<?php
session_start();

include("models/siteModel.php");

function indexControlleur(){

    $projets = getProjets();
    include("vues/indexVue.php");
}

function administrationControlleur(){
    include("vues/administrationVue.php");
}

function projetAdministrateurControlleur(){
    $projets = getProjets();
    include("vues/projetAdministrationVue.php");

}
function utilisateurAdministrationControlleur(){
    $utilisateurs = getUtilisateurs();
    include("vues/utilisateurAdministrationVue.php");
}
function submitControlleur(){
    
    $username = $_POST["username"];
    $password = md5($_POST["password"]);

    $results = submit($username, $password);

    if (!$results) {
        echo "<p>Error: " . mysqli_error($bdd) . "</p>";
        echo "<p>" . $sql . "</p>";
        exit();
    }
    
    if (mysqli_num_rows($results)) {
        $user = mysqli_fetch_assoc($results);
        $_SESSION["user"] = (array)$user;
        header("location:administration.php");
    } else {
        $_SESSION["user"] = null;
        header("location:index.php?loginerror=1");
        exit();
    }
}

function newlettersSubmitControlleur(){
    
    $email = $_POST["email"];

    $success = newlettersSubmit($email);

    if ($success) {
        header("location:index.php");
        exit();
    } else {
        header("location:index.php?erreur=1");
        exit();
    }
}

function messageSubmitControlleur(){
    
    $nom = $_POST["nom"];
    $email = $_POST["email"];
    $sujet = $_POST["sujet"];
    $message = $_POST["message"];

    $success = messageSubmit($nom, $email, $sujet, $message);

    if ($success) {
        header("location:index.php");
        exit();
    } else {
        header("location:index.php?erreur=1");
        exit();
    }
}


function deconnexionControlleur(){
    session_destroy(); 
    header("location:index.php");
    exit(); 
}

function ajoutProjetControlleur(){
    include("vues/ajoutProjetVue.php");
}


function ajoutUtilisateurControlleur(){
    include("vues/ajoutUtilisateurVue.php");
}

function ajoutProjetSubmitControlleur() {
    $titre = $_POST["titre"];
    $type = $_POST["type"];
    $description = $_POST["description"];
    $image = "source/Images/" . basename($_FILES["image"]["name"]);
    $audio = "source/Trames/" . basename($_FILES["audio"]["name"]);

    move_uploaded_file($_FILES["image"]["tmp_name"], $image);
    move_uploaded_file($_FILES["audio"]["tmp_name"], $audio);

    $success = ajouterProjet($titre, $type, $description, $image, $audio);

    if ($success) {
        header("location:projetAdministration.php");
        exit();
    } else {
        header("location:ajoutProjet.php?erreur=1");
        exit();
    }
}

function ajoutUtilisateurSubmitControlleur() {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $password = md5($password);
    $email = $_POST["email"];
    $success = ajouterUtilisateur($username, $password, $email);

    if ($success) {
        header("location:utilisateurAdministration.php");
        exit();
    } else {
        header("location:ajoutUtilisateur.php?erreur=1");
        exit();
    }
}

function supprimerProjetControlleur() {
    $id = $_GET["id"];

    $success = supprimerProjet($id);
    
    if ($success) {
        header("location:projetAdministration.php");
        exit();
    } else {
        header("location:projetAdministration.php?erreur=1");
        exit();
    }
}

function supprimerUtilisateurControlleur() {
    $id = $_GET["id"];

    $success = supprimerUtilisateur($id);
    
    if ($success) {
        header("location:utilisateurAdministration.php");
        exit();
    } else {
        header("location:utilisateurAdministration.php?erreur=1");
        exit();
    }
}

function modifierProjetControlleur() {
    $id = $_GET["id"];
    $projet = getProjet($id);

    include("vues/modifierProjetVue.php");
}

function modifierUtilisateurControlleur() {
    $id = $_GET["id"];
    $utilisateur = getUtilisateur($id);

    include("vues/modifierUtilisateurVue.php");
}

function modifierProjetSubmitControlleur() {
    $id = $_POST["id"];
    $titre = $_POST["titre"];
    $type = $_POST["type"];
    $description = $_POST["description"];
    $image = "source/Images/" . basename($_FILES["image"]["name"]);
    $audio = "source/Trames/" . basename($_FILES["audio"]["name"]);

    move_uploaded_file($_FILES["image"]["tmp_name"], $image);
    move_uploaded_file($_FILES["audio"]["tmp_name"], $audio);

    $success = modifierProjet($id, $titre, $type, $description, $image, $audio);

    if ($success) {
        header("location: projetAdministration.php");
    } else {
        header("location: modifierprojet.php?id=$id&erreur=1");
    }
}

function modifierUtilisateurSubmitControlleur() {
    $id = $_POST["id"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];;

    $success = modifierUtilisateur($id, $username, $email, $password);

    if ($success) {
        header("location: utilisateurAdministration.php");
    } else {
        header("location: modifierUtilisateur.php?id=$id&erreur=1");
    }
}