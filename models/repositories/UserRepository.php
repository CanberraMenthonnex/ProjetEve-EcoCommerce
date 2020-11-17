<?php
namespace Model;

class UserRepository extends Model {

    const TABLE_NAME = "user";


    public static function save(string $lastname, string $firstname, $mail, $password, $birth_date, string $adress, string $phone) : bool {

      return self::_save(
                  self::TABLE_NAME,
                  ["lastname", "firstname", "email", "password", "birth_date", "adress", "phone"],
                  [$lastname, $firstname, $mail, $password, $birth_date, $adress, $phone]
                );

    }

    public static function find(string $email) : array {

        $data = self::_find(self::TABLE_NAME, ["email"=>$email]);

        return array_map(function ($item) {
            return new User($item->id, $item->lastname, $item->firstname, $item->email, $item->password, $item->birth_date, $item->adress, $item->phone);
        }, $data);

    }

}