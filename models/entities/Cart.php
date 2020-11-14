<?php

namespace Model;

class Cart implements IECart {

    /*
     * user id
     * :int
     * */
    private int $user_id;
    /*
     * product id
     * :int
     * */
    private int $product_id;
    /*
     * product quantity
     * :int
     * */
    private int $quantity;
   
    /**
     * Product constructor.
     * @param $use_id
     * @param $product_id
     * @param $quantity
     */

    public function __construct( int $user_id, int $product_id, int $quantity)
    {
        $this->user_id = $user_id;
        $this->product_id = $product_id;
        $this->quantity = $quantity;
    }

    public function getUser_id() : int {
        return $this->user_id;
    }

    public function getProduct_id(): int
    {
        return $this->product_id;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

}