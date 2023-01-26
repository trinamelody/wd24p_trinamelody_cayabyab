<?php
include_once ("config.php");

define("TABLE_NAME", "users_table");


/**
 * This code is for selecting all informations 
 */
if (isset($_GET['index']))
{
    $database->where("delete_status", 0);
    $database->orderBy("id", "DESC");
    $users = $database->get(TABLE_NAME);
    $data['records'] = $users;
    $data['total_rows'] = count($users);

    echo parseResponse(SUCCESS, "Successful", null, $data);
}


/**
 * This code is for storing new admin 
 */
if (isset($_POST['store']))
{
    $data = json_decode($_POST['store']);

    $response = array(
        "code" => INPUT_ERROR,
        "description" => "Input Error!"
    );

    // Inputs Values
    $username = $data->username;
    $email = $data->email;
    $password = $data->password;
    $confirm_password = $data->confirm_password;

    // Check username if existing
    $database->where("username", $username);
    $user_check = $database->get(TABLE_NAME);
    $check_username = count($user_check);

     // Check email if existing
     $database->where("email", $email);
     $email_check = $database->get(TABLE_NAME);
     $check_email = count($email_check);

    if ($check_email >= 1) {
        $response = array(
            "code" => INPUT_ERROR,
            "description" => "Email is already used! Please use another email."
        );
    } elseif ($check_username >= 1) {
        $response = array(
            "code" => INPUT_ERROR,
            "description" => "Username is already used! Please use another username."
        );
    } elseif ($password !== $confirm_password) {
        $response = array(
            "code" => INPUT_ERROR,
            "description" => "Password do not match!"
        );
    } elseif ($check_email === 0 && $check_username === 0 && $password === $confirm_password) {

        $columns = array(
            "username" => $data->username,
            "email" => $data->email,
            "password" => $data->password,
            "name" => $data->fname." ".$data->lname,
            "first_name" => $data->fname,
            "middle_name" => $data->mname,
            "last_name" => $data->lname
        );
    
        $store_query = $database->insert(TABLE_NAME, $columns);

        if($store_query) {
            $response = array(
                "code" => SUCCESS,
                "description" => "Success New admin"
            );
        } else {
            $response = array(
                "code" => SERVER_ERROR,
                "description" => "There's a server problem. Please contact the administrator"
            );
        }

        
    } else {
        $response = array(
            "code" => SERVER_ERROR,
            "description" => "There's a server problem. Please contact the administrator"
        );
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
        "delete_status" => 1,
        "status" => 1
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

/**
 *  For Activating account
 */
if (isset($_POST['activate']))
{
    $response = array(
        "code" => SERVER_ERROR,
        "description" => "There's a server problem. Please contact the administrator"
    );

   $id = $_POST['id'];

   //@TODO Change column variables
   //@var
   $columns = array(
        "status" => 0
    );

    $database->where("id", $id);
    $isUpdated = $database->update(TABLE_NAME, $columns);

    if($isUpdated) {
        $response = array(
            "code" => SUCCESS,
            "description" => "Account successfully activated"
        );
    }
    
    echo json_encode($response);
}

/**
 *  For Deactivating account
 */
if (isset($_POST['deactivate']))
{
    $response = array(
        "code" => SERVER_ERROR,
        "description" => "There's a server problem. Please contact the administrator"
    );

   $id = $_POST['id'];

   //@TODO Change column variables
   //@var
   $columns = array(
        "status" => 1
    );

    $database->where("id", $id);
    $isUpdated = $database->update(TABLE_NAME, $columns);

    if($isUpdated) {
        $response = array(
            "code" => SUCCESS,
            "description" => "Account successfully deactivated"
        );
    }
    
    echo json_encode($response);
}