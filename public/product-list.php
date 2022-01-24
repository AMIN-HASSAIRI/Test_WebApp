<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    
    <link rel="stylesheet" href="style.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
<div class="container">
    <h1>Product List</h1>
    <hr>
    <form action="add-product.php" method="POST">
        <input type="submit" class="addbutton" value="ADD"/>
    </form>
    <form action="" method="POST">
        <input type="submit" class="massdeletebutton" form="delete-form" value="MASS DELETE"/>
    </form>
</div>
<?php 
	include('../config/db_connect.php');
    include '../public/CRUD.php';

    require_once '../model/Product.php';
    require_once '../model/DVD_disk.php';
    require_once '../model/Book.php';
    require_once '../model/Furniture.php';

    $db = new Database();
    $pro = $db->listProductsFromDb($conn); 

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
            
            $missingData = true;
            if($productType == 'DVD'){
                if(empty($size)){
					$missingData = false; 
					echo "<div style='color:red;'>Missing required data</div>";
				}
                else{
                $newProduct = new DVD_disk($sku,$name,$price,$productType,$size);
                $db->addProduct($newProduct);
                }

            }
            elseif($productType == 'Book'){
                if(empty($weight)){
					$missingData = false; 
					echo "<div style='color:red;'>Missing required data</div>";
				}
                else{
                $newProduct = new Book($sku,$name,$price,$productType,$weight);
                $db->addProduct($newProduct);
                }
            }
            elseif($productType == 'Furniture'){
                if(empty($height) || empty($width) || empty($length)){
					$missingData = false; 
					echo "<div style='color:red;'>Missing required data</div>";
				}
                else{
                $newProduct = new Furniture($sku,$name,$price,$productType,$height,$width,$length);
                $db->addProduct($newProduct);
                }
            }
            if($missingData){
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
    
                header('Location: index.php');
    
                $conn=null;
            }
        }
?>
<form id="delete-form" action="" method="POST">
<div class="container" >
	<div class="row">
	<?php foreach($db->getProducts() as $product){ ?>
		<div class="col-md-2 product-grid border">
			<input type="checkbox" name="delete-checkbox[]" class="delete-checkbox" value=<?php echo $product->getSku()?> />
			<div class="product-box">
			<?php
				echo "<div> {$product->getSku()} </div>";
				echo "<div> {$product->getName()} </div>";
				echo "<div> {$product->getPrice()} </div>";
				echo "<div> {$product->getSizeWeightDimensions()} </div>";
			?>
			</div>
		</div>
	<?php }; ?>
	</div>
</form>
<?php
    if (isset($_POST['delete-checkbox'])){
	    $skuForDeleteList = '';
    	foreach ($_POST['delete-checkbox'] as $sku) {
	    	$skuForDeleteList .= "'$sku',";
	    }
	    $skuForDeleteList = substr($skuForDeleteList, 0, -1);
	    $db->deleteProducts($skuForDeleteList,$conn);
	    $_POST = array();
	    $_POST['delete-checkbox'] = NULL;
        ?>
        <script> location.href = "index.php"</script>
        <?php
	}
?>

<!--FOOTER-->
</body>
<div class="footer">
  <p>Scandiweb Test assignment</p>
</div>
</html>