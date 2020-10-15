<?php

namespace Model;

class ProductRepository extends Model {

    const TABLE_NAME = "product";

    public static function save (string $name, string $description, float $price, \DateTimeInterface $date) {
        return self::_save(
            self::TABLE_NAME,
            ["name", "description", "price", "date"],
            func_get_args()
        );
    }

    public static function deleteById(string $id) {
        return self::_delete(self::TABLE_NAME, ["id"=>$id]);
    }

    public static function getAll(int $number = null) {

        $data = self::_find(
            self::TABLE_NAME,
            [],
            ["*"],
            $number ? [0, $number] : [],
            ["by"=>"date", "desc"=>true]
        );

        return array_map(fn ($item) => new Product($item->name, $item->description, $item->price, new \DateTime($item->date)), $data);
    }
}