<?php
require('../models/user-model.php');

function logPage() {
    require('../views/log-page.php');
}

function loginAdmin () {

    if(isset($_POST["send"]) && isset($_POST["pwd"]) && isset($_POST["email"])) {
        
        $email = htmlspecialchars($_POST['email']);
        $pwd = htmlspecialchars($_POST['pwd']);

        $id = getID($email);
        
        
        if($email) {

            if(password_verify($_POST["pwd"], $id['mdp'])) {
                echo "Vous êtes co";
            }
            else
            {
                echo "Mauvais mdp";
            }
        }
        else
        {
            echo "Mauvais email";
        }
    }
    else
    {
        throw new Exception("404");
    }

}

function subPage () {
    require('../views/signPage.php');
}

function signIn (){
    //inclure le mail et vérifier s'il existe déjà check
    //Double mdp pour vérif check
    //déplacer la variable pwd_hache sur le controller (le modèle ne doit contenir UNIQUEMENT du SQL) check   --> OK
    if(isset($_POST["new_send"]) && isset($_POST["new_pwd"]) && isset($_POST["new_pwd_check"]) && isset($_POST["new_lastname"]) && isset($_POST["new_firstname"]) && isset($_POST["new_email"])){
        $firstname = htmlspecialchars($_POST["new_firstname"]);
        $lastname = htmlspecialchars($_POST["new_lastname"]);
        $email = htmlspecialchars($_POST["new_email"]);
        $pwd = htmlspecialchars($_POST["new_pwd"]);
        $pwd_check = htmlspecialchars($_POST["new_pwd_check"]);
        
        if($pwd === $pwd_check && filter_var($email, FILTER_VALIDATE_EMAIL) && preg_match('#[a-z]#', $pwd) && (preg_match('#[A-Z]#', $pwd)) && (preg_match('#[_?/:!$]#' , $pwd)) || (preg_match('#[0-9]#', $pwd))){
            if(getID($email) === null){
                $pwd_hash = password_hash($insert_pwd, PASSWORD_DEFAULT);
                
            }else{
                echo "email déjà pris veuillez en entrer un nouveau";
            }
        }else{
            echo "Les mots de passe ne correspondent pas";
        }
    
    
        if((strlen($id) < 25) || (!preg_match('[,?.;/:!<>$_€]', $id)) || (!preg_match('[0-9]', $id))){
            if(preg_match('#[a-z]#', $pwd) && (preg_match('#[A-Z]#', $pwd)) && (preg_match('#[_?/:!$]#' , $pwd)) || (preg_match('#[0-9]#', $pwd))){
                insertID($id,$pwd_hash);
            }else{
                echo"mdp incorrecte";
            }       
        }else{
            echo"id incorrecte";
        }
        
    }else{
        echo "Erreur !";
    }
}
