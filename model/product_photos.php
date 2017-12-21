<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 11/8/2017
 * Time: 4:59 AM
 */
class product_photos extends MD
{

    function get_by_product($product_id)
    {
        $sec = $this->db->prepare("select * from " . $this->tbPREFIX . $this->tableName . " where product_id = :id");
        if ($sec == false) {
            return [];
        }
        $sec->execute([
            ":id" => $product_id
        ]);
        return $sec->fetchAll(PDO::FETCH_ASSOC);
    }
}
