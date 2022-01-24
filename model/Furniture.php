<?php

include_once "product.php";

class Furniture extends Product{
    private $height;
    private $width;
    private $length;

    public function __construct($sku,$name, $price, $productType, $height, $width, $length)
    {
        $this->height = $height;
        $this->width = $width;
        $this->length = $length;
        parent::__construct($sku,$name,$price,$productType);
    }
    public function getHeight()
    {
        return $this->height;
    }
    public function getWidth()
    {
        return $this->width;
    }
    public function getLength()
    {
        return $this->length;
    }
    public function getSizeWeightDimensions()
    {
        return "Dimension: {$this->height}x{$this->width}x{$this->length}";
    }
}

?>