<?php

include("includes/bdd.php");

function getProjet($id) {
    global $bdd;

    $sql = "
        SELECT id, titre, type, description, image, audio
        FROM projet
        WHERE id = $id
    ";
    $resultat = mysqli_query($bdd, $sql);

    return mysqli_fetch_assoc($resultat);
}

function getUtilisateur($id) {
    global $bdd;

    $sql = "
        SELECT id, username, email, password
        FROM users
        WHERE id = $id
    ";
    $resultat = mysqli_query($bdd, $sql);

    return mysqli_fetch_assoc($resultat);
}

function getUtilisateurs() {
    global $bdd;

    $sql = "
        SELECT id, username, email
        FROM users
    ";
    $resultats = mysqli_query($bdd, $sql);

    return $resultats;

}

function getProjets(){
    global $bdd;

    $sql = "
        SELECT id, titre, type, description, image, audio
        FROM projet
    ";
    $resultats = mysqli_query($bdd, $sql);

    return $resultats;

}

function ajouterProjet($titre, $type, $description, $image, $audio) {
    global $bdd;

    $sql = "
        INSERT INTO projet
            (titre, type, description, image, audio)
        VALUES
            ( ? , ? , ?, ?, ?)
    ";

    $requete = mysqli_prepare($bdd, $sql);
    mysqli_stmt_bind_param($requete, "sssss", $titre, $type, $description, $image, $audio);
    return mysqli_stmt_execute($requete);
}


function ajouterUtilisateur($username, $password, $email) {
    global $bdd;

    $sql = "
        INSERT INTO users
            (username, password, email)
        VALUES
            ( ? , ? , ?)
    ";

    $requete = mysqli_prepare($bdd, $sql);
    mysqli_stmt_bind_param($requete, "sss", $username, $password,  $email);
    return mysqli_stmt_execute($requete);
}

function supprimerProjet($id) {
    global $bdd;

    $sql = "
        DELETE FROM projet
        WHERE id = $id
    ";

    return mysqli_query($bdd, $sql);
}

function supprimerUtilisateur($id) {
    global $bdd;

    $sql = "
        DELETE FROM users
        WHERE id = $id
    ";

    return mysqli_query($bdd, $sql);
}


function modifierProjet($id, $titre, $type, $description, $image, $audio) {
    global $bdd;

   if(empty($_FILES["image"]["name"]) AND empty($_FILES["audio"]["name"])){
            
        $sql = "
        UPDATE projet
        SET
            titre = '$titre',
            type = '$type',
            description = '$description'
        WHERE id = $id
    ";
    $requete = mysqli_prepare($bdd, $sql);
    mysqli_stmt_bind_param($requete, "sss", $titre, $type, $description);
    return mysqli_stmt_execute($requete);

        } elseif(empty($_FILES["image"]["name"])){
    
            $sql = "
            UPDATE projet
            SET
                titre = '$titre',
                type = '$type',
                description = '$description',
                audio = '$audio'
            WHERE id = $id
        ";

        $requete = mysqli_prepare($bdd, $sql);
        mysqli_stmt_bind_param($requete, "ssss", $titre, $type, $description, $audio);
        return mysqli_stmt_execute($requete);

        } elseif(empty($_FILES["audio"]["name"])){
    
            $sql = "
            UPDATE projet
            SET
                titre = '$titre',
                type = '$type',
                description = '$description',
                image = '$image'
            WHERE id = $id
        ";
        $requete = mysqli_prepare($bdd, $sql);
        mysqli_stmt_bind_param($requete, "ssss", $titre, $type, $description, $image);
        return mysqli_stmt_execute($requete);
        } else {

            $sql = "
                UPDATE projet
                SET
                    titre = '$titre',
                    type = '$type',
                    description = '$description',
                    image = '$image',
                    audio = '$audio'
                WHERE id = $id
        ";
        $requete = mysqli_prepare($bdd, $sql);
        mysqli_stmt_bind_param($requete, "sssss", $titre, $type, $description, $image, $audio);
        return mysqli_stmt_execute($requete);
        }
}

function modifierUtilisateur($id, $username, $email, $password) {
    global $bdd;

    $sql = "
    UPDATE users
    SET
        email = '$email'
    WHERE id = $id
";
$requete = mysqli_prepare($bdd, $sql);
mysqli_stmt_bind_param($requete, "s", $email);
return mysqli_stmt_execute($requete);

}


function submit($username, $password) {
    global $bdd;

    $sql = "
    SELECT * FROM users 
    WHERE username = '$username' AND password = '$password'
";

$results = mysqli_query($bdd, $sql);
return $results;
}

function newlettersSubmit($email) {
    global $bdd;

    $sql = "
        INSERT INTO newletters
            (email)
        VALUES
            ( ? )
    ";

    $requete = mysqli_prepare($bdd, $sql);
    mysqli_stmt_bind_param($requete, "s", $email);
    return mysqli_stmt_execute($requete);
}

function messageSubmit($nom, $email, $sujet, $message) {
    global $bdd;

    $sql = "
        INSERT INTO message
            (nom, email, sujet, message)
        VALUES
            ( ? , ? , ? , ? )
    ";

    $requete = mysqli_prepare($bdd, $sql);
    mysqli_stmt_bind_param($requete, "ssss", $nom, $email, $sujet, $message);
    return mysqli_stmt_execute($requete);
}