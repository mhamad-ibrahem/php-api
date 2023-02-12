<?php 

include "../connect.php";
$userId= filterRequest("userId");
$itemId = filterRequest("itemId");

$stmt = $con-> prepare("SELECT COUNT(cart.cart_id) as countItems  FROM cart WHERE cart_userId = $userId AND cart_itemId = $itemId");
$stmt->execute();
$count=$stmt->rowCount();
$data= $stmt->fetchColumn();
if($count > 0){
    echo json_encode(array("status"=> "success","data"=>$data));
}else{
    echo json_encode(array("status"=> "success","data"=>"0"));  
}
