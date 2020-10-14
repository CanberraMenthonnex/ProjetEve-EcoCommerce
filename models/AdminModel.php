<?php
namespace Model;

class AdminModel extends Model {

    const TABLE_NAME = "admin";

    /*
     * Autogenerated by db
     * :number
     * */
    private $id;

    /*
     * :string
     * */
    private $lastname;

    /*
     * :string
     * */
    private $firstname;

    /*
     * :string
     * */
    private $mail;

    /*
     * :string
     * */
    private $password;

    public function __construct($lastname, $firstname, $mail, $password)
    {
        $this->lastname = $lastname;
        $this->firstname = $firstname;
        $this->mail = $mail;
        $this->password = $password;
    }

    public function save() : bool {

      return self::_save(
                  self::TABLE_NAME,
                  ["lastname", "firstname", "email", "mdp"],
                  [$this->lastname, $this->firstname, $this->mail, $this->password]
                );

    }

    public static function find(string $mail) : array {
        return self::_find(self::TABLE_NAME, ["email"=>$mail]);
    }

}