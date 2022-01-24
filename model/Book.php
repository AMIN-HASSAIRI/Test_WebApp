<?php

include_once "product.php";


class Book extends Product{
    private $weight;

    public function __construct( $id , $sku, $name, $price, $productType, $weight)
    {
        $this->weight = $weight;
        parent::__construct($id,$sku,$name,$price,$productType);
    }
    public function getSizeWeightDimensions()
    {
        return "Weight: {$this->weight} KG";
    }
}

?>