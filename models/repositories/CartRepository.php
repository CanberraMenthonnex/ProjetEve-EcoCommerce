<?php 

namespace Model;

class CartRepository extends Model {

    const TABLE_NAME = "cart";

    public static function save (int $user_id, int $product_id, int $quantity) {
        return self::_save(
            self::TABLE_NAME,
            ["user_id", "product_id", "quantity"],
            [$user_id, $product_id, $quantity]
        );
    }
}