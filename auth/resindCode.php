<?php
include '../connect.php';

$email = filterRequest('email');
$vertifaycode = rand(10000, 99999);
$data = array(
    "user_vertification"=>$vertifaycode 
);
updateData("users",$data,"user_email = '$email'" );
sendMail($email, 'Vertifay Code', "Vertifay Code is $vertifaycode");