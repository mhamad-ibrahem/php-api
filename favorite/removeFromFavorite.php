<?php

include "../connect.php";

$userId=filterRequest("userId");
$itemId=filterRequest("itemId");

deleteData("favorite","favorite_userId = $userId AND favorite_itemsId = $itemId");