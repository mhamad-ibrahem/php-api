<?php

include "../connect.php";
$categoryid = filterRequest("categoryid");
$userId = filterRequest("userid");
$stmt = $con->prepare("SELECT viewItems1.* , 1 AS favorite FROM `viewItems1` 
INNER JOIN favorite ON favorite.favorite_itemsId = viewItems1.item_id AND favorite.favorite_userId = $userId
WHERE categories_id = $categoryid
UNION ALL
SELECT *,0 AS favorite FROM viewItems1
WHERE categories_id = $categoryid AND item_id NOT IN (SELECT viewItems1.item_id FROM `viewItems1` 
INNER JOIN favorite ON favorite.favorite_itemsId = viewItems1.item_id AND  favorite.favorite_userId = $userId)");

$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count  = $stmt->rowCount();
if ($count > 0) {
    echo json_encode(array("status" => "success", "data" => $data));
} else {
    echo json_encode(array("status" => "failure"));
}
