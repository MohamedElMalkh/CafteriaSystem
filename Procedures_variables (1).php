<?php
include_once 'C:\xampp\htdocs\zc_cafetria\PHPF\connectDataBase.php';
//Sign in
$username;
$password;
$AccountType;


$result1 = SignIn($username, $password);

if($result1)
{
    while($row = mysqli_fetch_assoc($result1))
    {
        $AccountType =  $row['Type'];
        
    }
}
//--------------------------------------------------------------
//all Products info in arabic
$ProductNumber;$ArabicName; $EnglishName; $SellingPrice; $Quantity;
$result2 = ProductArabiaInfo();
if($result2)
{
    while($row = mysqli_fetch_assoc($result2))
    {
        $ProductNumber =  $row['PNumber'];
        $ArabicName =  $row['ArabicName'];
        $SellingPrice =  $row['SellingPrice'];
        $Quantity =  $row['Quantity'];
    }
}
//all Products info in english
$result4 = ProductEnglishInfo();
if($result4)
{
    while($row = mysqli_fetch_assoc($result2))
    {
        $ProductNumber =  $row['PNumber'];
        $EnglishName =  $row['EnglishName'];
        $SellingPrice =  $row['SellingPrice'];
        $Quantity =  $row['Quantity'];
    }
}
//----------------------------------------------------
//ProductBarCodeInfo
$barcode;
$result3 = ProductBarCodeInfo($barcode);
if($result3)
{
    while($row = mysqli_fetch_assoc($result3))
    {
        $ProductNumber =  $row['PNumber'];
        $ArabicName =  $row['ArabicName'];
        $SellingPrice =  $row['SellingPrice'];
        $Quantity =  $row['Quantity'];
    }
}
//-----------------------------------------------------
//Order:

$OrderNumber;
$result5 = createOrder();
if($result5)
{
    while($row = mysqli_fetch_assoc($result5))
    {
        $OrderNumber =  $row['OrderNumber'];
    }
}

//$cashCash += calculateTotalCash($SellingPrice, $Quantity);
function calculateTotalCash($SellingPrice, $Quantity)
{
    return $SellingPrice * $Quantity;
}

$result7 = SellProducts($OrderNumber , $ProductNumber, $Quantity,$SellingPrice);

$cash; //total cash
$result8 = EndOrder($cash , $OrderNumber);

//------------------------------------------------------
//Inventory:
$note;
$InventoryNumber;
$result10 = NewInventoryProcess($note);
if($result10)
{
    while($row = mysqli_fetch_assoc($result10))
    {
        $InventoryNumber =  $row['InvNo'];
    }
}

$result12 = EnterProducts($InventoryNumber , $ProductNumber, $Quantity,$Price);
//$Cash += $Price;
$result13 = EndInventory($InventoryNumber , $cash)

$result15 = AddProduct($Barcode , $EnglishName, $ArabicName);
if($result15)
{
    while($row = mysqli_fetch_assoc($result15))
    {
        $ProductNumber =  $row['prodNumber'];
    }
}

$result16 AddProductInfo($SellingPrice , $ExpirationDate, $ProductNumber);

$result17 = EditProductinfo($product_number, $price, $barcode, $Arabic_Name, $English_Name);


$result18 = ReturnProduct($ProductNumber , $Quantity, $SellingPrice);
