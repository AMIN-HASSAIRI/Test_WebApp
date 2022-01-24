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
            usort($this->products, fn($x, $y) => $x->getId() <=> $y->getId());
            return $this->products; 
        }

        public function listProductsFromDb($conn){

            $Book = $conn->query("SELECT * FROM products Where pType = 'Book'")->fetchAll();
            foreach ($Book as $row) {
                $this->products[] = new Book($row['id'],$row['pSku'], $row['pName'], $row['pPrice'],'Book', $row['pWeight']);
            }    
            $DVD = $conn->query("SELECT * FROM products Where pType = 'DVD'")->fetchAll();
            foreach ($DVD as $row) {
                $this->products[] = new DVD_disk($row['id'],$row['pSku'], $row['pName'], $row['pPrice'],'DVD', $row['pSize']);
            }  
            $Furniture = $conn->query("SELECT * FROM products Where pType = 'Furniture'")->fetchAll();
            foreach ($Furniture as $row) {
                $this->products[] = new Furniture($row['id'],$row['pSku'], $row['pName'], $row['pPrice'],'Furniture', $row['pHeight'], $row['pWidth'], $row['pLength']);
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