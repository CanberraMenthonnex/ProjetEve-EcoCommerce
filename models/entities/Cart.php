<?php

namespace Model;

class Cart implements IECart {

    /*
     * product quantity
     * :int
     * */
    private int $quantity;
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
   
    /**
     * Product constructor.
     * @param $quantity
     * @param $name
     * @param $description
     * @param $price
     */

    public function __construct(int $quantity, string $name, string $description, string $price)
    {
        $this->quantity = $quantity;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
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

}