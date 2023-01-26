<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


include_once ("config.php");

// PHP Mailer
require_once ('../plugins/mailer/src/Exception.php');
require_once ('../plugins/mailer/src/PHPMailer.php');
require_once ('../plugins/mailer/src/SMTP.php');

define("TABLE_NAME", "pre_booking");
define("TABLE_NAME1", "booking");
define("TOKEN_TABLE", "token");

/**
 * Store Method for customer inquiries
 */

if(isset($_POST['pre_book'])) {
    
    $data = json_decode($_POST['pre_book']);

    $response = array(
        "code" => INPUT_ERROR,
        "description" => "Input Error!"
    );


    $token = md5('8b1a9953c4611296a827abf8c47804d7');

    // Check if token exist
    $database->where("token", $token);
    $tokenExist = $database->get(TOKEN_TABLE);
    $count = count($tokenExist);

    if($_SERVER['SERVER_NAME'] === 'localhost') {
        $server_root = 'localhost/travel';
    } else {
        $server_root = $_SERVER['DOCUMENT_ROOT'];
    }
    


    for ($i = 0; $i < $count; $i++) { 
        $token = md5($token.rand());
    }
    
    $token_values = array(
        "token" => $token
    );

    // Insert to inquiry table
    $query_token = $database->insert(TOKEN_TABLE, $token_values);

    if($query_token) {

        $preBook_values = array(
            "email" => $data->email,
            "destination_id" => $data->id,
            "token" => $token
        );

        $query_preBooking = $database->insert(TABLE_NAME, $preBook_values);
        
        // ================================================================= //
        //            PHP Mailer
        // ================================================================= //
        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'shaikram02@gmail.com'; // Your gmail
        $mail->Password = 'amrqksusxooylkkp'; //Your gmail app password
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('shaikram02@gmail.com'); //Your gmail

        $mail->addAddress($data->email);

        $mail->isHTML(true);

        $mail->Subject = "Pre Booking";
        // $mail->Body = "Hello World";
        $mail->Body = 
        "
            <center>
                <div class='container'
                style='
                width: 80%;
                height:auto;
                min-height: 500px;
                background-color: #fff;
                border-radius: 5px;
                border: 1px solid #808080;
                '>
                    <h1 class='company_name'
                    style='
                    color: #4a2c58;
                    text-align: center;
                    '>
                    CK Travel and Tours</h1>
                    <div class='company_header_div' 
                    style='
                    width: auto;
                    height: auto;
                    padding: 10px;
                    background: #4a2c58;
                    '>
                        <h3 
                        style='
                        color: #fff;
                        text-align: center;
                        font-family: Arial, Helvetica, sans-serif;
                        '>
                        Please verify your email</h3>
                    </div>
                    <div class='message_content' 
                    style='
                    width: 90%;
                    height: auto;
                    min-height: 200px;
                    padding: 5%;
                    color: gray;
                    margin-top: 20px;
                    margin-bottom: 30px;
                    '>
                    <table width='100%' height='auto'>
                        <tr>
                            <td>
                                <p 
                                style='
                                    text-align: left;
                                    float: left;
                                '>
                                Thank you for choosing CK Travel and tours Online Registration Form.
                                <br><br><br>
                                To proceed with your booking, please click on the button below to verify your email:
                                </p>
        
                                <br><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href='$server_root/verify_email.php?t=$token&destination=$data->id' 
                                style='
                                font-weight: bold;
                                text-decoration: none;
                                color: white;
                                font-size: 20px;
                                padding: 10px;
                                background: #0b70df;
                                border-radius: 5px;
                                border: 1px solid #064386;
                                '>
                                Click here to verify your email
                                </a>
                                <br><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span>
                                Or copy and paste link below to your browser's address bar
                                </span>
                                <br><br>
                                <span>
                                $server_root/verify_email.php?t=$token&destination=$data->id
                                </span>
                                <br><br>
                                Note: The link will be valid only for 24 hours.
                                <br><br>
                            </td>
                        </tr>
                    </table>

                    </div>

                    <div class='company_footer_div'
                    style='
                    width: auto;
                    height: auto;
                    padding: 10px;
                    background: #4a2c58;
                    '>
                        <span 
                        style='
                        color: #fefefe;
                        text-align: center;
                        font-size: 15px;
                        '>Contact: +63 955 294 6691 | Email: customer@cktravel .com</span><br>
                        <span 
                        style='
                        color: #fefefe;
                        text-align: center;
                        font-size: 15px;
                        '>CK Travel and Tours ©  All Rights Reserved</span>
                    </div>
                </div>
            </center>



        ";

    // ======================================================================== //
    //          End of PHP Mailler
    // ======================================================================== //
    
    if($query_preBooking && $mail->send()) {
        
        $response = array(
            "code" => SUCCESS,
            "description" => "Success, Please check your email to verify your account."
        );
        // $response = array(
        //     "code" => SUCCESS,
        //     "description" =>  $mail->Port
        // );
    }
    } else {
        $response = array(
            "code" => SERVER_ERROR,
            "description" => "There's a problem in a server, please contact administrator"
        );
    }

    echo json_encode($response);
}



/**
 * This code is for selecting all informations 
 */
if (isset($_GET['index']))
{
    $database->orderBy("id", "DESC");
    $users = $database->get(TABLE_NAME);
    $data['records'] = $users;
    $data['total_rows'] = count($users);

    echo parseResponse(SUCCESS, "Successful", null, $data);
}

/**
 *  For Deleteing
 */
if (isset($_POST['destroy']))
{
    $id = $_POST['id'];

    $database->where("id", $id);
    $isDeleted = $database->delete(TABLE_NAME);

    echo parseResponse(SUCCESS, "Succesfully Deleted");
}