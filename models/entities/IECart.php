<?php

namespace Model;

interface IECart
{
    public function getUser_id(): int;

    public function getProduct_id(): int;

    public function getQuantity(): int;
}