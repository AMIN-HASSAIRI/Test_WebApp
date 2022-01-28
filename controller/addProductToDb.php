<?php 
	include('../config/db_connect.php');
    include '../public/CRUD.php';

    require_once '../model/Product.php';
    require_once '../model/DVD_disk.php';
    require_once '../model/Book.php';
    require_once '../model/Furniture.php';



    //POST REQUEST FOR SAVING
    if(ISSET($_POST['save'])){

        $sku =  $_POST['sku'];
        $name = $_POST['name'];
        $price =  $_POST['price'];
        $productType = $_POST['productType'];
        $size = empty($_POST['size']) ? 0 : $_POST['size'];
        $weight = empty($_POST['weight']) ? 0 : $_POST['weight'];
        $height = empty($_POST['height']) ? 0 : $_POST['height'];
        $width = empty($_POST['width']) ? 0 : $_POST['width'];
        $length = empty($_POST['length']) ? 0 : $_POST['length'];
            
        $sql = "INSERT INTO `products` (`pSku`, `pName`, `pPrice`, `pType`, `pSize`, `pWeight`, `pHeight`, `pWidth`, `pLength`)
                    values (:sku,:name,:price,:productType,:size,:weight,:height,:width,:length)";
        $stmt = $conn->prepare($sql); 
        
        $stmt->bindParam(':sku',$sku);
        $stmt->bindParam(':name',$name);
        $stmt->bindParam(':price',$price);
        $stmt->bindParam(':productType',$productType);
        $stmt->bindParam(':size',$size);
        $stmt->bindParam(':weight',$weight);
        $stmt->bindParam(':height',$height);
        $stmt->bindParam(':width',$width);
        $stmt->bindParam(':length',$length);
    
        $stmt->execute();
    
        header('Location: ../public/product-list.php');
    
        $conn=null;            
    }
?>