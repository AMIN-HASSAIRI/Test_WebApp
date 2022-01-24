<!DOCTYPE html>
<html>
<body>

<?php

abstract class Product{
    protected $id;
    protected $sku;
    protected $name;
    protected $price;
    protected $productType;

    public function __construct($id, $sku, $name, $price, $productType)
    {
        $this->id = $id;
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->productType = $productType;
    }
    public function getId(){
        return $this->id;
    }
    public function setSku($sku){
        $this->$sku= $sku;
    }
    public function getSku(){
        return $this->sku;
    }
    public function setName($name){
        $this->name = $name;
    }
    public function getName(){
        return $this->name;
    }
    public function setPrice($price){
        $this->price = $price;
    }
    public function getPrice(){
        return "{$this->price} $";
    }
    public function setProductType($productType){
        $this->productType = $productType;
    }
    public function getProductType(){
        return $this->productType;
    }

    abstract public function getSizeWeightDimensions();
}
?>
</body>
</html>
