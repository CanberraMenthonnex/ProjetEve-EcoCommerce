<?php

namespace Model\Entity;

use DateTime;

class Product extends EntityBase {

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
     * creation Date
     * :DateTimeInterface
     * */
    private \DateTimeInterface $createdAt;

    /**
     * update date
     * :DateTimeInterface
     */
    private \DateTimeInterface $updatedAt;

    /**
     * For setting default values 
     * !! no params
     */
    public function __construct()
    {
        $this->createdAt = $this->createDate(new DateTime());
        $this->updatedAt =  $this->createDate(new DateTime());
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

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getUpdatedAt () : \DateTimeInterface 
    {
        return $this->updatedAt;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    public function setPrice(float $price)
    {
        $this->price = $price;
    }

    public function setCreatedAt($date)
    {
        $this->createdAt = $this->createDate($date);
    }

    public function setUpdatedAt($date) {
        $this->updatedAt = new \DateTime( $date );
    }
}