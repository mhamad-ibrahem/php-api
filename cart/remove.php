<?php 

include "../connect.php";

$userId= filterRequest("userId");
$itemId = filterRequest("itemId");
deleteData("cart","cart_id =(SELECT cart_id FROM `cart` WHERE cart_userId = $userId AND cart_itemId = $itemId LIMIT 1) ");