<?php
include '../connect.php';
$email = filterRequest('email');
$vertifaycode = filterRequest('vertifaycode');

$stmt = $con->prepare("SELECT * FROM users WHERE user_email = '$email' AND user_vertification = '$vertifaycode'");
$stmt->execute();
$count = $stmt->rowCount();

if($count >0 ){
    $data = array("user_approve"=> "1");
    updateData('users',$data,"user_email = '$email'");
} 
else {
    printFailure('un correct vertifay code');
}