<?php

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0 ){
	$allowed = array('png', 'jpg', 'gif','jpeg');
	$extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);
	if(!in_array(strtolower($extension), $allowed)){
		echo '{"status":"error"}';
		exit;
	}
	$file_name = generateRandomString()."-" . $_FILES['upl']['name'];
	if(move_uploaded_file($_FILES['upl']['tmp_name'], '../img/players/'.$file_name)){
		echo '{"status":"success"}';
		exit;
	}
}

echo '{"status":"error 2"}';
exit;
?>