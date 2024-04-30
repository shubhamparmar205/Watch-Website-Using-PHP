<?php

class Order{
    public $db = null;

    public function __construct(DBController $db1){
        if(!isset($db1->con)) return null;
         $this->db = $db1;
    }

    public function insertOrder($item_id,$user_id){
        if($this->db->con != null ){
            if($item_id != null){
                //insert into order
                $query_str = sprintf("INSERT INTO `order` (item_id,user_id) VALUES (%s,%s)",$item_id,$user_id);
                //execute query
                $result = $this->db->con->query($query_str);
                return $result;
            }
        }
    }

    public function cancelOrder($order_id){
        if(isset($order_id)){
            $res = $this->db->con->query("DELETE FROM `order` WHERE order_id={$order_id};");
            return $res;
        }
    }
}
?>