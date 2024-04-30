<?php
// use to fetch product data
class Product{
    public $db = null;

    public function __construct(DBController $db1){
        if(!isset($db1->con)) return null;
         $this->db = $db1;
    }

    // fetch product data
    public function getData($table = "product"){
        $result = $this->db->con->query("SELECT * FROM `{$table}`");
        $resArray = array();

        //fetching items from the result
        while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $resArray[] = $item;
        }
        return $resArray;
    }

    public function getDataFeatured($table = "product",$place="featured"){
        $result = $this->db->con->query("SELECT * FROM {$table} WHERE Place='{$place}'");
        $resArray = array();

        //fetching items from the result
        while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $resArray[] = $item;
        }
        return $resArray;
    }

    public function getDataSpecific($table = "product",$place,$subject){
        $result = $this->db->con->query("SELECT * FROM {$table} WHERE Place='{$place}' AND subject='{$subject}'");
        $resArray = array();

        //fetching items from the result
        while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $resArray[] = $item;
        }
        return $resArray;
        // Console.log($resArray);
    }

    //get product using item_id
    public function getProduct($item_id=null, $table='product' ){
        if(isset($item_id)){
            $result = $this->db->con->query("SELECT * FROM {$table} WHERE item_id = {$item_id};");
            $resArray = array();
            //fetching items from the result
            while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $resArray[] = $item;
            }
            return $resArray;
        }
    }

    public function deleteProduct($item_id){
        if(isset($item_id)){
            $res = $this->db->con->query("DELETE FROM product WHERE item_id={$item_id};");
            return $res;
        }
    }

    public function insertProduct($name,$price,$image,$subject){
        if($this->db->con != null ){
            try {
                $query_str = "INSERT INTO `product` (item_brand,item_price,item_image,`subject`) VALUES ('$name','$price','$image','$subject')";
                //insert into order
                $result = $this->db->con->query($query_str);
                //execute query
                return $result;
            } catch (Exception $e) {
                echo "Exception".$e;
            }
        }
    }
}
?>