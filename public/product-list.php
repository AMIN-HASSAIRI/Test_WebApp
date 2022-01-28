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

    $db = new Database();
    $pro = $db->listProductsFromDb($conn); 
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
        <script> location.href = "../public/product-list.php"</script>
        <?php
	}
?>

<!--FOOTER-->
</body>
<div class="footer">
  <p>Scandiweb Test assignment</p>
</div>
</html>