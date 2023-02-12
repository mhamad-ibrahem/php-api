<?php
include '../connect.php';
$username = filterRequest('username');
$password = sha1($_POST['password']);
$email = filterRequest('email');
$phone = filterRequest('phone');
$location = filterRequest('location');
$token = filterRequest("token");
$vertifaycode = rand(10000,99999);

$statement = $con->prepare('SELECT * FROM users WHERE user_email = ? OR user_number = ?');
$statement -> execute(array($email,$phone));
$count = $statement ->rowCount();
if($count > 0){
    printFailure('email or phone number already exists');
}
else{
    $data = array(
        'user_name' => $username,
        'user_password' => $password,
        'user_email' => $email,
        'user_number' => $phone,
        'user_location' => $location,
        'user_vertification' => $vertifaycode,
        'user_token'=>$token,
    );
    sendMail($email,'Vertifay Code',"Vertifay Code is $vertifaycode");
    insertData('users',$data);
}