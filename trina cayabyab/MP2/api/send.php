<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include_once ("config.php");
include_once ('constants.php');

// PHP Mailer
require_once ('../plugins/mailer/src/Exception.php');
require_once ('../plugins/mailer/src/PHPMailer.php');
require_once ('../plugins/mailer/src/SMTP.php');

define("TABLE_NAME", "inquiry_table");

/**
 * Store Method for customer inquiries
 */

if(isset($_POST['store'])) {
    
    $data = json_decode($_POST['store']);
    $response = $data;

    $response = array(
        "code" => INPUT_ERROR,
        "description" => "Please fill input fields correctly!",
    );
    

    //@TODO
    //@var these are columns and values of the table
    $columns = array(
        "name" => $data->name,
        "email" => $data->email,
        "contact_no" => $data->phoneNumber,
        "message" => $data->message
    );

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

    $mail->Subject = "Inquiry Form";
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
                    Your email was successfully send.</h3>
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
                    <span 
                    style='
                        text-align: left;
                        float: left;
                    '>Hello <strong>$data->name</strong>,</span>
                    <br><br><br>
                    <p 
                    style='
                        text-align: left;
                        float: left;
                    '>
                    Thank you for reaching out to <strong>CK Travel and Tours</strong> Support! We received your message and your case number is 06769887. We’ll get back to you as soon as possible.
                    This is a system-generated message. Please do not reply.
                    <br><br><br>
                    Thank you.
                    <br><br>
                    We’ll be in touch soon,
                    <br><br>
                    CK Travel and Tours Support
                    </p>
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

     // Insert to inquiry table
     $query = $database->insert(TABLE_NAME, $columns);


     // print_r($_POST);
    /**
     * For Recaptcha!
     * **/ 
    // required
    $secret = '6LcwhGwjAAAAADEWEt4WWrFy9djlLmiPruuFk72u';
    $responseCaptcha = $data->recaptcha;
    // optional
    $remoteip = $_SERVER['REMOTE_ADDR'];


    // required
    $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$responseCaptcha&remoteip=$remoteip";
    $responseData = file_get_contents($url);
    $dataRow = json_decode($responseData, true);

    //  Verify recaptcha
    if($dataRow['success'] === true) {

        if($query && $mail->send()) {
           
            $response["code"] = SUCCESS;
            $response["description"] = "Message succescfully send!";
    
         }

    }else{
        $response['code'] == INPUT_ERROR;
        $response['description'] == "Unsuccessful Recaptcha Verification!";
    }

     

    echo json_encode($response);
}