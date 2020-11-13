<?php
namespace Model\Entity;

class Admin  {

    /*
     * Autogenerated by db
     * :number
     * */
    private string $id;


    /*
     * :string
     * */
    private string $lastname;


    /*
     * :string
     * */
    private string $firstname;

    /*
     * :string
     * */
    private string $mail ;

    /*
     * :string
     * */
    private string $password;

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @param string $lastname
     */
    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }

    /**
     * @param string $mail
     */
    public function setMail(string $mail): void
    {
        $this->mail = $mail;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getPassword() {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }


}