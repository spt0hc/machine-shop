<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 11/8/2017
 * Time: 4:59 AM
 */
class MD
{
    public $db;
    public $tableName;
    public $DB = [];

    public function MD($db)
    {
        $this->db = $db;
        $this->tableName = get_class($this);
        $this->tbPREFIX ="ms_";
    }

    //get igrone non-active
    function get_by_order($col, $dir)
    {
        $sec = $this->db->prepare("SELECT * FROM " . $this->tbPREFIX . $this->tableName . " where is_active=1 order by :d :l");
        $sec->execute([
            ":d" => $col,
            ":l" => $dir
        ]);
        if ($sec->rowCount() == 0) {
            return [];
        }
        return $sec->fetchAll(PDO::FETCH_ASSOC);
    }

    function get_by_order_limit($col, $dir, $row)
    {
        $sec = $this->db->query("SELECT * FROM " . $this->tbPREFIX . $this->tableName . " where is_active=1 order by $col $dir");

        if ($sec->rowCount() == 0) {
            return [];
        }
        return $this->get_rows($sec, $row);
    }

    function gets()
    {
        $sec = $this->db->query("select * from " . $this->tbPREFIX . $this->tableName . " where is_active = 1");
        if ($sec->rowCount() == 0) {
            return [];
        }
        return $sec->fetchAll(PDO::FETCH_ASSOC);
    }

    function gets_limit($from, $row)
    {
        $sec = $this->db->query("select * from " . $this->tbPREFIX . $this->tableName . " where is_active=1 limit $from,$row");
        if ($sec->rowCount() == 0) {
            return [];
        }
        return $sec->fetchAll(PDO::FETCH_ASSOC);
    }

    function gets_page($page, $row)
    {
        return $this->gets_limit(($page - 1) * $row, $row);
    }

    function get($id)
    {
        $sec = $this->db->prepare("select * from " . $this->tbPREFIX . $this->tableName . " where is_active=1 and id=:id");
        $sec->execute([
            ":id" => $id
        ]);
        if ($sec->rowCount() == 0) {
            return [];
        }
        return $sec->fetch(PDO::FETCH_ASSOC);
    }

    //get all
    function gets_all()
    {
        $sec = $this->db->query("select * from " . $this->tbPREFIX . $this->tableName);
        if ($sec->rowCount() == 0) {
            return [];
        }
        return $sec->fetchAll(PDO::FETCH_ASSOC);
    }

    function get_all($id)
    {
        $sec = $this->db->prepare("select * from " . $this->tbPREFIX . $this->tableName . " where id=:id");
        $sec->execute([
            ":id" => $id
        ]);
        if ($sec->rowCount() == 0) {
            return [];
        }
        return $sec->fetch(PDO::FETCH_ASSOC);
    }

    function gets_page_all($page, $row)
    {
        return $this->gets_limit_all(($page - 1) * $row, $row);
    }

    function gets_limit_all($from, $row)
    {
        $sec = $this->db->query("select * from " . $this->tbPREFIX . $this->tableName . " limit $from,$row");
        if ($sec->rowCount() == 0) {
            return [];
        }
        return $sec->fetchAll(PDO::FETCH_ASSOC);
    }

    function get_rows($sec, $row)
    {
        $data = [];
        $rc = $sec->rowCount();
        $row = $row > $rc ? $rc : $row;
        $i = 0;
        while ($r = $sec->fetch(PDO::FETCH_ASSOC)) {
            if ($i < $row) {
                $data[] = $r;
                $i++;
            }
        }
        return $data;
    }

    function update($id, $field)
    {
        $querys = "";
        $cols = [];
        foreach ($field as $k => $vl) {
            $querys .= $k . "=:$k,";
            $cols[":$k"] = $vl;
        }
        $querys = trim($querys, ",");
        $qs = "update " . $this->tbPREFIX . $this->tableName . " set $querys where id=:id";
     
        $q = $this->db->prepare($qs);
        $cols[":id"] = $id;
     

        $q->execute($cols);
        return $q->rowCount();
    }

    function remove($id)
    {
        $q = $this->db->prepare("delete from  " . $this->tbPREFIX . $this->tableName . " where id=:id");
        $q->execute([
            ":id" => $id
        ]);
        return $q->rowCount();
    }

    function add($field)
    {
        $str_col = "";
        $str_col_vl = "";
        $exe = [];
        foreach ($field as $k => $item) {
            $str_col .= "$k,";
            $str_col_vl .= ":$k,";
            $exe[":$k"] = $item;
        }
        $str_col = trim($str_col, ",");
        $str_col_vl = trim($str_col_vl, ",");
        $q = $this->db->prepare("INSERT INTO " . $this->tbPREFIX . $this->tableName . " ($str_col) VALUES ($str_col_vl)");
        $q->execute($exe);
        return $q->rowCount();
    }
    function get_last_id(){
        $q = $this->db->query("SELECT max(id) as id FROM  " . $this->tbPREFIX . $this->tableName );
       $id = $q->fetch(PDO::FETCH_ASSOC)["id"];
       if(empty($id)){
           return -1;
       }
       return $id;
        //  return $q->rowCount();

    }
}
