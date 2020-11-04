<?php

namespace Model;

interface IEAdmin
{
    public function getPassword();

    public function getId();

    public function getLastname();

    public function getFirstname();

    public function getMail();
}