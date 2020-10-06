<?php
require('../models/user-model.php');

function logPage() {
    require('../views/log-page.php');
}

function login () {

    if(isset($_POST["send"]) && isset($_POST["pwd"])) {
        
        $id = getID();

        if($id) {

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
            echo "Mauvais id";
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
    //Check si pseudo déjà pris
    //inclure le mail et vérifier s'il existe déjà
    //Double mdp pour vérif
    //déplacer la variable pwd_hache sur le controller (le modèle ne doit contenir UNIQUEMENT du SQL)
    if(isset($_POST["new_send"]) && isset($_POST["new_pwd"]) && isset($_POST["new_id"])){

        $id = htmlspecialchars($_POST['new_id']);
        $pwd = htmlspecialchars($_POST['new_pwd']);

        if((strlen($id) < 25) || (!preg_match('[,?.;/:!<>$_€]', $id)) || (!preg_match('[0-9]', $id))){
            if(preg_match('#[a-z]#', $pwd) && (preg_match('#[A-Z]#', $pwd)) && (preg_match('#[_?/:!$]#' , $pwd)) || (preg_match('#[0-9]#', $pwd))){
                insertID($id,$pwd);
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
