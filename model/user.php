<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 11/8/2017
 * Time: 4:59 AM
 */
class user extends MD
{
    function get_by_mail($mail)
    {
        $sec = $this->db->prepare("select * from " . $this->tbPREFIX . $this->tableName . " where mail=:mail");
        $sec->execute([
            ":mail" => $mail
        ]);
        if ($sec->rowCount() == 0) {
            return '';
        }
        return $sec->fetch(PDO::FETCH_ASSOC);
    }
    function get_by_pass($pass)
    {
        $sec = $this->db->prepare("select * from " . $this->tbPREFIX . $this->tableName . " where pass=:pass");
        $sec->execute([
            ":pass" => $pass
        ]);
        if ($sec->rowCount() == 0) {
            return '';
        }
        return $sec->fetch(PDO::FETCH_ASSOC);
    }
}
