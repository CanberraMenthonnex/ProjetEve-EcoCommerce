<?php 

namespace Model;

class CartRepository extends Model {

    const TABLE_NAME = "cart";


    public static function getId() {
        $db = Model::getDb();

        $prdt_id = 2;           // VOIR AVEC MATTHIEU

        $req= $db->prepare("SELECT COUNT(*) AS id FROM cart WHERE product_id = :product_id");
        $req->execute(["product_id" => $prdt_id]);

        return $req->fetch(\PDO::FETCH_ASSOC);
    }


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
            "SELECT product_id, name, description, price, quantity
             FROM cart
             INNER JOIN product ON cart.product_id = product.id
             WHERE user_id = :user_id"
        );
        
        $query->execute(["user_id" => $user]);
        
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }


    public static function deleteById(string $product_id) {
        return self::_delete(self::TABLE_NAME, ["product_id"=>$product_id]);
    }



//  CREER LA FONCTION POUR MODIFIER AVEC _UPDATE






/*
    public static function modifyQuantity() {
        $db = Model::getDb();

        $query = $db->prepare(
            "UPDATE cart                                    FONCTION MANNUELLE POUR UPDATE (MARCHE SUREMENT PAS)
            SET quantity = :quantity
            WHERE product_id = :product_id"
        );

        $query->execute(["quantity" => $quantity, "product_id" => $product_id]);
    }
*/
}