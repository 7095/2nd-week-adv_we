<?php
namespace aitsydney;

use aitsydney\Database;
class Product extends Database{


    public function __contruct(){
        parent::__contruct();
    }

    public function getproducts(){

        $query ="SELECT 
        @product_id := product.product_id AS product_id,
        product.name,
        product.description,
        product.price,
        @image_id := (SELECT image_id from product_image where product_id = @product_id LIMIT 1) AS Image_ID,
        (SELECT image_file_name from image where image_id = @image_id) AS Image
        from product
                ";
                if (isset($_GET['category_id'])){
                    $query =$query . "" . " INNER JOIN  product_category
                    on product.product_id = product_category.product_id
                    where product_category.category_id=?
                    ";
                }

        $statement = $this -> connection -> prepare($query);

        if( isset($_GET['category_id'])){
            $statement -> bind_param('i',$_GET['category_id']);
        }

        if($statement -> execute()){
            $result = $statement -> get_result();
            $product_array=array();
            while ($row = $result-> fetch_assoc())
            {
                array_push($product_array,$row);
            }
            return $product_array;
        
        
        }
        else{
            echo $this-> connection->err_no ;
        }
    }
}


?>