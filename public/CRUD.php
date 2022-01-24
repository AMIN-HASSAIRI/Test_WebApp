<?php
    include '../config/db_connect.php';

    require_once '../model/Product.php';
    require_once '../model/DVD_disk.php';
    require_once '../model/Book.php';
    require_once '../model/Furniture.php';

    Class Database{
        private $products = array();

        public function addProduct($newProduct){
            $this->products[] = $newProduct;
        }
        
        public function getProducts(){
            return $this->products;
        }

        public function listProductsFromDb($conn){
            $data = $conn->query("SELECT * FROM products")->fetchAll();
            foreach ($data as $row) {
                $productType = $row['pType'];
            if($productType == 'Book')
                $this->products[] = new Book($row['pSku'], $row['pName'], $row['pPrice'], $productType, $row['pWeight']);
            elseif ($productType == 'DVD')
                $this->products[] = new DVD_disk($row['pSku'], $row['pName'], $row['pPrice'], $productType, $row['pSize']);
            elseif ($productType == 'Furniture')
                $this->products[] = new Furniture($row['pSku'], $row['pName'], $row['pPrice'], $productType, $row['pHeight'], $row['pWidth'], $row['pLength']);
            }
        }
        public function deleteProducts($skuDeleteList, $conn)  
        {  
            $sql = "DELETE FROM `products` WHERE pSku IN ({$skuDeleteList})";
            $conn->exec($sql);
            $this->listProductsFromDb($conn);  
        } 
    }
?>