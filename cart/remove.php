<?php 

include "../connect.php";

$userId= filterRequest("userId");
$itemId = filterRequest("itemId");
deleteData("cart","cart_id =() ");