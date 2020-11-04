<?php

namespace Model;

class Product implements IEProduct {

    /*
     * product id
     * :string
     * */
    private string $id;
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
    public function __construct( string $id , string $name, string $description, string $price, \DateTimeInterface $date)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->date = $date;
    }

    public function getId() : string {
        return $this->id;
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