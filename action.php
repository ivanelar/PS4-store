<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM action WHERE code='". $_GET["code"] ."'");
			$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["code"],$_SESSION["cart_item"])) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["code"] == $k)
								$_SESSION["cart_item"][$k]["quantity"] = $_POST["quantity"];
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="gamesCss.css">
<script src="scriptFile.js"></script>
<meta charset="UTF-8">
<title>Order
</title>
</head>
<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

<body background="Background\mNAcdsd.png">

<div class="dropdown">
<button onclick="myFunction()" class="dropbtn">Menu</button>
  <div id="myDropdown" class="dropdown-content">
    <a onclick="location.href = 'registeredUser.php';" href="#home">Home</a>
    <a onclick="location.href = 'action.php';" href="#action">Order</a>
	<a onclick="location.href = 'about us.php';" href="#about">About us</a>
    <a onclick="location.href = 'contacts.php';" href="#contact">Contacts</a>
	<a onclick="location.href = 'logout.php';" href="#contact">Logout</a>
  </div>
</div>
</td><td>
<div id="shopping-cart">
<div class="txt-heading">Shopping Cart <a id="btnEmpty" href="action.php?action=empty">Empty Cart</a></div>
<?php
if(isset($_SESSION["cart_item"])){
    $item_total = 0;
?>	
<table cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th><strong>Name</strong></th>
<th><strong>Code</strong></th>
<th><strong>Quantity</strong></th>
<th><strong>Price</strong></th>
<th><strong>Action</strong></th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
		?>
				<tr>
				<td><strong><?php echo $item["name"]; ?></strong></td>
				<td><?php echo $item["code"]; ?></td>
				<td><?php echo $item["quantity"]; ?></td>
				<td align=right><?php echo "$".$item["price"]; ?></td>
				<td><a href="action.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction">Remove Item</a></td>
				</tr>
				<?php
        $item_total += ($item["price"]*$item["quantity"]);
		}
		?>

<tr>
<td colspan="5" align=right><strong>Total:</strong> <?php echo "$".$item_total; ?></td>
</tr>
</tbody>
</table>	
  <?php
}
?>
</div>

<table>
<?php
	$product_array = $db_handle->runQuery("SELECT * FROM action ORDER BY id ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
<tr><td>
			<form method="post" action="action.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
			<p class="firstPClass"><a href="https://www.youtube.com/watch?v=4rbOTQhasnM" target="_blank"><img id="image" width="190" height="240" border="1px" src="<?php echo $product_array[$key]["image"]; ?>"></a></p></td>
			<td>
			<div><strong><p class="secondClass"><?php echo $product_array[$key]["name"]; ?></p></strong></div>
			<div><p class="secondClass"><?php echo "$".$product_array[$key]["price"]; ?></p></div>
			<div><input type="text" name="quantity" value="1" size="2" /><input type="submit" value="Add to cart" class="btnAddAction" /></div>
			</form>
			</td></tr>
			<?php
			}
	}
	?>
</table>
</body>
</html>