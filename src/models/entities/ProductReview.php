<?php

namespace Model\Entity;

use DateTime;

class ProductReview {
    /**
     * @index
     */
    private string $id;
    /*
     * comment
     * 
     * @type string
     * 
     * */
    private string $comment;
    /*
     * user id
     * @type string
     * */
    private string $user_id;
    /*
     * product id
     * @type string
     * */
    private string $product_id;
    /*
     * rating
     * @type int
     * */
    private int $rating;

    /**
     * @type Date
     */
    private \DateTimeInterface $date;

    public function __construct()
    {
        $this->date = new DateTime();
    }
   
    
    public function getId() : string {
        return $this->id;
    }

    public function setId(string $id) {
        $this->id = $id;
    }

    public function getDate() {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date) {
        $this->date = $date;
    }

    /**
     * @param int $rating
     */
    public function setRating(int $rating): self
    {
        $this->rating = $rating;
        return $this;
    }

    public function getRating(): int
    {
        return $this->rating;
    }


    public function setUser_id(string $user_id): self
    {
        $this->user_id = $user_id;
        return $this;
    }

    public function getUser_id(): string
    {
        return $this->user_id;
    }


    public function setProduct_id(string $product_id): self
    {
        $this->product_id = $product_id;
        return $this;
    }

    public function getProduct_id(): string
    {
        return $this->product_id;
    }

    public function setComment(string $comment): self
    {
        $this->comment = $comment;
        return $this;
    }

    public function getComment(): string
    {
        return $this->comment;
    }

}