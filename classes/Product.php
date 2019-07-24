<?php
namespace aitsydney;
class product extends database{

    public function _contruct(){
        parent::_contruct();
    }

    public function getproducts(){

        $query ="SELECT 
        product.product_id,
        product.name,
        product.description,
        product.price,
        image.image_file_name as IMAGE 
        from product 
        INNER join product_image ON product.product_id = product_image.product_id 
        inner join image on product_image.image_id = image.image_id
        ";

        $statment = $this -> connection -> prepare($query);
        if($statment -> excute()){
            $result = $statment -> get_result();
            $product_array=array();
            while ($row = $result-> fetch_assoc)
            {
                array_push($product_array,$row);
            }
            return $product_array;
        
        
        }
    }
}


?>