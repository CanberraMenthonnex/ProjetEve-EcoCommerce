<?php

namespace Model;

interface IEProduct
{
    public function getName(): string;

    public function getDescription(): string;

    public function getPrice(): float;

    public function getDate(): \DateTimeInterface;
}