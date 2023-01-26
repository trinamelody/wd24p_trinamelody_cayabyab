<?php

include_once ("login.php");

//@var change table name
$username = $_SESSION['username'];

/**
 * This code is for selecting one information only
 */
if (isset($_GET['index']))
{

   
   $database->where ('username', $username);
   $database->orWhere ('email', $username);
   $result = $database->get(TABLE_NAME);
   $data['records'] = $result;

   $records = $data['records'];


   foreach ($records as $value)
    {
        $response = $value;
    }

    // $response = array(
    //     "code" => SUCCESS,
    //     "description" => $username
    // );

    echo json_encode($response);

}