<?php

include_once "product.php";

class DVD_disk extends Product{
    private $size;

    public function __construct( $id , $sku, $name, $price, $productType, $size)
    {
        $this->size = $size;
        parent::__construct($id,$sku,$name,$price, $productType);
    }
    public function getSizeWeightDimensions()
    {
        return "Size: {$this->size} MB";
    }
}

?>