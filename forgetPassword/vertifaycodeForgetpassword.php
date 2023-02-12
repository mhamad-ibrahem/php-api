<?php
include '../connect.php';
$email = filterRequest('email');
$vertifaycode = filterRequest('vertifaycode');

$stmt = $con->prepare("SELECT * FROM users WHERE user_email = '$email' AND user_vertification = '$vertifaycode'");
$stmt->execute();
$count = $stmt->rowCount();

result($count);
