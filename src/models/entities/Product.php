<?php

namespace Model\Entity;

use DateTime;

class Product  {

    /*
    * product id
    * 
    * @type string
    * @index
    * */
    private string $id;
    /*
     * product Name
     * 
     * @type string
     * */
    private string $name;

    /*
     * Description
     * 
     * @type string
     * */
    private string $description;
    /*
     * product price
     * @type float
     * */
    private float  $price;

    /**
     * image url
     *
     * @type string
     */
    private string $imageUrl;

    /**
     * Category
     *
     * @type string
     */
    private string $category;


    /** 
     * creation Date
     * 
     * @type DateTime
     * */
    private \DateTimeInterface $createdAt;

    /**
     * update date
     * 
     * @type DateTime
     */
    private \DateTimeInterface $updatedAt;

    /**
     * For setting default values
     * !! no params
     */
    public function __construct()
    {
        $this->createdAt = new DateTime();
        $this->updatedAt =  new DateTime();
    }

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
     * @return string
     */
    public function getImageUrl(): string
    {
        return $this->imageUrl;
    }

    /**
     * @param string $imageUrl
     * @return Product
     */
    public function setImageUrl(string $imageUrl): Product
    {
        $this->imageUrl = $imageUrl;
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
        $this->createdAt = $createdAt;
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
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * @param string $category
     * @return Product
     */
    public function setCategory(string $category): Product
    {
        $this->category = $category;
        return $this;
    }
 

}