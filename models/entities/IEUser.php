<?php

namespace Model;

interface IEUser{

    public function getPassword();

    public function getId();

    public function getLastname();

    public function getFirstname();

    public function getMail();

    public function getBirth_date();

    public function getAdress();
    
}