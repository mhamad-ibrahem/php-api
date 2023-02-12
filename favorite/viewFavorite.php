<?php 

include "../connect.php";
$favoriteUserId = filterRequest("favoriteUserId");
getAllData("myfavorite","favorite_userId = ?",array($favoriteUserId));