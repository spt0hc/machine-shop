<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 11/8/2017
 * Time: 4:59 AM
 */
class product extends MD
{
    function gets_page_by_cat($page, $row, $cat)
    {
        $prs = parent::gets_page($page, $row);
        $list = [];
        foreach ($prs as $vl) {
            if ($vl["category_id"] == $cat)
                $list[] = $vl;
        }
        return $list;
    }
    function get_products_by_name($names){
        $query =' 1=0';
        $exe=[];
        foreach ($names as $k=>$name) {
            $query =$query . " or name like concat('%',:name$k,'%')";
            $exe[":name$k"]=$name;
        }
        $sec = $this->db->prepare("select * from " . $this->tbPREFIX . $this->tableName . " where is_active=1 and $query");
        $sec->execute($exe);
        if ($sec->rowCount() == 0) {
            return [];
        }
        return $sec->fetchAll(PDO::FETCH_ASSOC);
    }
}
