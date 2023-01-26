<?php
include_once("config.php");


//@var change table name
define("TABLE_NAME", "users_table");

/**
 * Check if may auth sa login.js login url na ajax
 */
if (isset($_POST['auth'])) {
    $loginCredentials = json_decode($_POST["auth"]);

    $_SESSION['username'] = "";

    $response = array(
        "code" => INPUT_ERROR, // Default 200 422 500
        "description" => "Wrong username password"
    );
    /**
     * This code is for selecting one information only
     */
    $username = $loginCredentials->username;
    $password = $loginCredentials->password;
    
    $database->where("email", $username);
    $database->where ("password", $password);
    $result_email = $database->get(TABLE_NAME);

    $database->where("username", $username);
    $database->where ("password", $password);
    $result_username = $database->get(TABLE_NAME);

    

    if(count($result_email) === 1 || count($result_username) === 1) {

        $database->where("username", $username);
        $database->where ("status", 0);
        $status_with_username = $database->get(TABLE_NAME);

        $database->where("email", $username);
        $database->where ("status", 0);
        $status_with_email = $database->get(TABLE_NAME);

        if(count($status_with_email) === 1 || count($status_with_username) === 1) {

            $_SESSION['username'] = $username;

            $response = array(
                "code" => SUCCESS, // Default 200 422 500
                "description" => "Successfully logged in"
            );
        
        } elseif (count($status_with_email) === 0 || count($status_with_username) === 0) {
            $response = array(
                "code" => INPUT_ERROR, // Default 200 422 500
                "description" => "This account is deactivated!"
            );
        }

    }

    // echo parseResponse(SUCCESS, "Successful", null, $data);
    echo json_encode($response);
}
?>