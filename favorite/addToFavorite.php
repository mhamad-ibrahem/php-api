<?php

include "../connect.php";

$userId=filterRequest("userId");
$itemId=filterRequest("itemId");

$data= array(
    "favorite_userId"=> $userId,
    "favorite_itemsId"=> $itemId,
);

insertData("favorite",$data);