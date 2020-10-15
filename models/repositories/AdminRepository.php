<?php
namespace Model;

class AdminRepository extends Model {

    const TABLE_NAME = "admin";


    public function save($lastname, $firstname, $mail, $password) : bool {

      return self::_save(
                  self::TABLE_NAME,
                  ["lastname", "firstname", "email", "mdp"],
                  [$lastname, $firstname, $mail, $password]
                );

    }

    public static function find(string $mail) : array {

        $data = self::_find(self::TABLE_NAME, ["email"=>$mail]);

        return array_map(function ($item) {
            return new Admin($item->id, $item->lastname, $item->firstname, $item->email, $item->mdp);
        }, $data);

    }

}