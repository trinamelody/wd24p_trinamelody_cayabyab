<?php

include_once ("config.php");

define("TABLE_NAME", "destination_table");

/**
 * This code is for selecting one information only
 */
if (isset($_GET['index']))
{
    $database->where("delete_status", 0);
    $database->orderBy("description", "DESC");
    $users = $database->get(TABLE_NAME);
    $data['records'] = $users;
    $data['total_rows'] = count($users);

    echo parseResponse(SUCCESS, "Successful", null, $data);

}

if (isset($_POST['store'])) {

    $data = json_decode($_POST['store']);

    $response = array(
        "code" => INPUT_ERROR,
        "description" => "Input Error!"
    );

    $columns = array(
        "image" => $data->file,
        "destination" => $data->destination,
        "description" => $data->description,
        "user_id" => $data->id
    );

    $store_query = $database->insert(TABLE_NAME, $columns);

    if(empty($data->file)){
        $response = array(
            "code" => INPUT_ERROR,
            "description" => "Please choose an image!"
        );
    } else {

        if ($store_query) {

            $response = array(
                "code" => SUCCESS,
                "description" => "Destination successfully added."
            );
        } 

    }

    

    

    echo json_encode($response);

}


/**
 *  For Deleteing
 */
if (isset($_POST['destroy']))
{
    $response = array(
        "code" => SERVER_ERROR,
        "description" => "There's a server problem. Please contact the administrator"
    );

   $id = $_POST['id'];

   //@TODO Change column variables
   //@var
   $columns = array(
        "delete_status" => 1
    );

    $database->where("id", $id);
    $isUpdated = $database->update(TABLE_NAME, $columns);

    if($isUpdated) {
        $response = array(
            "code" => SUCCESS,
            "description" => "Successfully deleted"
        );
    }
    
    echo json_encode($response);
}