<?php
include '../connect.php';

$email = filterRequest('email');
$vertifaycode = rand(10000, 99999);
$statement = $con->prepare('SELECT * FROM users WHERE user_email = ?');
$statement->execute(array($email));
$count = $statement->rowCount();

result($count);

if ($count > 0) {
    $data = array("user_vertification" => $vertifaycode);
    updateData("users", $data, "user_email ='$email'", false);
    sendMail($email, 'Vertifay Code', "Vertifay Code is $vertifaycode");
}
