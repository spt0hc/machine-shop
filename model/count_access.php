<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 11/8/2017
 * Time: 4:59 AM
 */
class count_access extends MD
{
    public function gets_access_by_ip($ip)
    {
        $q = $this->db->prepare("select * from " . $this->tbPREFIX . $this->tableName . " where ip=:ip");
        $q->execute([
            ":ip" => $ip
        ]);
        return $q->fetchAll(PDO::FETCH_ASSOC);
    }
}
