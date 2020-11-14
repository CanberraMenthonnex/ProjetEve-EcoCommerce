<?php

namespace Model\Entity;

use DateTime;

class Product extends EntityBase {

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

    /*
     * product id
     * :string
     * */
    protected string $id;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Product
     */
    public function setId(string $id): Product
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Product
     */
    public function setName(string $name): Product
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Product
     */
    public function setDescription(string $description): Product
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     * @return Product
     */
    public function setPrice(float $price): Product
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return DateTime|\DateTimeInterface|false|null
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param DateTime|\DateTimeInterface|false|null $createdAt
     * @return Product
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $this->createDate($createdAt);
        return $this;
    }

    /**
     * @return DateTime|\DateTimeInterface|false|null
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param DateTime|\DateTimeInterface|false|null $updatedAt
     * @return Product
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $this->createDate($updatedAt);
        return $this;
    }

 

}