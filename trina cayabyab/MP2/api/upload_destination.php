<?php

// $data = json_decode($_POST['store']);

foreach ($_FILES as $key) {
    $name = $key["name"];
    $path = "../assets/destination/$name";

    if ($key["size"] > 1000000) {
        echo "max file size reached";
    }

    @move_uploaded_file($key["tmp_name"], $path);
}
echo "Success";
// $response = array(
//     "code" => SERVER_ERROR,
//     "description" => $data
// );


// echo json_encode($response);