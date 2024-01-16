<?php
$page_title = 'Books';
include('includes/header.html');
include('Database/db.php');
session_start();
$status="";
if (isset($_POST['Code']) && $_POST['Code']!=""){
$Code = $_POST['Code'];
$result = mysqli_query($con,"SELECT * FROM `Products` WHERE `Code`='$Code'");
$row = mysqli_fetch_assoc($result);
$Name = $row['Name'];
$Code = $row['Code'];
$Price = $row['Price'];
$Image = $row['Image'];

$cartArray = array(
	$Code=>array(
	'Name'=>$Name,
	'Code'=>$Code,
	'Price'=>$Price,
	'quantity'=>1,
	'Image'=>$Image)
);

if(empty($_SESSION["shopping_cart"])) {
	$_SESSION["shopping_cart"] = $cartArray;
	$status = "<div class='box'>Item has been added to your cart!</div>";
}else{
	$array_keys = array_keys($_SESSION["shopping_cart"]);
	if(in_array($Code,$array_keys)) {
		$status = "<div class='box' style='color:red;'>
		This item is already added to your cart!</div>";	
	} else {
	$_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
	$status = "<div class='box'>Item has been added to your cart!</div>";
	}

	}
}
?>
<html>
<head>
<title>Books</title>
<link rel='stylesheet' href='css/Books.css' type='text/css' media='all' />
</head>
<body>
<div style="width:700px; margin:50 auto;">

<h2>Our Library !</h2>   

<?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>
<div class="cart_div">
<a href="Checkout.php"><img src="includes/cart-icon.png" /> Cart<span><?php echo $cart_count; ?></span></a>
</div>
    <br>
    <br>
    <br>
<?php
}

$result = mysqli_query($con,"SELECT * FROM `Products`");
while($row = mysqli_fetch_assoc($result)){
		echo "<div class='product_wrapper'>
			  <form method='post' action=''>
			  <input type='hidden' name='Code' value=".$row['Code']." />
			  <div class='Image'><img src='".$row['Image']."' /></div>
			  <div class='Name'>".$row['Name']."</div>
		   	  <div class='Price'>$".$row['Price']."</div>
			  <button type='submit' class='buy'>Buy Now</button>
			  </form>
		   	  </div>";
        }
mysqli_close($con);

    include('includes/footer.html');
?>

    <div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>
</div>
</body>
</html>