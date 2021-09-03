<?php

// $servername = "localhost";
// $username = "root";
// $password = "";
// $db = "ZC_Cafetria";
// // Create connection
// $conn = mysqli_connect($servername, $username, $password, $db );
$conn = new mysqli("localhost", "root", "", "zc_cafetria");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

//This function is used to sign in for different users
function SignIn($email , $password){
    $sql = "CALL SignIn('$email','$password');";
    $sql_query = $sql;
    if($result = mysqli_query($GLOBALS['conn'],$sql_query)) {
        echo 'done';
        return $result;
    }
    else
    {
        echo("Error description: " . $GLOBALS['conn'] -> error);
        return false;
    }
}
//This function is used to get all products' info (Arabic name)
function ProductArabiaInfo(){ 
    $sql = "CALL ProductArabiaInfo();";
    $sql_query = $sql;
    if($result = mysqli_query($GLOBALS['conn'],$sql_query)) {
        echo 'done';
        return $result;
    }
    else
    {
        echo("Error description: " . $GLOBALS['conn'] -> error);
        return false;
    }
}
//This function is used to get product's info for each barcode
function ProductBarCodeInfo($barcode){
    $sql = "CALL ProductBarCodeInfo('$barcode');";
    $sql_query = $sql;
    if($result = mysqli_query($GLOBALS['conn'],$sql_query)) {
        echo 'done';
        return $result;
    }
    else
    {
        echo("Error description: " . $GLOBALS['conn'] -> error);
        return false;
    }
}
//Order:
//This function is used to create an order and get its number (key)
function createOrder(){ 
    $sql = "CALL CreateOrder();";
    $sql_query = $sql;
    if($result = mysqli_query($GLOBALS['conn'],$sql_query)) {
        echo 'done';
        return $result;
    }
    else
    {
        echo("Error description: " . $GLOBALS['conn'] -> error);
        return false;
    }
}

//This function is used to add order's details and decrease the sold quantity from the store
function SellProducts($order_number , $product_number, $quantity,$selling_price){ 
    $sql = "CALL SellProducts('$order_number','$product_number', '$quantity','$selling_price');";
    $sql_query = $sql;
    if($result = mysqli_query($GLOBALS['conn'],$sql_query)) {
        echo 'done';
        return true;
    }
    else
    {
        echo("Error description: " . $GLOBALS['conn'] -> error);
        return false;
    }
}
//This function is used to define the order total cash and end the order
function EndOrder($cash , $order_number){
    $sql = "CALL EndOrder('$cash','$order_number');";
    $sql_query = $sql;
    if($result = mysqli_query($GLOBALS['conn'],$sql_query)) {
        echo 'done';
        return true;
    }
    else
    {
        echo("Error description: " . $GLOBALS['conn'] -> error);
        return false;
    }
}
//--------------------------------------------------------------------------
//Inventory:

//This function is used to create an inventory process and get the inventory number (key)
function NewInventoryProcess($note){ 
    $sql = "CALL NewInventoryProcess('$note');";
    $sql_query = $sql;
    if($result = mysqli_query($GLOBALS['conn'],$sql_query)) {
        echo 'done';
        return $result; //Inventory number
    }
    else
    {
        echo("Error description: " . $GLOBALS['conn'] -> error);
        return false;
    }
}
//This function is used to add inventory's details and increase products quantity in the store
function EnterProducts($inventory_number , $product_number, $quantity,$price){ 
    $sql = "CALL EnterProducts('$inventory_number','$product_number', '$quantity','$price');";
    $sql_query = $sql;
    if($result = mysqli_query($GLOBALS['conn'],$sql_query)) {
        echo 'done';
        return true;
    }
    else
    {
        echo("Error description: " . $GLOBALS['conn'] -> error);
        return false;
    }
}
//This function is used to define the inventory total cash and end the process
function EndInventory($inventory_number , $cash){
    $sql = "CALL EndInventory('$inventory_number','$cash');";
    $sql_query = $sql;
    if($result = mysqli_query($GLOBALS['conn'],$sql_query)) {
        echo 'done';
        return true;
    }
    else
    {
        echo("Error description: " . $GLOBALS['conn'] -> error);
        return false;
    }
}

//--------------------------------------
//Mr. Sherief
// This function is used to add new product's static info and get the product number (key)
function AddProduct($Barcode , $English_Name, $Arabic_Name){
    $sql = "CALL AddProduct('$Barcode','$English_Name','$Arabic_Name');";
    $sql_query = $sql;
    if($result = mysqli_query($GLOBALS['conn'],$sql_query)) {
        echo 'done';
        return $result; //product number
    }
    else
    {
        echo("Error description: " . $GLOBALS['conn'] -> error);
        return false;
    }
}
// This function is used to add new product's dynamic info
function AddProductInfo($selling_price , $expiration_date, $product_number){
    $sql = "CALL AddProductInfo('$selling_price','$expiration_date','$product_number');";
    $sql_query = $sql;
    if($result = mysqli_query($GLOBALS['conn'],$sql_query)) {
        echo 'done';
        return true;
    }
    else
    {
        echo("Error description: " . $GLOBALS['conn'] -> error);
        return false;
    }
}
//This function is used to edit product's price
function EditProductPrice($product_number, $price){ 
    $sql = "CALL EditProductPrice('$product_number','$price');";
    $sql_query = $sql;
    if($result = mysqli_query($GLOBALS['conn'],$sql_query)) {
        echo 'done';
        return true;
    }
    else
    {
        echo("Error description: " . $GLOBALS['conn'] -> error);
        return false;
    }
}
// This function is used to return products to the store (Should increase product's quantity after returning it using increase_quantity function)
function ReturnProduct($product_number , $quantity, $selling_price){
    $sql = "CALL ReturnProduct('$product_number','$quantity','$selling_price');";
    $sql_query = $sql;
    if($result = mysqli_query($GLOBALS['conn'],$sql_query)) {
        echo 'done';
        return true;
    }
    else
    {
        echo("Error description: " . $GLOBALS['conn'] -> error);
        return false;
    }
}

