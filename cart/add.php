<?php 

include "../connect.php";

$userId= filterRequest("userId");
$itemId = filterRequest("itemId");

$count = getData("cart","cart_itemId = $itemId AND cart_userId =$userId",null,false);

$data = array(
    "cart_itemId"=> $itemId,
    "cart_userId" => $userId,
);
insertData("cart",$data);