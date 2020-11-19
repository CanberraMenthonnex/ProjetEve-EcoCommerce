<?php

namespace Model\Entity;

class Cart {

    /*
     * product quantity
     * 
     * @type int
     * 
     * */
    private int $quantity;
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
   

    /**
     * @param int $quantity
     */
    
    public function setQuantity(int $quantity): Cart
    {
        $this->quantity = $quantity;
        return $this;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }


    public function setUser_id(string $user_id): Cart
    {
        $this->user_id = $user_id;
        return $this;
    }

    public function getUser_id(): string
    {
        return $this->user_id;
    }


    public function setProduct_id(string $product_id): Cart
    {
        $this->product_id = $product_id;
        return $this;
    }

    public function getProduct_id(): string
    {
        return $this->product_id;
    }



}