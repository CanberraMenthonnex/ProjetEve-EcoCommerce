<?php
namespace Model;

class UserRepository extends Model {

    const TABLE_NAME = "user";


    public function save(string $lastname, string $firstname, $mail, $password, $birth_date, string $adress) : bool {

      return self::_save(
                  self::TABLE_NAME,
                  ["lastname", "firstname", "email", "mdp", "birth_date", "adress"],
                  [$lastname, $firstname, $mail, $password, $birth_date, $adress]
                );

    }

    public static function find(string $mail) : array {

        $data = self::_find(self::TABLE_NAME, ["email"=>$mail]);

        return array_map(function ($item) {
            return new User($item->id, $item->lastname, $item->firstname, $item->email, $item->mdp, $item->birth_date, $item->adress);
        }, $data);

    }

}