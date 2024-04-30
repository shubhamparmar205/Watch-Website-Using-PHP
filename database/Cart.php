<?php
//php Cart class
class Cart{
    public $db = null;
    public function __construct(DBController $db){
        if(!isset($db->con)) return null;
        $this->db = $db;
    }

    public function insertIntoCart($params = null, $table='cart'){
        if($this->db->con != null ){
            if($params != null){
                //insert into cart
                //get table colummns
                $cols = implode(',',array_keys($params));
                $vals = implode(',',array_values($params));
                print_r($cols);
                print_r($vals);
                $query_str = sprintf("INSERT INTO %s (%s) VALUES (%s)",$table,$cols,$vals);
                
                //execute query
                $result = $this->db->con->query($query_str);
                return $result;
            }
        }
    }

    //to get user_id and item_id into cart table
    public function addToCart($userid,$itemid){
        if(isset($userid) && isset($itemid)){
            $params = array(
                "user_id" => $userid,
                "item_id" => $itemid
            );

            $result = $this->insertIntoCart($params);
            if($result){
                //reload Page
                header("Location:".$_SERVER['PHP_SELF']);
            }
        }
    }

    public function getSum($arr){
        if(isset($arr)){
            $sum = 0;
            foreach($arr as $item){
                $sum+=$item[0];
            }
            printf($sum);
            return $sum;
        }
    }

    public function deleteProduct($cart_id){
        if(isset($cart_id)){
            $res = $this->db->con->query("DELETE FROM `cart` WHERE item_id={$cart_id};");
            return $res;
        }
    }

}
?>