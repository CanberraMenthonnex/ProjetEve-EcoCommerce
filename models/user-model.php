<?php

function dbconnect(){
    try{
        $db = new PDO('mysql:host=localhost;dbname=back_office', 'root', 'root', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING));
        return $db;
    }
    catch(Exception $e){
        die('Erreur : '.$e->getMessage());
    }
}

function getID(){

        $db = dbconnect();

        $id = htmlspecialchars($_POST['id']);
        $pwd = htmlspecialchars($_POST['pwd']);

        $query = $db->query("SELECT * FROM `admin` WHERE identifiant = '$id'");// fct ?

        $data_user = $query->fetch();

        return $data_user;


}


function insertID($insert_id, $insert_pwd){
    $db = dbconnect();
    
    $pwd_hash = password_hash($insert_pwd, PASSWORD_DEFAULT);
    $query = $db->prepare("INSERT INTO admin(identifiant,mdp) VALUES(?, ?)");
    $query->execute(array($insert_id,$pwd_hash));

}