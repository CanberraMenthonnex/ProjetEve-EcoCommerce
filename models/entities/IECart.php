<?php

namespace Model;

interface IECart
{
    public function getQuantity(): int;

    public function getName(): string;

    public function getDescription(): string;

    public function getPrice(): float;
}