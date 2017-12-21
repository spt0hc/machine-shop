<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 11/8/2017
 * Time: 4:59 AM
 */
class service_photos extends MD
{

    function get_by_service($service_id)
    {
        $sec = $this->db->prepare("select * from " . $this->tbPREFIX . $this->tableName . " where service_id = :id");
        if ($sec == false) {
            return [];
        }
        $sec->execute([
            ":id" => $service_id
        ]);
        return $sec->fetchAll(PDO::FETCH_ASSOC);
    }
}
