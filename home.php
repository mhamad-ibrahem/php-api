<?php

include "connect.php";

$alldata  = array();
$alldata["status"] = "success";
$categories =  getAllData("categories", null, null, false);

$alldata["categories"] = $categories;

$items =  getAllData("viewItems1", "item_discount != 0", null, false);
$popularitems = getAllData("viewItems1","item_rate >= 4", null, false);
$alldata["popularitems"]= $popularitems;
$alldata["items"] = $items;

echo json_encode($alldata);
