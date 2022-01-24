

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>addproduct</title>
    <link rel="stylesheet" href="style.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>

<div class="container">
    <h1>Product Add</h1>
    <hr>
    <form id="product_form" class="product" action="product-list.php" method="POST">
       
        <label for="sku" class="fontSize">SKU</label> <input type="text" name="sku" id="sku" placeholder="xxxxx-xxxxxx-xxx" pattern="[a-z]{5}-[a-z]{6}-[a-z]{3}" required/></br>
        <label for="name">Name</label> <input type="text" name="name" id="name" placeholder="name" required/></br>
        <label for="price">Price ($)</label> <input type="number" name="price" id="price" placeholder="price" step="0.01" min=0 required/></br>
        <label for="productType">Type Switcher</label> <select id="productType" name="productType" onchange="showNoCheck(this)" required>
                                                            <option value="" selected="selected"></option>
                                                            <option value="DVD" id="DVD">DVD-disk</option>
                                                            <option value="Book" id="Book">Book</option>
                                                            <option value="Furniture" id="Furniture">Furniture</option>
                                                        </select>
        <div class="product" id="ifDVD" style="display: none;">
            <label for="size">Size (MB)</label> <input type="number" name="size" id="size" placeholder="size" min=0 value="0" required/><br />
            <h6>Please enter the size of the DVD-disk in (MB)!*</h6>
        </div>
        <div class="product" id="ifBook" style="display: none;">
            <label for="weight">Weight (KG)</label> <input type="number" name="weight" id="weight" placeholder="weight" min=0 value="0" required/><br />
            <h6>Please enter the Weight of the Book in (KG)!*</h6>
        </div>
        <div class="product" id="ifFurniture" style="display: none;">
            <div>
                <label for="height">Height (CM)</label>
                <input type="number" name="height" id="height" placeholder="height" min=0 value="0" required/><br />
                <h6>Please enter the Height of the Furniture in (CM)!*</h6>
            </div>
            <div>
                <label for="width">Width (CM)</label> <input type="number" name="width" id="width" placeholder="width" min=0 value="0" required/><br />
                <h6>Please enter the Width of the Furniture in (CM)!*</h6>
            </div>
            <div>
                <label for="length">Length (CM)</label> <input type="number" name="length" id="length" placeholder="length" min=0 value="0" required/><br />
                <h6>Please enter the Height of the Furniture in (CM)!*</h6>
            </div>
        </div>
        <button type="submit" name="save" class="savebutton" value="Save">Save</button>
    </form>
</div>    
<form action="../index.php">
        <input type="submit" class="cancelbutton" value="Cancel"/>
</form>

<script>
    function changeOptions(selectEl) {
    let selectedValue = selectEl.options[selectEl.selectedIndex].value;
    let subForms = document.getElementsByClassName('className')
    for (let i = 0; i < subForms.length; i += 1) {
        if (selectedValue === subForms[i].name) {
            subForms[i].setAttribute('style', 'display:block')
        } else {
            subForms[i].setAttribute('style', 'display:none') 
        }
    }
}
    function showNoCheck(that) {
    if (that.value == "DVD") {
        document.getElementById("ifDVD").style.display = "block";
    } else {
        document.getElementById("ifDVD").style.display = "none";
    }
    if (that.value == "Book") {
        document.getElementById("ifBook").style.display = "block";
    } else {
        document.getElementById("ifBook").style.display = "none";
    }
    if (that.value == "Furniture") {
        document.getElementById("ifFurniture").style.display = "block";
    } else {
        document.getElementById("ifFurniture").style.display = "none";
    }
}
</script>

<!--FOOTER-->
</body>
<div class="footer">
  <p>Scandiweb Test assignment</p>
</div>
</html>