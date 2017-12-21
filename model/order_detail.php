<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 11/8/2017
 * Time: 4:59 AM
 */
class order_detail extends MD
{
    public function gets_by_order($id)
    {
        $sec = $this->db->prepare("select * from " . $this->tbPREFIX . $this->tableName . " where order_id =:id");
        $sec->execute([
            ":id" => $id
        ]);
        if ($sec->rowCount() == 0) {
            return [];
        }
        return $sec->fetchAll(PDO::FETCH_ASSOC);
    }
    public function gets_by_product($id)
    {
        $sec = $this->db->prepare("select * from " . $this->tbPREFIX . $this->tableName . " where product_id =:id");
        $sec->execute([
            ":id" => $id
        ]);
        if ($sec->rowCount() == 0) {
            return [];
        }
        return $sec->fetchAll(PDO::FETCH_ASSOC);
    }

    function remove_by_product($product_id)
    {
        $q = $this->db->prepare("delete from  " . $this->tbPREFIX . $this->tableName . " where product_id=:id");
        $q->execute([
            ":id" => $product_id
        ]);
        return $q->rowCount();
    }

    function get_total_cost($order_id)
    {
        $sec = $this->db->query("select sum(cost) as total from " . $this->tbPREFIX . $this->tableName . " where order_id = $order_id");
        $total = $sec->fetch(PDO::FETCH_ASSOC)["total"];
    return $total;
    }
}
