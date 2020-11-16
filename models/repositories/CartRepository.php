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


    public static function getInfos() {

        $user = 1;
        
        $db = Model::getDb();
    
        $query = $db->prepare(
            "SELECT name, description, price, quantity
             FROM cart
             INNER JOIN product ON cart.product_id = product.id
             WHERE user_id = :user_id"
        );
        
        $query->execute(["user_id" => $user]);
        
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }
}