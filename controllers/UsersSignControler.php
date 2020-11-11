<?php

class UsersSignController{
    public static function signUserPage() {
        self::render("sign-page.php");
    }

    public static function sign(Users $user){
        if(self::checkPostKeys($_POST, ["lastname", "firstname", "email", "pwd", "birth_date", "adress"])) {
            
        }
    }

}