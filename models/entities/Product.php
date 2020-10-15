<?php

namespace Model;

class Product implements IEProduct {

    /*
     * product name
     * :string
     * */
    private string $name;
    /*
     * product description
     * :string
     * */
    private string $description;
    /*
     * product price
     * :float
     * */
    private float  $price;

    /*
     * product date
     * :DateTimeInterface
     * */
    private \DateTimeInterface $date;

    /**
     * Product constructor.
     * @param $name
     * @param $description
     * @param $price
     * @param $date
     */
    public function __construct(string $name, string $description, string $price, \DateTimeInterface $date)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->date = $date;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getDate(): \DateTimeInterface
    {
        return $this->date;
    }
}