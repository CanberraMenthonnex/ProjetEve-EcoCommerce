<?php
namespace Model\Entity;

use DateTime;

class User{

    /*
     * Autogenerated by db
     * @type string
     * @index
     * */
    private string $id;

    /*
     * @type string
     * */
    private string $lastname;


    /*
     * @type string
     * */
    private string $firstname;

    /*
     * @type string
     * */
    private string $email ;

    /*
     * @type string
     * */
    private string $password;

    /**
     * @type DateTime
     * */
    private DateTime $birth_date;

    /**
     * @type string
     * */
    private string $adress;

    /**
     * @type string
     */
    private string $phone;

    /**
     * @return hashed string 
     */
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
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string
     */ 
    public function getBirth_date()
    {
        return $this->birth_date;
    }

    /**
     * @return string
     */ 
    public function getAdress()
    {
        return $this->adress;
    }

    /**
     * @return string
     */ 
    public function getPhone()
    {
        return $this->phone;
    }
    

    /**
     * Set /*
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Set /*
     *
     * @return  self
     */ 
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Set /*
     *
     * @return  self
     */ 
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Set /*
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Set /*
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Set the value of birth_date
     *
     * @return  self
     */ 
    public function setBirth_date($birth_date)
    {
        $this->birth_date = $birth_date;

        return $this;
    }

    /**
     * Set the value of adress
     *
     * @return  self
     */ 
    public function setAdress($adress)
    {
        $this->adress = $adress;

        return $this;
    }

    /**
     * Set the value of phone
     *
     * @return  self
     */ 
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }
}