<?php

namespace Model\Entity;

class Rating {

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
     * @param int $rating
     */
    
    public function setRating(int $rating): Product_review
    {
        $this->rating = $rating;
        return $this;
    }

    public function getRating(): int
    {
        return $this->rating;
    }


    public function setUser_id(string $user_id): Product_review
    {
        $this->user_id = $user_id;
        return $this;
    }

    public function getUser_id(): string
    {
        return $this->user_id;
    }


    public function setProduct_id(string $product_id): Product_review
    {
        $this->product_id = $product_id;
        return $this;
    }

    public function getProduct_id(): string
    {
        return $this->product_id;
    }

    public function setComment(string $comment): Product_review
    {
        $this->comment = $comment;
        return $this;
    }

    public function getComment(): string
    {
        return $this->comment;
    }

}